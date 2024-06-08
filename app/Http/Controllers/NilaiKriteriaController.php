<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiKriteria;
use App\Models\Kriteria;



class NilaiKriteriaController extends Controller
{
    public function index()
    {
        //perintah mengambil data
        $nilaikriteria = NilaiKriteria::get();

        return view('nilaikriteria.index', compact('nilaikriteria'));
    }

    public function create($id_kriteria)
    {
        $kriteria = Kriteria::find($id_kriteria);
        return view('nilaikriteria.create', compact('kriteria'));
    }

    public function store(Request $request)
    {
        $data = [
            'id_kriteria' => $request->id_kriteria,
            'nama' => $request->nama,
            'nilai' => $request->nilai,

        ];

        NilaiKriteria::create($data);
        return redirect()->route('kriteria.detail', $data['id_kriteria']);
    }

    public function edit($id)
    {
        $nilaikriteria = NilaiKriteria::find($id);
        return view('nilaikriteria.edit', compact('nilaikriteria'));
    }

    public function update(Request $request)
    {
        $data = [
            'id_kriteria' => $request->id_kriteria,
            'nama' => $request->nama,
            'nilai' => $request->nilai,
        ];

        NilaiKriteria::find($request->id)->update($data);
        return redirect()->route('kriteria.detail', $data['id_kriteria']);
    }

    public function destroy($id)
    {
        $id_kriteria = NilaiKriteria::find($id)->id_kriteria;
        NilaiKriteria::destroy($id);
        return redirect()->route('kriteria.detail', $id_kriteria);
    }
    
    
    
}
