@extends('layouts.app2')

@section('page-title', 'Edit Data')

@section('content')
<div class="card">
    <div class="card-header">
        Form Edit
        </div>
    <div class="card-body">
        <form action="{{ route('data.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="mb-4">
                <label class="form-label">Nilai Kriteria</label>
                <select class="form-control" name="id_nilai_kriteria">
                    <option selected disabled>Pilih Nilai</option>
                    @foreach($nilai_kriteria as $item)
                        <option value ='{{ $item->id }}'>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <button type="cancel" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
