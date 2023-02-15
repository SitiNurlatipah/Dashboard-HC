<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollDukacitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_dukacita', function (Blueprint $table) {
            $table->increments('id_dukacita');
            $table->integer('id_department')->unsigned();
            $table->foreign('id_department')
                  ->references('iddepartment')->on('department')->onDelete('cascade');
            $table->string('nama');
            $table->string('keterangan');
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
        Schema::dropIfExists('payroll_dukacita');
    }
}
