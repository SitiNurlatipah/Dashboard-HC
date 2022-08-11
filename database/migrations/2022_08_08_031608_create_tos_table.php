<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tos', function (Blueprint $table) {
            $table->id();
            $table->integer('intTotal');
            $table->integer('intToKaryawan');
            $table->integer('intToKontrak');
            $table->integer('intToOutsource');
            $table->string('txtBulanInput');
            $table->date('dateTglInput');
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
        Schema::dropIfExists('tos');
    }
}
