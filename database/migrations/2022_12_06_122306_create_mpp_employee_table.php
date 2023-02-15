<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMppEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpp_employee', function (Blueprint $table) {
            $table->increments('idmpp');
            $table->integer('mppPermanent');
            $table->integer('mppContract');
            $table->integer('mppTotal');
            $table->integer('mppJobsupply');
            $table->string('tahun');
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
        Schema::dropIfExists('mpp_employee');
    }
}
