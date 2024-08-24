@extends('layouts.app2')

@section('page-title', 'Tambah Data')

@section('content')
<div class="card">
    <div class="card-header">
        Form Data
    </div>
    <div class="card-body">
        <form action="{{ route('data.store') }}" method="POST">
        @csrf
            <div class="mb-4">
                <label class="form-label">Pengajuan</label>
                <select class="form-control" name="id_pengajuan">
                    <option selected disabled>Pilih Pengajuan</option>
                    @foreach($pengajuan as $item)
                        <option value ='{{ $item->id }}'>{{ $item->getNasabah->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label">Kriteria</label>
                <select class="form-control" name="id_kriteria">
                    <option selected disabled>Pilih Kriteria</option>
                    @foreach($kriteria as $item)
                        <option value ='{{ $item->id }}'>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label">Nilai Kriteria</label>
                <select class="form-control" name="id_nilai_kriteria">
                    <option selected disabled>Pilih Nilai Kriteria</option>
                    @foreach($nilaikriteria as $item)
                        <option value ='{{ $item->id }}'>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label">Users</label>
                <select class="form-control" name="id_users">
                    <option selected disabled>Pilih Users</option>
                    @foreach($users as $item)
                        <option value ='{{ $item->id }}'>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
