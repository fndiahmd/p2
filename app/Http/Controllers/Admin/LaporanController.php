<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan.index');
    }

    public function getLaporan(Request $request)
    {
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

        return view('Admin.Laporan.index', [
            'from' => $from,
            'to' => $to,
            'pengaduan' => $pengaduan,
        ]);
    }

    public function cetakLaporan($from, $to)
    {
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

        $pdf = PDF::loadview('Admin.Laporan.cetak', [
            'pengaduan' => $pengaduan,
        ]);

        return $pdf->download('Laporan-Pengaduan.pdf');
    }
}
