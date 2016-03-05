<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_education', function(Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->integer('college_id')->unsigned();
            $table->integer('college_start_year');
            $table->integer('college_end_year')->nullable();
            $table->integer('course_major_id')->unsigned();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('college_id')
                  ->references('college_id')
                  ->on('colleges')
                  ->onDelete('cascade');

            $table->foreign('course_major_id')
                  ->references('course_major_id')
                  ->on('course_major')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_education');
    }
}
