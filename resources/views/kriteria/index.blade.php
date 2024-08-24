@extends('layouts.app2')

@section('page-title', 'kriteria')

@section('content')
<div class="card">
    <div class="card-header">
        Data Kriteria
    </div>
    <div class="card-body">
        <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Bobot ({{$total_bobot}})</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriteria as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->bobot }}</td>
                    <td>{{ $item-> created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="{{ route('kriteria.detail', ['id' => $item->id])}}" class="btn btn-primary">Tambah Nilai</a>
                        <a href="{{ route('kriteria.edit', ['id' => $item->id])}}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('kriteria.destroy', ['id' => $item->id])}}" class="btn btn-danger btn-delete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
