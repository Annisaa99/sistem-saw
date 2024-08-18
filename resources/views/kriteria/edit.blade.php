@extends('layouts.app2')

@section('page-title', 'Edit Kriteria')

@section('content')
<div class="card">
    <div class="card-header">
        Form Kriteria
    </div>
    <div class="card-body">
        <form action="{{ route('kriteria.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $kriteria->id }}">
            <div class="nb-4">
                <label class="form-label">Kode</label>
                <input type="text" class="form-control" name="kode" value="{{ $kriteria->kode }}">
            </div>
            <div class="nb-4">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $kriteria->nama }}">
            </div>
            <div class="nb-4">
                <label class="form-label">Jenis</label>
                <select class="form-control" name="jenis">
                    <option selected value="{{ $kriteria->jenis }}">{{ $kriteria->jenis }}</option>
                    <option value="benefit" data-keterangan="Benefit adalah jenis kriteria dimana semakin besar nilainya maka semakin baik">Benefit</option>
                    <option value="cost" data-keterangan="Cost adalah jenis kriteria dimana semakin kecil nilainya maka semakin baik">Cost</option>
                </select>
            </div>
            <div class="nb-4">
                <label class="form-label">Bobot</label>
                <input type="number" class="form-control" name="bobot" value="{{ $kriteria->bobot }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="cancel" class="btn btn-primary">Cancel</button>
        </form>
    </div>
</div>
@endsection
