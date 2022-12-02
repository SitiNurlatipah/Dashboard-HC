<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceScorecardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_scorecards', function (Blueprint $table) {
            $table->increments('idfinancial');
            $table->bigInteger('netsales_ytd');
            $table->bigInteger('hrcost_ytd');
            $table->bigInteger('employee_ytd');
            $table->bigInteger('gp_ytd');
            $table->bigInteger('op_ytd');
            $table->bigInteger('netsales_mtd');
            $table->bigInteger('hrcost_mtd');
            $table->bigInteger('employee_mtd');
            $table->bigInteger('gp_mtd');
            $table->bigInteger('op_mtd');
            $table->bigInteger('netsales_ytdtarget');
            $table->bigInteger('hrcost_ytdtarget');
            $table->bigInteger('employee_ytdtarget');
            $table->bigInteger('gp_ytdtarget');
            $table->bigInteger('op_ytdtarget');
            $table->bigInteger('netsales_mtdtarget');
            $table->bigInteger('hrcost_mtdtarget');
            $table->bigInteger('employee_mtdtarget');
            $table->bigInteger('gp_mtdtarget');
            $table->bigInteger('op_mtdtarget');
            $table->string('kpitype');
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
        Schema::dropIfExists('balance_scorecards');
    }
}
