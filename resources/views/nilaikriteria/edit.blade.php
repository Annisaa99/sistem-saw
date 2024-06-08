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
            <div class="nb-4">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $nilaikriteria->nama }}">
            </div>
            <div class="nb-4">
                <label class="form-label">Nilai</label>
                <input type="number" class="form-control" name="nilai" value="{{ $nilaikriteria->nilai }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="cancel" class="btn btn-primary">Cancel</button>
        </form>  
    </div>
</div>
@endsection