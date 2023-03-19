@extends('Layouts.admin')

@section('title', 'PEMAS | Edit Petugas')

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
    </style>
@endsection

@section('header')
    <a href="{{ route('petugas.index') }}" class="text-primary">Data Petugas</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Form Edit Petugas</a>
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">Form Edit Petugas</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('petugas.update', $petugas->id_petugas) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" name="nama_petugas" id="nama_petugas" value="{{ $petugas->nama_petugas }}"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" value="{{ $petugas->username }}"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="telp">No Telp</label>
                            <input type="telp" value="{{ $petugas->telp }}" name="telp" id="telp"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <div class="input-group">
                                <select name="level" id="level" class="custom-select">
                                    @if ($petugas->level == 'admin')
                                        <option value="admin" selected>Admin</option>
                                        <option value="petugas">Petugas</option>
                                    @else
                                        <option value="admin">Admin</option>
                                        <option value="petugas" selected>Petugas</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning" style="width:100%">Simpan</button>
                    </form>

                    {{-- FORM DELETE PETUGAS --}}
                    <form action="{{ route('petugas.destroy', $petugas->id_petugas) }}" method="post">
                        @csrf
                        @method('delete')

                        <button class="btn btn-danger mt-2" style="width: 100%">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
