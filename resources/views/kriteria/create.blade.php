@extends('layouts.app2')

@section('page-title', 'Tambah Kriteria')

@section('content')
<div class="card">
    <div class="card-header">
        Form Kriteria
    </div>
    <div class="card-body">
        <form action="{{ route('kriteria.store') }}" method="POST">
            @csrf
            <div class="alert alert-light" role="alert">
                <b>benefit</b> : jenis kriteria dimana semakin besar nilainya maka semakin baik <br>
                <b>cost</b> : jenis kriteria dimana semakin kecil nilainya maka semakin baik <br>
            </div>
            <div class="nb-4">
                <label class="form-label">Kode</label>
                <input type="text" class="form-control" name="kode">
            </div>
            <div class="nb-4">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="nb-4">
                <label class="form-label">Jenis</label>
                <select class="form-control" name="jenis">
                    <option selected disabled>Pilih Jenis</option>
                    <option value="benefit" data-keterangan="Benefit adalah jenis kriteria dimana semakin besar nilainya maka semakin baik">Benefit</option>
                    <option value="cost" data-keterangan="Cost adalah jenis kriteria dimana semakin kecil nilainya maka semakin baik">Cost</option>
                </select>
            </div>
            <div class="nb-4">
                <label class="form-label">Bobot</label>
                <input type="number" class="form-control" name="bobot">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
