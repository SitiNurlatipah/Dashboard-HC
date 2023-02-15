<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKchToptenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kch_topten', function (Blueprint $table) {
            $table->increments('idkchtopten');
            $table->string('kchitem');
            $table->string('itemdescription');
            $table->string('uom');
            $table->string('onhand');
            $table->float('itemcost');
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
        Schema::dropIfExists('kch_topten');
    }
}
