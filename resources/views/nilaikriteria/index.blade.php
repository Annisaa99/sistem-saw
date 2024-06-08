@extends('layouts.app2')

@section('page-title', 'nilai kriteria')

@section('content')
<div class="card">
    <div class="card-header">
        Data Nilai Kriteria ({{ $kriteria->nama }})
    </div>
    <div class="card-body">
        <a href="{{ route('nilaikriteria.create', ['id_kriteria' => $kriteria->id]) }}" class="btn btn-primary">Tambah Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilaikriteria as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nilai }}</td>
                    <td>{{ $item-> created_at }}</td>
                    <td>{{ $item-> updated_at }}</td>
                    <td>
                        <a href="{{ route('nilaikriteria.edit', ['id' => $item->id])}}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('nilaikriteria.destroy', ['id' => $item->id])}}" class="btn btn-danger btn-delete">Delete</a>
                    </td>
                </tr> 
                @endforeach  
            </tbody>
        </table>
    </div>
</div>
@endsection