<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBccInternalbussinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bcc_internalbusiness', function (Blueprint $table) {
            $table->increments('idbussiness');
            $table->string('kpitype1');
            $table->string('kpitype2');
            $table->string('mtdactual1');
            $table->string('mtdtarget1');
            $table->string('mtdach1');
            $table->string('mtdactual2');
            $table->string('mtdtarget2');
            $table->string('mtdach2');
            $table->string('ytdactual1');
            $table->string('ytdtarget1');
            $table->string('ytdach1');
            $table->string('ytdactual2');
            $table->string('ytdtarget2');
            $table->string('ytdach2');
            $table->date('bulan');
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
        Schema::dropIfExists('bcc_internalbussiness');
    }
}
