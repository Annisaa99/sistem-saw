@extends('layouts.app2')

@section('page-title', 'Data Detail')

@section('content')
<div class="card">
    <div class="card-header">
        Result Data
    </div>
    <div class="card-body">
        <!-- Alternatif dan Nilai Kriteria -->
        <h5>Alternatif dan Nilai Kriteria</h5>
        @foreach ($result['arr_alternatif'] as $id_pengajuan => $kriteria)

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Kriteria</th>
                        <th>Jenis Kriteria</th>
                        <th>Nilai Kriteria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $id_kriteria => $detail)
                        <tr>
                            <td>{{ $detail['kode_kriteria'] }} - {{ $detail['nama_nilai_kriteria'] }}</td>
                            <td>{{ $detail['jenis_kriteria'] }}</td>
                            <td>{{ $detail['nilai_nilai_kriteria'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach

        <!-- Normalisasi -->
        <h5>Normalisasi</h5>
        @foreach ($result['arr_normalisasi'] as $id_pengajuan => $kriteria)

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Kriteria</th>
                        <th>Jenis Kriteria</th>
                        <th>Nilai Normalisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $id_kriteria => $detail)
                        <tr>
                            <td>{{ $detail['kode_kriteria'] }} - {{ $detail['nama_nilai_kriteria'] }}</td>
                            <td>{{ $detail['jenis_kriteria'] }}</td>
                            <td>{{ $detail['nilai_normalisasi'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach

        <!-- Preferensi -->
        <h5>Preferensi</h5>
        @foreach ($result['preferensi'] as $id_pengajuan => $detail)

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Kriteria</th>
                        <th>Bobot</th>
                        <th>Nilai Normalisasi</th>
                        <th>Nilai Terbobot</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail['detail'] as $id_kriteria => $nilai)
                        <tr>
                            <td>{{ $result['arr_alternatif'][$id_pengajuan][$id_kriteria]['kode_kriteria'] }} - {{ $result['arr_alternatif'][$id_pengajuan][$id_kriteria]['nama_nilai_kriteria'] }}</td>
                            <td>{{ $nilai['bobot'] }}</td>
                            <td>{{ $nilai['nilai_normalisasi'] }}</td>
                            <td>{{ $nilai['nilai_terbobot'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><strong>Total Preferensi</strong></td>
                        <td><strong>{{ $detail['total'] }}</strong></td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    </div>
</div>
@endsection
