@extends('layouts.app2')

@section('page-title', 'pengajuan')

@section('content')
<div class="card">
    <div class="card-header">
        Data Pengajuan
    </div>
    <div class="card-body">
        <a href="{{ route('pengajuan.create') }}" class="btn btn-primary">Tambah Pengajuan</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>id Nasabah</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status Pengajuan</th>
                    <th>Plafon</th>
                    <th>Keterangan</th>
                    <th>Tanggal Validasi</th>
                    <th>Total Nilai</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->getNasabah->nama }}</td>
                    <td>{{ $item->tanggal_pengajuan }}</td>
                    <td>{{ $item->status_pengajuan }}</td>
                    <td>{{ $item->plafon }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->tanggal_validasi }}</td>
                    <td>
                        @if($item->isDataExist())
                            <a href="{{ route('data.detail', ['id_pengajuan' => $item->id ])}}" class="btn mb-1 btn-primary">Lihat Nilai</a>
                        @else
                            <a class="btn mb-1 btn-primary disabled">Lihat Nilai</a>
                        @endif
                    </td>
                    <td>{{ $item-> created_at }}</td>
                    <td>{{ $item-> updated_at }}</td>
                    <td>
                        <a href="{{ route('pengajuan.data', ['id_pengajuan' => $item->id ])}}" class="btn mb-1 btn-primary">Masukkan Data</a>
                        <a href="{{ route('pengajuan.edit', ['id' => $item->id ])}}" class="btn mb-1 btn-warning">Edit</a>
                        <a href="{{ route('pengajuan.destroy', ['id' => $item->id ])}}" class="btn mb-1 btn-danger btn-delete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
