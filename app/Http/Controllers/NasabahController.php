<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;

class NasabahController extends Controller
{
    public function index()
    {
        //perintah mengambil data
        $nasabah = Nasabah::all();

        return view('nasabah.index', compact('nasabah'));
    }
    public function create()
    {
        return view('nasabah.create');
    }

    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,

        ];

        Nasabah::create($data);
        return redirect()->route('nasabah.index');
    }

    public function edit($id)
    {
        $nasabah = Nasabah::find($id);
        return view('nasabah.edit', compact('nasabah'));
    }

    public function update(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
        ];

        Nasabah::find($request->id)->update($data);
        return redirect()->route('nasabah.index');
    }

    public function destroy($id)
    {
        Nasabah::destroy($id);
        return redirect()->route('nasabah.index');
    }
}
