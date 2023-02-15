<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKcsReceiptandissueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kcs_receiptandissue', function (Blueprint $table) {
            $table->increments('idreceiptissue');
            $table->integer('po_receipt');
            $table->integer('usage');
            $table->integer('itemusage');
            $table->integer('itemreceipt');
            $table->date('bulan');
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
        Schema::dropIfExists('kcs_receiptandissue');
    }
}
