<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;
Use Alert;


class KriteriaController extends Controller
{
    public function index()
    {
        //perintah mengambil data
        $kriteria = Kriteria::all();
        //total bobot kriteria
        $total_bobot = Kriteria::sum('bobot');
        return view('kriteria.index', compact('kriteria', 'total_bobot'));
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

        //jika total bobot lebih dari 100
        if (Kriteria::sum('bobot') + $request->bobot > 100) {
            Alert::error('Error', 'Total bobot tidak boleh lebih dari 100%');
            return redirect()->route('kriteria.create');
        }

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
