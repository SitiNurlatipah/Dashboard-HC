<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTotalPerMonthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_total_per_month', function (Blueprint $table) {
            $table->increments('idTrainingTotalPerMonth'); 
            $table->integer('intInternal');
            $table->integer('intInHouse');
            $table->integer('IntExternal');
            $table->date('dateBulan');
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
        Schema::dropIfExists('training_total_per_month');
    }
}
