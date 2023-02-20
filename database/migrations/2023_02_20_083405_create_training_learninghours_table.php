<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingLearninghoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_learninghours', function (Blueprint $table) {
            $table->increments('id_learninghours');
            $table->integer('durasigol_1');
            $table->integer('durasigol_2');
            $table->integer('durasigol_3');
            $table->integer('durasigol_4');
            $table->integer('durasigol_5');
            $table->integer('durasigol_6');
            $table->integer('durasi_ng');
            $table->integer('pesertagol_1');
            $table->integer('pesertagol_2');
            $table->integer('pesertagol_3');
            $table->integer('pesertagol_4');
            $table->integer('pesertagol_5');
            $table->integer('pesertagol_6');
            $table->integer('peserta_ng');
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
        Schema::dropIfExists('training_learninghours');
    }
}
