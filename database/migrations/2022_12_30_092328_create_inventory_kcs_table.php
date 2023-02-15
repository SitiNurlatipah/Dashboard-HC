<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryKcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_kcs', function (Blueprint $table) {
            $table->increments('idinventory');
            $table->integer('idsavingcost')->unsigned();
            $table->foreign('idsavingcost')
                  ->references('idtargetsaving')->on('target_saving_kcs')->onDelete('cascade');
            $table->integer('valueinventory');
            $table->integer('valuesaving');
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
        Schema::dropIfExists('inventory_kcs');
    }
}
