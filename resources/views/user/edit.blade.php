@extends('layouts.app2')

@section('page-title', 'Edit Pengguna')

@section('content')
<div class="card">
    <div class="card-header">
        Form Pengguna
    </div>
    <div class="card-body">
        <form action="{{ route('user.update') }}" method="POST">
            @csrf 
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="nb-4">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $user->nama }}">
            </div>
            <div class="nb-4">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
            </div>
            <div class="nb-4">
                <label class="form-label">Jabatan</label>
                <select class="form-select" name="jabatan">
                    <option selected value="{{ $user->jabatan }}">{{ $user->jenis_jabatan }}</option>
                    <option value="Customer Service">Customer Service</option>
                    <option value="Account Officer">Account Officer</option>
                    <option value="Direksi/PE">Direksi/PE</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="cancel" class="btn btn-primary">Cancel</button>
        </form>  
    </div>
</div>
@endsection