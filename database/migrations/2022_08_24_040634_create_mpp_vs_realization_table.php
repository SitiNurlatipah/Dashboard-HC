<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMppVsRealizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpp_vs_realization', function (Blueprint $table) {
            $table->id();
            $table->integer('intMppPermanent');
            $table->integer('intRealPermanent');
            $table->integer('intMppContract');
            $table->integer('intRealContract');
            $table->integer('intMppJobSupply');
            $table->integer('intRealJobSupply');
            $table->date('dateBulan');
            $table->integer('intTotal');
            $table->string('txtMtdAdjusment');
            $table->integer('intAdd');
            $table->integer('intReduce');
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
        Schema::dropIfExists('mpp_vs_realization');
    }
}
