<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductivityHumancostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productivity_humancosts', function (Blueprint $table) {
            $table->id();
            $table->integer('intCostPlan');
            $table->integer('intCostActual');
            $table->integer('intOutputActual');
            $table->integer('intOutputPlan');
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
        Schema::dropIfExists('productivity_humancosts');
    }
}
