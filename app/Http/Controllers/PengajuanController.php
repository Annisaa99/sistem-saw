<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Nasabah;
use App\Models\Kriteria;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        //perintah mengambil data
        $pengajuan = Pengajuan::all();

        return view('pengajuan.index', compact('pengajuan'));
    }

    public function data($id_pengajuan)
    {
        //perintah mengambil data
        $pengajuan = Pengajuan::find($id_pengajuan);
        $kriteria = Kriteria::all();

        //jika id pengajua sudah ada di data
        $data = Data::where('id_pengajuan', $id_pengajuan)->get();
        if ($data->count() > 0) {
            return redirect()->route('data.index', ['id_pengajuan' => $id_pengajuan]);
        }

        return view('pengajuan.data', compact('pengajuan', 'kriteria'));
    }

    public function create()
    {
        $nasabah = Nasabah::all();
        return view('pengajuan.create', compact('nasabah'));
    }

    public function store(Request $request)
    {
        $data = [
            'id_nasabah' => $request->id_nasabah,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'status_pengajuan' => 'berkas masuk',
            'plafon' => $request->plafon,
            'keterangan' => $request->keterangan,
            'id_users' => auth()->user()->id,
        ];

        Pengajuan::create($data);
        return redirect()->route('pengajuan.index');
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::find($id);
        $nasabah = Nasabah::all();
        return view('pengajuan.edit', compact('pengajuan', 'nasabah'));
    }

    public function update(Request $request)
    {
        $data = [
            'id_nasabah' => $request->id_nasabah,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'status_pengajuan' => $request->status_pengajuan,
            'plafon' => $request->plafon,
            'keterangan' => $request->keterangan,
            'tanggal_validasi' => $request->tanggal_validasi,
        ];

        Pengajuan::find($request->id)->update($data);
        return redirect()->route('pengajuan.index');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);
        //delete data di model data berdasarkan id_pengajuan
        Data::where('id_pengajuan', $id)->delete();

        $pengajuan->delete();
        return redirect()->route('pengajuan.index');
    }
}
