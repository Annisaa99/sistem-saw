@extends('layouts.app2')

@section('page-title', 'Tambah Pengajuan')

@section('content')
<div class="card">
    <div class="card-header">
        Form Pengajuan
        </div>
    <div class="card-body">
        <form action="{{ route('pengajuan.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label">Nama Nasabah</label>
                <select class="form-control" name="id_nasabah">
                    <option selected disabled>Pilih Nama Nasabah</option>
                    @foreach($nasabah as $item)
                        <option value ='{{ $item->id }}'>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label">Tanggal Pengajuan</label>
                <input type="date" class="form-control" name="tanggal_pengajuan">
            </div>
            <div class="mb-4">
                <label class="form-label">Plafon</label>
                <input type="text" class="form-control" name="plafon">
            </div>
            <div class="mb-4">
                <label class="form-label">Keterangan</label>
                <select class="form-control" name="keterangan">
                    <option selected disabled>Pilih Keterangan</option>
                    <option value="Umum">Umum</option>
                    <option value="MOU">MOU</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
