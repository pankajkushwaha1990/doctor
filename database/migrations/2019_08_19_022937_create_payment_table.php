<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_no')->nullable(true);
            $table->string('offer_assign')->nullable(true);
            $table->string('debit_fee')->nullable(true);
            $table->string('payment_date')->nullable(true);
            $table->string('payment_status')->nullable(true);
            $table->string('request_for_invoice_status')->default('0');
            $table->string('agent_commision_payment')->default('0');
            $table->string('agent_commision_payment_status')->default('null');
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
        Schema::dropIfExists('payment');
    }
}
