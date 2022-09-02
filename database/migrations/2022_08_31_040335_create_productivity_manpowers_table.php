<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductivityManpowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productivity_manpowers', function (Blueprint $table) {
            $table->id();
            $table->integer('intTotal');
            $table->integer('intPermanen');
            $table->integer('intContract');
            $table->integer('intOutputPlan');
            $table->integer('intOutputActual');
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
        Schema::dropIfExists('productivity_manpowers');
    }
}
