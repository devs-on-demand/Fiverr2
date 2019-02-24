<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('form_id');
            $table->string('JSONString',400);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('form_id')->references('id')->on('subscription_forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responses');
    }
}
