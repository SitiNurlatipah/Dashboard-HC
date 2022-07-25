<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('txtNik');
            $table->string('txtEmployee_name');
            $table->string('txtJob_title');
            $table->string('txtDepartment');
            $table->string('txtEmail');
            $table->string('txtStatus_employee');
            $table->string('txtEmployee_type');
            $table->date('dtmStart_date');
            $table->date('dtmEnd_date');
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
        Schema::dropIfExists('user');
    }
}
