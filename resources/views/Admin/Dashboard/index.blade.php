@extends('Layouts.admin')

@section('title', 'Dashboard Admin')

@section('header', 'Dashboard')


@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card-header text-center text-white bg-primary">Petugas</div>
            <div class="card-body">
                <div class="text-center">{{ $petugas }}</div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-header text-center text-white bg-primary">Masyarakat</div>
            <div class="card-body">
                <div class="text-center">{{ $masyarakat }}</div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-header text-center text-white bg-success">Pengaduan (Selesai)</div>
            <div class="card-body">
                <div class="text-center">{{ $selesai }}</div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-header text-center text-white bg-warning">Pengaduan (Proses)</div>
            <div class="card-body">
                <div class="text-center">{{ $proses }}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card-header text-center bg-danger"><strong>Pengaduan (Pending)</strong></div>
        <div class="card-body">
            <div class="text-center"><strong>{{ $pending }}</strong></div>
        </div>
    </div>
@endsection
