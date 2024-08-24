@extends('layouts.app2')

@section('page-title', 'Edit Nilai Kriteria')

@section('content')
<div class="card">
    <div class="card-header">
        Form Nilai Kriteria
    </div>
    <div class="card-body">
        <form action="{{ route('nilaikriteria.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $nilaikriteria->id }}">
            <input type ="hidden" name="id_kriteria" value="{{ $nilaikriteria->id_kriteria }}">
            <div class="mb-4">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $nilaikriteria->nama }}">
            </div>
            <div class="mb-4">
                <label class="form-label">Nilai : </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="nilai" id="inlineRadio1" value="1" @if($nilaikriteria->nilai == 1) checked @endif>
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="nilai" id="inlineRadio2" value="2" @if($nilaikriteria->nilai == 2) checked @endif>
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="nilai" id="inlineRadio3" value="3" @if($nilaikriteria->nilai == 3) checked @endif>
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="cancel" class="btn btn-primary">Cancel</button>
        </form>
    </div>
</div>
@endsection
