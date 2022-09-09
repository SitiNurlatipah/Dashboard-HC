<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingRealizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_realizations', function (Blueprint $table) {
            $table->id();
            $table->string('txtTrainingName');
            $table->string('txtPelaksanaan');
            $table->string('txtMedia');
            $table->string('txtTrainee');
            $table->string('txtFormUsulan');
            $table->string('txtStatus');
            $table->string('txtTrainingType');
            $table->string('txtTrainer');
            $table->string('txtReason');
            $table->integer('intTotalParticipant');
            $table->integer('intTotalCost');
            $table->integer('intSumOfSession');
            $table->time('timeDurationStart');
            $table->time('timeDurationEnd');
            $table->time('timeDurationTotal');
            $table->time('timeTrainingHour');
            $table->date('dateTanggal');
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
        Schema::dropIfExists('training_realizations');
    }
}
