@extends('layouts.app2')

@section('page-title', 'Edit Nasabah')

@section('content')
<div class="card">
    <div class="card-header">
        Form Nasabah
    </div>
    <div class="card-body">
        <form action="{{ route('nasabah.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $nasabah->id }}">
            <div class="nb-4">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $nasabah->nama }}">
            </div>
            <div class="nb-4">
                <label class="form-label">No_KTP</label>
                <input type="number" class="form-control" name="no_ktp" value="{{ $nasabah->no_ktp }}">
            </div>
            <div class="nb-4">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{ $nasabah->alamat }}">
            </div>
            <div class="nb-4">
                <label class="form-label">No_Telp</label>
                <input type="number" class="form-control" name="no_telp" value="{{ $nasabah->no_telp }}">
            </div>
            <div class="nb-4">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                    <option selected value="{{ $nasabah->jenis_kelamin }}">{{ $nasabah->jenis_kelamin }}</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="cancel" class="btn btn-primary">Cancel</button>
        </form>
    </div>
</div>
@endsection
