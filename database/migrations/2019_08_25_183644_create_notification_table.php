<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->increments('id');
            $table->string('agent_array');
            $table->string('agent_id');
            $table->string('agent_name');
            $table->string('agent_email');
            $table->string('notification_subject');
            $table->string('notification_message');
            $table->string('attachment');
            $table->string('agent_read_status');
            $table->string('message_to_type');
            $table->string('message_from_type');
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
        Schema::dropIfExists('notification');
    }
}
