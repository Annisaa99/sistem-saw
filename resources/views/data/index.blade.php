@extends('layouts.app2')

@section('page-title', 'data')

@section('content')
<div class="card">
    <div class="card-header">
        Data
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengajuan</th>
                    <th>Kriteria</th>
                    <th>Nilai Kriteria</th>
                    <th>Users</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->getPengajuan->getNasabah->nama }}</td>
                    <td>{{ $item->getNilaiKriteria->getKriteria->nama }}</td>
                    <td>{{ $item->getNilaiKriteria->nama }}</td>
                    <td>{{ $item->getUser->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="{{ route('data.edit', ['id' => $item->id])}}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('data.destroy', ['id' => $item->id])}}" class="btn btn-danger btn-delete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
