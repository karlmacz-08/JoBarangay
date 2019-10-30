<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swipes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('swiper_id')->unsigned();
            $table->foreign('swiper_id')->references('id')->on('users');
            $table->integer('target_user_id')->unsigned();
            $table->foreign('target_user_id')->references('id')->on('users');
            $table->tinyInteger('action');
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
        Schema::dropIfExists('swipes');
    }
}
