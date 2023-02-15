<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBscCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bsc_customer', function (Blueprint $table) {
            $table->increments('idcustomer');
            $table->string('c_kpitype1');
            $table->string('c_kpitype2');
            $table->string('c_kpitype3');
            $table->string('c_mtdactual1');
            $table->string('c_mtdtarget1');
            $table->string('c_mtdach1');
            $table->string('c_mtdactual2');
            $table->string('c_mtdtarget2');
            $table->string('c_mtdach2');
            $table->string('c_mtdactual3');
            $table->string('c_mtdtarget3');
            $table->string('c_mtdach3');
            $table->string('c_ytdactual1');
            $table->string('c_ytdtarget1');
            $table->string('c_ytdach1');
            $table->string('c_ytdactual2');
            $table->string('c_ytdtarget2');
            $table->string('c_ytdach2');
            $table->string('c_ytdactual3');
            $table->string('c_ytdtarget3');
            $table->string('c_ytdach3');
            $table->date('c_bulan');
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
        Schema::dropIfExists('bsc_customer');
    }
}
