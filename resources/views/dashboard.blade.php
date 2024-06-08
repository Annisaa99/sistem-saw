@extends('layouts.app2')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 class="text-left">{{ $jmlPengajuan }}</h3>

                <p>Jumlah Pengajuan</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-file"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 class="text-left">{{ $jmlPengajuanSedangProses }}</h3>

                <p>Pengajuan Sedang Proses</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-file-pen"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="text-left">{{ $jmlPengajuanDiterima }}</h3>

                <p>Pengajuan Diterima</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-file-circle-check"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 class="text-left">{{ $jmlPengajuanDitolak }}</h3>

                <p>Pengajuan Ditolak</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-file-circle-xmark"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
@endsection

