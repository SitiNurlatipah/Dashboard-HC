<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMppEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpp_employees', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->integer('mppPermanent');
            $table->integer('mppContract');
            $table->integer('mppJobsupply');
            $table->integer('mppTotal');
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
        Schema::dropIfExists('mpp_employees');
    }
}
