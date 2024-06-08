<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        //perintah mengambil data
        $kriteria = Kriteria::all();
       
        return view('kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $data = [
            'kode' => $request->kode,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'bobot' => $request->bobot,

        ];

        Kriteria::create($data);
        return redirect()->route('kriteria.index');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request)
    {
        $data = [
            'kode' => $request->kode,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'bobot' => $request->bobot,
        ];

        Kriteria::find($request->id)->update($data);
        return redirect()->route('kriteria.index');
    }
    
    public function destroy($id)
    {
        Kriteria::destroy($id);
        return redirect()->route('kriteria.index');
    }

    public function detail($id)
    {
        $nilaikriteria = NilaiKriteria::where('id_kriteria', $id)->get();
        $kriteria = Kriteria::find($id);

        return view('nilaikriteria.index', compact('nilaikriteria', 'kriteria'));
    }
}
