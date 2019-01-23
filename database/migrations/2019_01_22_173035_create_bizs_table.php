<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bizs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('url');
            $table->string('feed')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->text('description')->nullable();
            $table->boolean('guest_post')->default('0');
            $table->text('guest_post_description')->nullable();
            $table->timestamps();
        });

        Schema::create('biz_niche', function (Blueprint $table) {
            $table->integer('biz_id')->unsigned();
            $table->foreign('biz_id')->references('id')->on('bizs');
            $table->integer('niche_id')->unsigned();
            $table->foreign('niche_id')->references('id')->on('niches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biz_niche');
        Schema::dropIfExists('bizs');
    }
}
