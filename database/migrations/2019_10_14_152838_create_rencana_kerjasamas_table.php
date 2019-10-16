<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRencanaKerjasamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_kerjasamas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis');
            $table->string('judul');
            $table->string('bidang_1')->nullable();
            $table->string('bidang_2')->nullable();
            $table->string('bidang_3')->nullable();
            $table->string('bidang_4')->nullable();
            $table->integer('user_id');
            $table->string('dokumen')->nullable();
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
        Schema::dropIfExists('rencana_kerjasamas');
    }
}
