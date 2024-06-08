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
            <div class="nb-4">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="nb-4">
                <label class="form-label">Nilai</label>
                <input type="number" class="form-control" name="nilai">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>  
    </div>
</div>
@endsection