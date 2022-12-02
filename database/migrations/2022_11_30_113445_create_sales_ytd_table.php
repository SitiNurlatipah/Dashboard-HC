<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesYtdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_ytd', function (Blueprint $table) {
            $table->increments('idYtd');
            $table->integer('salesInYtd');
            $table->integer('salesOutYtd');
            $table->integer('hrCostYtd');
            $table->integer('headCountYtd');
            $table->year('tahun');
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
        Schema::dropIfExists('sales_ytd');
    }
}
