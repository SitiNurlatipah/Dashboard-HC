<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostcenterKasbonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costcenter_kasbon', function (Blueprint $table) {
            
            $table->increments('idKasbon');
            $table->unsignedBigInteger('costcenter_id')->unsigned();
            $table->foreign('costcenter_id')
                  ->references('id')->on('cost_centers')->onDelete('cascade');
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
        Schema::dropIfExists('costcenter_kasbon');
    }
}
