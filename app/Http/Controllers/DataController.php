<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Pengajuan;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use App\Models\User;


class DataController extends Controller
{
    public function index($id_pengajuan)
    {
        //perintah mengambil data
        $data = Data::where('id_pengajuan', $id_pengajuan)->get();
        return view('data.index', compact('data'));
    }

    public function create()
    {
        $pengajuan = Pengajuan::all();
        $kriteria = Kriteria::all();
        $nilaikriteria = NilaiKriteria::all();
        $users = User::all();
        return view('data.create', compact('pengajuan', 'kriteria', 'nilaikriteria', 'users'));
    }

    public function store(Request $request)
    {
        foreach ($request->kriteria as $key => $value) {
            $data = [
                'id_pengajuan' => $request->id_pengajuan,
                'id_nilai_kriteria' => $value,
                'id_users' => auth()->user()->id,
            ];

            Data::create($data);
        }
        return redirect()->route('pengajuan.index');
    }

    public function detail()
    {
        // Pilih data yang id_pengajuan diselect
        $data = Data::all();

        // Ambil bobot dari model Kriteria
        $kriteria = Kriteria::all();
        $bobot_kriteria = $kriteria->pluck('bobot', 'id');

        // Alternatif
        $arr_alternatif = [];
        foreach ($data as $value_alternatif) {
            $kriteria_id = $value_alternatif->getNilaiKriteria->getKriteria->id;
            $arr_alternatif[$value_alternatif->id_pengajuan][$kriteria_id] = [
                'kode_kriteria' => $value_alternatif->getNilaiKriteria->getKriteria->kode,
                'jenis_kriteria' => $value_alternatif->getNilaiKriteria->getKriteria->jenis,
                'id_nilai_kriteria' => $value_alternatif->id_nilai_kriteria,
                'nilai_nilai_kriteria' => $value_alternatif->getNilaiKriteria->nilai,
                'nama_nilai_kriteria' => $value_alternatif->getNilaiKriteria->nama,
            ];
        }

        // Hitung nilai max dan min untuk setiap kriteria
        $max_values = $data->groupBy('getNilaiKriteria.getKriteria.id')
                        ->map(function ($group) {
                            return $group->max('getNilaiKriteria.nilai');
                        });

        $min_values = $data->groupBy('getNilaiKriteria.getKriteria.id')
                        ->map(function ($group) {
                            return $group->min('getNilaiKriteria.nilai');
                        });

        // Normalisasi
        $arr_normalisasi = [];
        foreach ($data as $value_normalisasi) {
            $id_pengajuan = $value_normalisasi->id_pengajuan;
            $id_kriteria = $value_normalisasi->getNilaiKriteria->getKriteria->id;
            $nilai = $value_normalisasi->getNilaiKriteria->nilai;
            $nama_nilai_kriteria = $value_normalisasi->getNilaiKriteria->nama;
            $jenis_kriteria = $value_normalisasi->getNilaiKriteria->getKriteria->jenis;

            $arr_normalisasi[$id_pengajuan][$id_kriteria] = [
                'kode_kriteria' => $value_normalisasi->getNilaiKriteria->getKriteria->kode,
                'jenis_kriteria' => $jenis_kriteria,
                'nama_nilai_kriteria' => $nama_nilai_kriteria,
                'nilai_normalisasi' => $jenis_kriteria == 'Benefit'
                                        ? $nilai / $max_values[$id_kriteria]
                                        : $min_values[$id_kriteria] / $nilai,
            ];
        }

        // Perhitungan preferensi
        $preferensi = [];
        foreach ($arr_normalisasi as $id_pengajuan => $kriteria) {
            $total = 0;
            $detail = [];
            foreach ($kriteria as $id_kriteria => $nilai) {
                $nilai_bobot = $bobot_kriteria[$id_kriteria];
                $nilai_normalisasi = $nilai['nilai_normalisasi'];
                $nilai_terbobot = $nilai_normalisasi * $nilai_bobot;

                $detail[$id_kriteria] = [
                    'bobot' => $nilai_bobot,
                    'nilai_normalisasi' => $nilai_normalisasi,
                    'nilai_terbobot' => $nilai_terbobot,
                ];

                $total += $nilai_terbobot;
            }
            $preferensi[$id_pengajuan] = [
                'total' => $total,
                'detail' => $detail,
            ];
        }

        // Urutkan preferensi berdasarkan nilai total tertinggi
        uasort($preferensi, function ($a, $b) {
            return $b['total'] <=> $a['total'];
        });

        // Berikan peringkat
        $ranking = 1;
        foreach ($preferensi as $id_pengajuan => &$value) {
            $value['ranking'] = $ranking++;
        }

        $kriteria = Kriteria::all();

        return view('data.detail', compact('kriteria','arr_alternatif', 'arr_normalisasi', 'preferensi'));
    }

    //edit data
    public function edit($id)
    {
        $data = Data::find($id);
        $id_nilai_kriteria = $data->id_nilai_kriteria;
        $nilai_kriteria = NilaiKriteria::find($id_nilai_kriteria);
        $id_kriteria = $nilai_kriteria->id_kriteria;
        $nilai_kriteria = NilaiKriteria::where('id_kriteria', $id_kriteria)->get();

        return view('data.edit', compact('data', 'nilai_kriteria'));
    }

    public function update(Request $request)
    {
        $data = [
            'id_nilai_kriteria' => $request->id_nilai_kriteria,
        ];

        Data::where('id', $request->id)->update($data);
        return redirect()->route('data.index', ['id_pengajuan' => Data::find($request->id)->id_pengajuan]);
    }
}
