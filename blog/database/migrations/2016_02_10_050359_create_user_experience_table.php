<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_experience',function(Blueprint $table){

            
            $table->integer('user_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('experience_start_year');
            $table->integer('experience_end_year')->nullable();
            $table->string('position');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('company_id')
                  ->references('company_id')
                  ->on('companies')
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
        Schema::drop('user_experience');
    }
}
