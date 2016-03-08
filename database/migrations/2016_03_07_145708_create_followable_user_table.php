<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowableUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followable_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('followable_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('followable_id')->references('id')->on('followables');
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
        Schema::drop('followable_user');
    }
}
