<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_main', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_fname');
            $table->string('user_lname');
            $table->date('user_dob');
            $table->string('user_name')->index()->nullable()->unique();
            $table->string('user_email')->index()->unique();
            $table->string('user_password');
            $table->timestamp('user_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_resets');
    }
}
