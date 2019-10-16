<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKerjasamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerjasamas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mitra');
            $table->string('deskripsi');
            $table->string('no_kontrak');
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
            $table->string('jenis');
            $table->string('no_kerja_mitra');
            $table->string('bidang');
            $table->string('dokumen')->nullable();
            $table->string('regional');
            $table->string('pengelola');
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
        Schema::dropIfExists('kerjasamas');
    }
}
