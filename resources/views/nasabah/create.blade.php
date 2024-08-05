@extends('layouts.app2')

@section('page-title', 'Tambah Nasabah')

@section('content')
<div class="card">
    <div class="card-header">
        Form Nasabah
    </div>
    <div class="card-body">
        <form action="{{ route('nasabah.store') }}" method="POST">
            @csrf
            <div class="nb-4">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="nb-4">
                <label class="form-label">No_KTP</label>
                <input type="number" class="form-control" name="no_ktp">
            </div>
            <div class="nb-4">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <div class="nb-4">
                <label class="form-label">No_Telp</label>
                <input type="number" class="form-control" name="no_telp">
            </div>
            <div class="nb-4">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                    <option selected disabled>Pilih Jenis</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
