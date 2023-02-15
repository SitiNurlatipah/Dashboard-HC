<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_berita', function (Blueprint $table) {
            $table->increments('idberita');
            $table->integer('id_department')->unsigned();
            $table->foreign('id_department')
                  ->references('iddepartment')->on('department')->onDelete('cascade');
            $table->date('bulan');
            $table->integer('dukacita');
            $table->integer('kelahiran');
            $table->integer('terlambat');
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
        Schema::dropIfExists('payroll_berita');
    }
}
