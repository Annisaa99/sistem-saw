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
        return redirect()->route('data.index');
    }

    public function detail($id_pengajuan)
    {
        $pengajuan_selected = Pengajuan::where('id', $id_pengajuan)->pluck('id');
        //pilih data yang id_pengajuan diselect
        $data = Data::whereIn('id_pengajuan', $pengajuan_selected)->get();

        //ambil bobot dari model Kriteria
        $kriteria = Kriteria::all();
        $bobot_kriteria = [];
        foreach ($kriteria as $k) {
            $bobot_kriteria[$k->id] = $k->bobot;
        }

        //alternatif
        $arr_alternatif = [];
        foreach ($data as $value_alternatif) {
            $arr_alternatif[$value_alternatif->id_pengajuan][$value_alternatif->getNilaiKriteria->getKriteria->id]['kode_kriteria'] = $value_alternatif->getNilaiKriteria->getKriteria->kode;
            $arr_alternatif[$value_alternatif->id_pengajuan][$value_alternatif->getNilaiKriteria->getKriteria->id]['jenis_kriteria'] = $value_alternatif->getNilaiKriteria->getKriteria->jenis;
            $arr_alternatif[$value_alternatif->id_pengajuan][$value_alternatif->getNilaiKriteria->getKriteria->id]['id_nilai_kriteria'] = $value_alternatif->id_nilai_kriteria;
            $arr_alternatif[$value_alternatif->id_pengajuan][$value_alternatif->getNilaiKriteria->getKriteria->id]['nilai_nilai_kriteria'] = $value_alternatif->getNilaiKriteria->nilai;
            $arr_alternatif[$value_alternatif->id_pengajuan][$value_alternatif->getNilaiKriteria->getKriteria->id]['nama_nilai_kriteria'] = $value_alternatif->getNilaiKriteria->nama;
        }

        // Hitung nilai max dan min untuk setiap kriteria
        $max_values = [];
        $min_values = [];
        foreach ($data as $value) {
            $id_kriteria = $value->getNilaiKriteria->getKriteria->id;
            $nilai = $value->getNilaiKriteria->nilai;
            if (!isset($max_values[$id_kriteria]) || $nilai > $max_values[$id_kriteria]) {
                $max_values[$id_kriteria] = $nilai;
            }
            if (!isset($min_values[$id_kriteria]) || $nilai < $min_values[$id_kriteria]) {
                $min_values[$id_kriteria] = $nilai;
            }
        }

        //normalisasi
        $arr_normalisasi = [];
        foreach ($data as $value_normalisasi) {
            $id_pengajuan = $value_normalisasi->id_pengajuan;
            $id_kriteria = $value_normalisasi->getNilaiKriteria->getKriteria->id;
            $nilai = $value_normalisasi->getNilaiKriteria->nilai;
            $jenis_kriteria = $value_normalisasi->getNilaiKriteria->getKriteria->jenis;

            $arr_normalisasi[$id_pengajuan][$id_kriteria]['kode_kriteria'] = $value_normalisasi->getNilaiKriteria->getKriteria->kode;
            $arr_normalisasi[$id_pengajuan][$id_kriteria]['jenis_kriteria'] = $jenis_kriteria;
            $arr_normalisasi[$id_pengajuan][$id_kriteria]['nama_nilai_kriteria'] = $nilai;

            if ($jenis_kriteria == 'Benefit') {
                $max = $max_values[$id_kriteria];
                $arr_normalisasi[$id_pengajuan][$id_kriteria]['nilai_maksimal'] = $max;
                $arr_normalisasi[$id_pengajuan][$id_kriteria]['nilai_normalisasi'] = $nilai / $max;
            } else {
                $min = $min_values[$id_kriteria];
                $arr_normalisasi[$id_pengajuan][$id_kriteria]['nilai_minimal'] = $min;
                $arr_normalisasi[$id_pengajuan][$id_kriteria]['nilai_normalisasi'] = $min / $nilai;
            }
        }

        // Perhitungan preferensi
        $preferensi = [];
        foreach ($arr_normalisasi as $id_pengajuan => $kriteria) {
            $preferensi[$id_pengajuan] = [
                'total' => 0,
                'detail' => []
            ];
            foreach ($kriteria as $id_kriteria => $nilai) {
                $nilai_bobot = $bobot_kriteria[$id_kriteria];
                $nilai_normalisasi = $nilai['nilai_normalisasi'];
                $preferensi[$id_pengajuan]['detail'][$id_kriteria] = [
                    'bobot' => $nilai_bobot,
                    'nilai_normalisasi' => $nilai_normalisasi,
                    'nilai_terbobot' => $nilai_normalisasi * $nilai_bobot
                ];
                $preferensi[$id_pengajuan]['total'] += $nilai_normalisasi * $nilai_bobot;
            }
        }

        $result = [
            'data' => $data,
            'arr_alternatif' => $arr_alternatif,
            'arr_normalisasi' => $arr_normalisasi,
            'preferensi' => $preferensi
        ];

        return view('data.detail', compact('result'));
    }

}
