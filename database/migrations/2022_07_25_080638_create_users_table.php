<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('txtUsername');
            $table->string('txtPassword');
            $table->string('txtNik');
            $table->string('txtEmployeeName');
            $table->string('txtJobTitle');
            $table->string('txtDepartment');
            $table->string('txtEmail');
            $table->string('txtStatus');
            $table->string('txtType');
            $table->date('dtmStartDate');
            $table->date('dtmEndDate');
            $table->string('txtGender');
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
        Schema::dropIfExists('users');
    }
}
