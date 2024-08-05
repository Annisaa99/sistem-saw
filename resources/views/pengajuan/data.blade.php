@extends('layouts.app2')

@section('page-title', 'Tambah Data')

@section('content')
<div class="card">
    <div class="card-header">
        Form Pengajuan
    </div>
    <div class="card-body">
        <form action="{{ route('data.store') }}" method="POST">
            <input type="hidden" name="id_pengajuan" value="{{ $pengajuan->id }}">
            @csrf
            <div class="row">
                @foreach ($kriteria as $item)
                <div class="col-4 mb-4">
                    <label class="form-label">Pengajuan {{ $item->nama }}</label>
                    <select class="form-control" name="kriteria[{{ $item->id }}]">
                        <option selected disabled>Pilih {{ $item->nama }}</option>
                        @foreach($item->getNilaiKriteria()->get() as $item2)
                            <option value ='{{ $item2->id }}'>{{ $item2->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
