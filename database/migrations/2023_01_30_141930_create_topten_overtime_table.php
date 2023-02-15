<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToptenOvertimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topten_overtime', function (Blueprint $table) {
            $table->increments('idtop_ot');
            $table->integer('id_department')->unsigned();
            $table->foreign('id_department')
                  ->references('iddepartment')->on('department')->onDelete('cascade');
            $table->string('nama');
            $table->string('nik');
            $table->float('otweighthour');
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
        Schema::dropIfExists('topten_overtime');
    }
}
