<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //perintah mengambil data
        $user = user::all();

        return view('user.index', compact('user'));
    }
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
        ];

        User::create($data);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
        ];

        User::find($request->id)->update($data);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index');
    }
}