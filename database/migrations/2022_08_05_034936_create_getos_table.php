<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('getos', function (Blueprint $table) {
            $table->increments('idGeto');
            $table->unsignedBigInteger('realemployee')->unsigned();
            $table->foreign('realemployee')
                  ->references('idReal')->on('real_employees')->onDelete('cascade');
            $table->integer('intTotal');
            $table->integer('intGetoKaryawan');
            $table->integer('intGetoKontrak');
            $table->integer('intGetoOutsource');
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
        Schema::dropIfExists('getos');
    }
}
