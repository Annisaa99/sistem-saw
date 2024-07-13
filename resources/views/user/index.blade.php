@extends('layouts.app2')

@section('page-title', 'pengguna')

@section('content')
<div class="card">
    <div class="card-header">
        Data Pengguna
    </div>
    <div class="card-body">
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item-> created_at }}</td>
                    <td>{{ $item-> updated_at }}</td>
                    <td>
                    <a href="{{ route('user.edit', ['id' => $item->id])}}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('user.destroy', ['id' => $item->id])}}" class="btn btn-danger btn-delete">Delete</a>
                    </td>
                </tr>  
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
@endsection