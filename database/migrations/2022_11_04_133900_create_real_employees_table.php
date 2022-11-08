<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_employees', function (Blueprint $table) {
            $table->increments('idReal');
            $table->unsignedBigInteger('mpp_tahun')->unsigned();
            $table->foreign('mpp_tahun')
                  ->references('id')->on('mpp_employees')->onDelete('cascade');
            $table->integer('realPermanent');
            $table->integer('realContract');
            $table->integer('realJobSupply');
            $table->date('dateBulan');
            $table->integer('realTotal');
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
        Schema::dropIfExists('real_employees');
    }
}
