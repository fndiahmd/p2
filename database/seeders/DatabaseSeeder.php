<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        Petugas::create([
            'nama_petugas' => 'Eko Kurniawan Khannedy',
            'username' => 'khannedy',
            'password' => Hash::make('password'),
            'telp' => '0812345678',
            'level' => 'admin',
        ]);

        Masyarakat::create([
            'nik' => "3671081111040001",
            'nama' => "Eko Setyono Wibowo",
            'username' => "eko",
            'password' => Hash::make('password'),
            'telp' => "081234567",
        ]);

        Masyarakat::create([
            'nik' => "3671081111040002",
            'nama' => "Eko Kurniawan",
            'username' => "kurniawan",
            'password' => Hash::make('password'),
            'telp' => "081234567",
        ]);
    }
}
