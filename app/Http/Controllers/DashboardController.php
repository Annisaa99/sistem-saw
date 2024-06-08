<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Pengajuan;

class DashboardController extends Controller
{
    public function index()
    {
        $jmlPengajuan = Pengajuan::count();
        $jmlPengajuanSedangProses = Pengajuan::where('status_pengajuan', 'sedang_diproses')->count();
        $jmlPengajuanDiterima = Pengajuan::where('status_pengajuan', 'diterima')->count();
        $jmlPengajuanDitolak = Pengajuan::where('status_pengajuan', 'ditolak')->count();

        $data=[
            'jmlPengajuan' => $jmlPengajuan,
            'jmlPengajuanSedangProses' => $jmlPengajuanSedangProses,
            'jmlPengajuanDiterima' => $jmlPengajuanDiterima,
            'jmlPengajuanDitolak' => $jmlPengajuanDitolak
        ];

        return view('dashboard', $data);

    }

}