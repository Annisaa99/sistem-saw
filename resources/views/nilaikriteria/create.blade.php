@extends('layouts.app2')

@section('page-title', 'Tambah Nilai Kriteria')

@section('content')
<div class="card">
    <div class="card-header">
        Form Nilai Kriteria
    </div>
    <div class="card-body">
        <form action="{{ route('nilaikriteria.store') }}" method="POST">
            @csrf
            <input type ="hidden" name="id_kriteria" value="{{ $kriteria->id }}">
            <div class="mb-4">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-4">
                <label class="form-label">Nilai : </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="nilai" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="nilai" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="nilai" id="inlineRadio3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
