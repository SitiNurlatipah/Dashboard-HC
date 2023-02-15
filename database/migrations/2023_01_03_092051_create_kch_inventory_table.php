<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKchInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kch_inventory', function (Blueprint $table) {
            $table->increments('idkchinventory');
            $table->integer('idkchtarget')->unsigned();
            $table->foreign('idkchtarget')
                  ->references('idkchtargetsaving')->on('kch_target_saving')->onDelete('cascade');
            $table->integer('kchvalue_inventory');
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
        Schema::dropIfExists('kch_inventory');
    }
}
