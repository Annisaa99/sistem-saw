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
    public function index()
    {
        //perintah mengambil data
        $data = Data::all();

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
        $data = [
            'id_pengajuan' => $request->id_pengajuan,
            'id_kriteria' => $request->id_kriteria,
            'id_nilai_kriteria' => $request->id_nilai_kriteria,
            'id_users' => $request->id_users,

        ];

        Data::create($data);
        return redirect()->route('data.index');
    }

    public function detail()
    {
        $pengajuan = Pengajuan::all();

        $arr_pengajuan = [];

        foreach ($pengajuan as $key => $value) {
            $arr_pengajuan[$key]['nasabah'] = $value->getNasabah->nama;
            $data=Data::where('id_pengajuan', $value->id)->get();

            //alternatif
            foreach ($data as $key2 => $value2) {
                $arr_pengajuan[$key]['data_alternatif']['kriteria'][$key2]['nilai'] = $value2->getNilaiKriteria->nilai;
                $arr_pengajuan[$key]['data_alternatif']['kriteria'][$key2]['nama'] = $value2->getNilaiKriteria->nama;
                $arr_pengajuan[$key]['data_alternatif']['kriteria'][$key2]['bobot'] = $value2->getKriteria->bobot;
                $arr_pengajuan[$key]['data_alternatif']['kriteria'][$key2]['jenis'] = $value2->getKriteria->jenis;
                $arr_pengajuan[$key]['data_alternatif']['kriteria'][$key2]['kriteria_id'] = $value2->getKriteria->id;
            }

            $data_alternatif = $arr_pengajuan[$key]['data_alternatif']['kriteria'];

            //normalisasi
            foreach ($data_alternatif as $key3 => $value3) {
                if($value3['jenis']=='Benefit'){
                    $nilai = $value3['nilai'];
                    $nmax = NilaiKriteria::where('id_kriteria', $value3['kriteria_id'])->orderBy('nilai', 'DESC')->first()->nilai;
                    $arr_pengajuan[$key]['data_normalisasi']['kriteria'][$key3]['nilai']=$nilai/$nmax;
                } else if($value3['jenis']=='cost'){
                    $nilai = $value3['nilai'];
                    $nmin = NilaiKriteria::where('id_kriteria', $value3['kriteria_id'])->orderBy('nilai', 'ASC')->first()->nilai;
                    $arr_pengajuan[$key]['data_normalisasi']['kriteria'][$key3]['nilai']=$nmin/$nilai;
                }
            }

           
            $data_normalisasi = $arr_pengajuan[$key]['data_normalisasi']['kriteria'];
            //preferensi 
            $preferensi = 0;
            foreach ($data_alternatif as $key4 => $value4) {
                $nilai_normalisasi = $data_normalisasi[$key4]['nilai'];
                $preferensi+($value4['bobot']*$nilai_normalisasi);
                $preferensi = $preferensi + ($value4['bobot']* $nilai_normalisasi);
                $arr_pengajuan[$key]['nilai_preferensi']=$preferensi;
            }
        }

        dd($arr_pengajuan);
    }

   

}
