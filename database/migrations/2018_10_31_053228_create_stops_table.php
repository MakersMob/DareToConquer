<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stops', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->string('slug');
            $table->text('content');
            $table->integer('order')->default(0);
            $table->boolean('active')->default(0);
            $table->integer('journey_id')->unsigned();
            $table->foreign('journey_id')->references('id')->on('journeys');
            $table->timestamps();
        });

        Schema::create('stop_user', function (Blueprint $table) {
            $table->integer('stop_id')->unsigned();
            $table->foreign('stop_id')->references('id')->on('stops');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('stop_user');
        Schema::dropIfExists('stops');
    }
}
