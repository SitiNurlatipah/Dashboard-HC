<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductivityGrowthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productivity_growths', function (Blueprint $table) {
            $table->increments('idGrowth'); 
            $table->date('dateBulanGrowth');
            $table->unsignedBigInteger('manpower_id')->unsigned();
            $table->foreign('manpower_id')
                  ->references('id')->on('productivity_manpowers')->onDelete('cascade');
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
        Schema::dropIfExists('productivity_growths');
    }
}
