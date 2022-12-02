<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_employees', function (Blueprint $table) {
            $table->increments('idTo');
            $table->unsignedInteger('realemployee_id')->unsigned();
            $table->foreign('realemployee_id')
                  ->references('idReal')->on('real_employees')->onDelete('cascade');
            $table->integer('intTotal');
            $table->integer('intToKaryawan');
            $table->integer('intToKontrak');
            $table->integer('intToOutsource');
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
        Schema::dropIfExists('to_employees');
    }
}
