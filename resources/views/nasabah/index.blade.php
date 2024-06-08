@extends('layouts.app2')

@section('page-title', 'nasabah')

@section('content')
<div class="card">
    <div class="card-header">
        Data Nasabah
    </div>
    <div class="card-body">
        <a href="{{ route('nasabah.create') }}" class="btn btn-primary">Tambah Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No. KTP</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Jenis Kelamin</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nasabah as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->no_ktp }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item-> created_at }}</td>
                    <td>{{ $item-> updated_at }}</td>
                    <td>
                        <a href="{{ route('nasabah.edit', ['id' => $item->id])}}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('nasabah.destroy', ['id' => $item->id])}}" class="btn btn-danger btn-delete">Delete</a>
                    </td>
                </tr> 
                @endforeach  
            </tbody>
        </table>
    </div>
</div>
@endsection