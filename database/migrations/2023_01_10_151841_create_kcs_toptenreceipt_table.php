<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKcsToptenreceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kcs_toptenreceipt', function (Blueprint $table) {
            $table->increments('idkcstoptenreceipt');
            $table->integer('costreceipt');
            $table->string('description');
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
        Schema::dropIfExists('kcs_toptenreceipt');
    }
}
