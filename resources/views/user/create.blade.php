@extends('layouts.app2')

@section('page-title', 'Tambah Pengguna')

@section('content')
<div class="card">
    <div class="card-header">
        Form Pengguna
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="nb-4">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="nb-4">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="nb-4">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password">
            </div>
            <div class="nb-4">
                <label class="form-label">Jabatan</label>
                <select class="form-control" name="jabatan">
                    <option selected disabled>Pilih Jabatan</option>
                    <option value="Customer Service">Customer Service</option>
                    <option value="Account Officer">Account Officer</option>
                    <option value="Direksi/PE">Direksi/PE</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
