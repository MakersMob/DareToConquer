<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('seo_title');
            $table->string('summary');
            $table->string('slug');
            $table->integer('price')->default(79);
            $table->text('description');
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        Schema::create('journey_user', function (Blueprint $table) {
            $table->integer('journey_id')->unsigned();
            $table->foreign('journey_id')->references('id')->on('journeys');
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
        Schema::dropIfExists('journey_user');
        Schema::dropIfExists('journeys');
    }
}
