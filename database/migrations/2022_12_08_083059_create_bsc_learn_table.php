<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBscLearnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bsc_learn', function (Blueprint $table) {
            $table->increments('idlearngrowth');
            $table->string('l_kpitype1');
            $table->string('l_kpitype2');
            $table->string('l_kpitype3');
            $table->string('l_mtdactual1');
            $table->string('l_mtdtarget1');
            $table->string('l_mtdach1');
            $table->string('l_mtdactual2');
            $table->string('l_mtdtarget2');
            $table->string('l_mtdach2');
            $table->string('l_mtdactual3');
            $table->string('l_mtdtarget3');
            $table->string('l_mtdach3');
            $table->string('l_ytdactual1');
            $table->string('l_ytdtarget1');
            $table->string('l_ytdach1');
            $table->string('l_ytdactual2');
            $table->string('l_ytdtarget2');
            $table->string('l_ytdach2');
            $table->string('l_ytdactual3');
            $table->string('l_ytdtarget3');
            $table->string('l_ytdach3');
            $table->date('l_bulan');
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
        Schema::dropIfExists('bsc_learn');
    }
}
