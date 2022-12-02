<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkatanDinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikatan_dinas', function (Blueprint $table) {
            $table->increments('idIkatanDinas');
            $table->date('tglPelaksanaan');
            $table->date('tglBerakhir');
            $table->string('durasi');
            $table->string('peserta');
            $table->string('training');
            $table->string('vendor');
            $table->integer('biaya');
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
        Schema::dropIfExists('ikatan_dinas');
    }
}
