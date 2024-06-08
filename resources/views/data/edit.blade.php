@extends('layouts.app2')

@section('page-title', 'Edit Data')

@section('content')
<div class="card">
    <div class="card-header">
        Form Data
        </div>
    <div class="card-body">
        <form action="{{ route('data.update') }}" method="POST">
            @csrf 
            <input type="hidden" name="id" value="{{ $pengajuan->id }}">
            <div class="nb-4">
                <label class="form-label">Id Pengajuan</label>
                <select class="form-select" name="id_pengajuan">
                    <option selected value = '{{ $pengajuan->id_pengajuan }}'>{{ $pengajuan->getNasabah->nama }}</option>
                    @foreach($pengajuan as $item)
                        <option value ='{{ $item->id }}'>{{ $item->nama }}</option> 
                    @endforeach
                </select>
            <input type="hidden" name="id" value="{{ $pengajuan->id }}">
            <div class="nb-4">
                <label class="form-label">Id Pengajuan</label>
                <select class="form-select" name="id_pengajuan">
                    <option selected value = '{{ $pengajuan->id_pengajuan }}'>{{ $pengajuan->getNasabah->nama }}</option>
                    @foreach($pengajuan as $item)
                        <option value ='{{ $item->id }}'>{{ $item->nama }}</option> 
                    @endforeach
                </select>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="cancel" class="btn btn-primary">Cancel</button>
        </form>  
    </div>
</div>
@endsection