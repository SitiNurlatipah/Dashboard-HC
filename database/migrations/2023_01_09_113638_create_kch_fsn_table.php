<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKchFsnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kch_fsn', function (Blueprint $table) {
            $table->increments('idkchfsn');
            $table->integer('fastmoving');
            $table->integer('slowmoving');
            $table->integer('nonmoving');
            $table->integer('deadstock');
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
        Schema::dropIfExists('kch_fsn');
    }
}
