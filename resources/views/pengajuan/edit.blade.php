@extends('layouts.app2')

@section('page-title', 'Edit Pengajuan')

@section('content')
<div class="card">
    <div class="card-header">
        Form Pengajuan
        </div>
    <div class="card-body">
        <form action="{{ route('pengajuan.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $pengajuan->id }}">
            <div class="nb-4">
                <label class="form-label">Nama Nasabah</label>
                <select class="form-control" name="id_nasabah">
                    <option selected value = '{{ $pengajuan->id_nasabah }}'>{{ $pengajuan->getNasabah->nama }}</option>
                    @foreach($nasabah as $item)
                        <option value ='{{ $item->id }}'>{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="nb-4">
                <label class="form-label">Tanggal Pengajuan</label>
                <input type="text" class="form-control" name="tanggal_pengajuan" value="{{ $pengajuan->tanggal_pengajuan }}">
            </div>
            <div class="nb-4">
                <label class="form-label">Status Pengajuan</label>
                <select class="form-control" name="status_pengajuan">
                    <option value="berkas_masuk">Berkas Masuk</option>
                    <option value="sedang_diproses">Sedang Proses</option>
                    <option value="diterima">Diterima</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>
            <div class="nb-4">
                <label class="form-label">Plafon</label>
                <input type="text" class="form-control" name="plafon" value="{{ $pengajuan->plafon }}">
            </div>
            <div class="nb-4">
                <label class="form-label">Keterangan</label>
                <select class="form-control" name="keterangan">
                    <option value="Umum">Umum</option>
                    <option value="MOU">MOU</option>
                </select>
            </div>
            <div class="nb-4">
                <label class="form-label">Tanggal Validasi</label>
                <input type="date" class="form-control" name="tanggal_validasi" value="{{ $pengajuan->tanggal_validasi }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="cancel" class="btn btn-primary">Cancel</button>
        </form>
    </div>
</div>
@endsection
