<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assign_id')->nullable(true);
            $table->string('title')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->string('date_of_birth')->nullable(true);
            $table->string('surname')->nullable(true);
            $table->string('given_name')->nullable(true);
            $table->string('proffered_name')->nullable(true);
            $table->string('passport_number')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('street_address')->nullable(true);
            $table->string('town')->nullable(true);
            $table->string('state');
            $table->integer('post_code');
            $table->string('country')->nullable(true);
            $table->string('phone_number')->nullable(true);
            $table->string('birth_country')->nullable(true);
            $table->string('town_city_birth')->nullable(true);
            $table->string('valid_australian_visa')->nullable(true);
            $table->string('australian_visa_details')->nullable(true);
            $table->string('emergency_contact_name')->nullable(true);
            $table->string('emergency_relation_to_you')->nullable(true);
            $table->string('emergency_contact_number')->nullable(true);
            $table->string('other_than_english')->nullable(true);
            $table->string('other_than_english_specify')->nullable(true);
            $table->string('islander_origin')->nullable(true);
            $table->string('significant_disability')->nullable(true);
            $table->string('disability_value')->nullable(true);
            $table->string('english_test')->nullable(true);
            $table->string('english_test_specify')->nullable(true);
            $table->string('english_score')->nullable(true);
            $table->string('english_date')->nullable(true);
            $table->string('health_cover')->nullable(true);
            $table->string('mambership_no')->nullable(true);
            $table->string('policy_no')->nullable(true);
            $table->string('policy_expire')->nullable(true);
            $table->string('highest_school')->nullable(true);
            $table->string('year_completed')->nullable(true);
            $table->string('completion_country')->nullable(true);
            $table->string('is_completed_qualification')->nullable(true);
            $table->string('completed_qualification')->nullable(true);
            $table->string('country_qualification')->nullable(true);
            $table->string('reason_qualification')->nullable(true);
            $table->string('employment_status')->nullable(true);
            $table->string('course_code')->nullable(true);
            $table->string('course_start_date')->nullable(true);
            $table->string('credit_transfer')->nullable(true);
            $table->string('previous_studies')->nullable(true);
            $table->string('require_airport')->nullable(true);
            $table->string('require_assistance')->nullable(true);
            $table->string('usi_code')->nullable(true);
            $table->string('passport_file')->nullable(true);
            $table->string('qualification_file')->nullable(true);
            $table->string('language_file')->nullable(true);
            $table->string('oshc_file')->nullable(true);
            $table->string('student_signature_file')->nullable(true);
            $table->string('submit_date')->nullable(true);        
            $table->string('approval_status')->nullable(true);       
            $table->string('coe_status')->nullable(true);       
            $table->integer('status');
            $table->string('created_by_type')->nullable(true);
            $table->string('created_by_id')->nullable(true);
            $table->string('message')->nullable(true);
            $table->string('airport_amount')->nullable(true);
            $table->string('oshc_amount')->nullable(true);
            $table->string('placement_amount')->nullable(true);
            $table->string('homestay_amount')->nullable(true);
            $table->integer('homestay_week')->nullable(true);
            $table->string('student_other_file')->nullable(true);
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
        Schema::dropIfExists('students');
    }
}
