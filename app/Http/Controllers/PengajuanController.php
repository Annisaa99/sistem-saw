<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Nasabah;

class PengajuanController extends Controller
{
    public function index()
    {
        //perintah mengambil data
        $pengajuan = Pengajuan::all();

        return view('pengajuan.index', compact('pengajuan'));
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
        Pengajuan::destroy($id);
        return redirect()->route('pengajuan.index');
    }
}
