<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->dateTime('tgl_pengaduan');
            $table->date('tgl_proses')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->unsignedBigInteger('nik');
            $table->text('isi_laporan');
            $table->string('foto');
            $table->enum('akses', ['0', 'semua', 'terbatas'])->nullable();
            $table->enum('status', ['0', 'proses', 'selesai']);
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('masyarakat')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
}
