@extends('layouts.app2')

@section('content')
<div class="container">
    <h2>Perhitungan SAW</h2>

    <div class="card my-3">
        <div class="card-header">
            Data Alternatif
        </div>
        <div class="card-body">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        @foreach ( $kriteria as $itemkriteria )
                        <th>{{ $itemkriteria->nama }}({{ $itemkriteria->kode }})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $arr_alternatif as $i => $itemalternatifs )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ App\Models\Pengajuan::find($i)->getNasabah->nama }}</td>
                        @foreach ( $itemalternatifs as $itemalternatif )
                        <td>{{$itemalternatif['nama_nilai_kriteria']}}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card my-3">
        <div class="card-header">
            Data Normalisasi
        </div>
        <div class="card-body">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        @foreach ( $kriteria as $itemkriteria )
                        <th>{{ $itemkriteria->nama }}({{ $itemkriteria->kode }})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $arr_normalisasi as $i => $normalisasi )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ App\Models\Pengajuan::find($i)->getNasabah->nama }}</td>
                        @foreach ( $normalisasi as $itemnormalisasi )
                        <td>{{ round($itemnormalisasi['nilai_normalisasi'], 2) }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card my-3">
        <div class="card-header">
            Data Preferensi
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Total Nilai</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $preferensi as $i => $item )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ App\Models\Pengajuan::find($i)->getNasabah->nama }}</td>
                        <td>{{ round($item['total'], 2) }}</td>
                        <td>{{ $item['ranking']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
