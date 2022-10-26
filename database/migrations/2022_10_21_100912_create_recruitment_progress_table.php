<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_progress', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('recruitmentStatus');
            $table->string('fptkStatus');
            $table->string('interviewHrStatus');
            $table->string('interviewUser1Status');
            $table->string('interviewUser2Status');
            $table->string('interviewUser3Status');
            $table->string('psikotesStatus');
            $table->string('mcuStatus');
            $table->string('ttdStatus');
            $table->string('joinStatus');
            $table->date('tanggalFptk');
            $table->date('tanggalInterviewHr');
            $table->date('tanggalInterviewUser1');
            $table->date('tanggalInterviewUser2');
            $table->date('tanggalInterviewUser3');
            $table->date('tanggalPsikotes');
            $table->date('tanggalMcu');
            $table->date('tanggalTtd');
            $table->date('tanggalJoin');
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
        Schema::dropIfExists('recruitment_progress');
    }
}
