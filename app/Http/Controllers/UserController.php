<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => $request->name,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'password' => Hash::make($request->password),
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
            'name' => $request->name,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'password' => $request->password,
        ];

        User::find($request->id)->update($data);
        return redirect()->route('user.index');
    }


    public function logout($id)
    {
        User::destroy($id);
        return redirect()->route('user.index');
    }
    
}