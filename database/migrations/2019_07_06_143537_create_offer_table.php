<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer', function (Blueprint $table) {
            $table->increments('id');
             $table->string('date_of_issue');
            $table->string('offer_no');
            $table->string('agent_id');
            $table->string('student_id');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('orientation_date');
            $table->string('course_details_id')->nullable(true);
            $table->string('payment_plan')->nullable(true);
            $table->string('airport_amount')->nullable(true);
            $table->string('oshc_amount')->nullable(true);
            $table->string('homestay_week')->nullable(true);
            $table->string('placement_amount')->nullable(true);
            $table->string('homestay_amount')->nullable(true);
            $table->string('prior_amount');
            $table->string('discount_amount');
            $table->string('course_code_o');
            $table->string('course_name_o');
            $table->string('course_duration');
            $table->string('course_amount');
            $table->string('material_amount');
            

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
        Schema::dropIfExists('offer');
    }
}
