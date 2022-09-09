<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvgRecruitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avg_recruitments', function (Blueprint $table) {
            $table->increments('idRecruitment');
            $table->integer('intPermanent1');
            $table->integer('intPermanent2');
            $table->integer('intPermanent3');
            $table->integer('intPermanent4');
            $table->integer('intPermanent5');
            $table->integer('intStdPermanent');
            $table->integer('intStdContract');
            $table->integer('intContract');
            $table->integer('intStdJobSupply');
            $table->integer('intJobSupply');
            $table->integer('intStdInternship');
            $table->integer('intInternship');
            $table->date('dateBulanAvg');
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
        Schema::dropIfExists('avg_recruitments');
    }
}
