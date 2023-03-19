<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $petugas = Petugas::all()->count();
        $masyarakat = Masyarakat::all()->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();
        $proses = Pengaduan::where('status', 'proses')->count();
        $pending = Pengaduan::where('status', '0')->count();

        // dd($petugas, $masyarakat, $selesai, $proses);

        return view('Admin.Dashboard.index', [
            'petugas' => $petugas,
            'masyarakat' => $masyarakat,
            'selesai' => $selesai,
            'proses' => $proses,
            'pending' => $pending,
        ]);
    }
}
