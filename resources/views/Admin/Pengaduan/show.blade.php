@extends('layouts.admin')

@section('title', 'Detail Pengaduan')

@section('css')
<style>
    .text-primary:hover {
        text-decoration: underline;
    }

    .text-grey {
        color: #6c757d;
    }

    .text-grey:hover {
        color: #6c757d;
    }

    .btn-purple {
        background: #6a70fc;
        border: 1px solid #6a70fc;
        color: #fff;
        width: 100%;
    }
</style>
@endsection

@section('header')
<a href="{{ route('pengaduan.index') }}" class="text-primary">Data Pengaduan</a>
<a href="#" class="text-grey">/</a>
<a href="#" class="text-grey">Detail Pengaduan</a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    Pengaduan Masyarakat
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>NIK</th>
                            <td>:</td>
                            <td>{{ $pengaduan->nik }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{ $pengaduan->user->nama }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengaduan</th>
                            <td>:</td>
                            <td>{{ $pengaduan->tgl_pengaduan }}</td>
                        </tr>
                        @if ($pengaduan->tgl_proses == null)
                        <tr>
                            <th>Tanggal Proses</th>
                            <td>:</td>
                            <td>-</td>
                        </tr>
                        @else
                        <tr>
                            <th>Tanggal Proses</th>
                            <td>:</td>
                            <td>{{ $pengaduan->tgl_proses }}</td>
                        </tr>
                        @endif

                        @if ($pengaduan->tgl_selesai == null)
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td>:</td>
                            <td>-</td>
                        </tr>
                        @else
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td>:</td>
                            <td>{{ $pengaduan->tgl_selesai }}</td>
                        </tr>
                        @endif

                        <tr>
                            <th>Foto</th>
                            <td>:</td>
                            <td><img src="{{ url($pengaduan->foto) }}" alt="Foto Pengaduan" class="embed-responsive"></td>
                        </tr>
                        <tr>
                            <th>Isi Laporan</th>
                            <td>:</td>
                            <td>{{ $pengaduan->isi_laporan }}</td>
                        </tr>
                        <tr>
                            <th>Hak Akses</th>
                            <td>:</td>
                            <td>
                                @if ($pengaduan->akses == '0')
                                <a href="" class="badge badge-danger">Belum Dikonfirmasi</a>
                                @elseif($pengaduan->akses == 'terbatas')
                                <a href="" class="badge badge-warning text-white">Terbatas</a>
                                @else
                                <a href="" class="badge badge-success">Semua</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>
                                @if ($pengaduan->status == '0')
                                <a href="" class="badge badge-danger">Pending</a>
                                @elseif($pengaduan->status == 'proses')
                                <a href="" class="badge badge-warning text-white">Proses</a>
                                @else
                                <a href="" class="badge badge-success">Selesai</a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    Tanggapan Petugas
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="input-group mb-3">
                            <select name="status" id="status" class="custom-select">
                                @if ($pengaduan->status == '0')
                                <option selected value="0">Pending</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                                @elseif($pengaduan->status == 'proses')
                                <option value="0">Pending</option>
                                <option selected value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                                @else
                                <option value="0">Pending</option>
                                <option value="proses">Proses</option>
                                <option selected value="selesai">Selesai</option>
                                @endif

                            </select>
                        </div>
                    </div>

                    {{-- TANGGAL PROSES --}}
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal Proses</label>
                        <input type="date" name="tgl_proses" id="tgl_proses" class="form-control">
                    </div>

                    {{-- Tanggal Selesai --}}
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control">
                    </div>

                    {{-- INPUT HAK AKSES --}}
                    <div class="form-group">
                        <label for="akses">Hak Akses</label>
                        <div class="input-group mb-3">
                            <select name="akses" id="akses" class="custom-select">
                                @if ($pengaduan->akses == '0')
                                <option selected value="0">Belum Dikonfirmasi</option>
                                <option value="semua">Semua</option>
                                <option value="terbatas">Terbatas</option>
                                @elseif($pengaduan->akses == 'semua')
                                <option value="semua" selected>Semua</option>
                                <option value="terbatas">Terbatas</option>
                                @else
                                <option value="semua">Semua</option>
                                <option value="terbatas" selected>Terbatas</option>
                                @endif

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggapan">Tanggapan</label>
                        <textarea name="tanggapan" id="tanggapan" class="form-control" rows="4" placeholder="Belum Ada Tanggapan">{{ $tanggapan->tanggapan ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-purple">Kirim</button>
                </form>
                @if (Session::has('status'))
                <div class="alert alert-success mt-2">
                    {{ Session::get('status') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection