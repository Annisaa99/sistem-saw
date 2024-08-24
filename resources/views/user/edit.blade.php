@extends('layouts.app2')

@section('page-title', 'Edit Pengguna')

@section('content')
<div class="card">
    <form action="{{ route('user.update') }}" method="POST">
    <div class="card-header">
        Form Pengguna
    </div>
    <div class="card-body">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="row mb-3">
                <div class="col-4">
                    <div class="mb-4">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $user->nama }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-4">
                        <label class="form-label">Jabatan</label>
                        <select class="form-control" name="jabatan">
                            <option selected value="{{ $user->jabatan }}">{{ $user->jenis_jabatan }}</option>
                            <option value="Customer Service">Customer Service</option>
                            <option value="Account Officer">Account Officer</option>
                            <option value="Direksi/PE">Direksi/PE</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="cancel" class="btn btn-primary">Cancel</button>
        </div>
    </form>
</div>
@endsection
