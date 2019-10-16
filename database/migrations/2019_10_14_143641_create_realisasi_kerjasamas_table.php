<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealisasiKerjasamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi_kerjasamas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mitra');
            $table->string('deskripsi');
            $table->string('pelaksana');
            $table->string('kegiatan');
            $table->string('no_kontrak');
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
            $table->string('pj_univ');
            $table->string('pj_mitra');
            $table->string('dokumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realisasi_kerjasamas');
    }
}
