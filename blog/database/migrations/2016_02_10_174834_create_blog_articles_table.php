<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->increments('article_id'); 
            $table->string('article_title');
            $table->text('article_body');
            $table->string('short_desc',200)->nullable();
            $table->string('slug')->nullable();
            $table->string('tags')->nullable();
            $table->string('cover_pic')->nullable();
            $table->integer('blog_id')->unsigned();
            $table->timestamps();

            $table->foreign('blog_id')
                  ->references('blog_id')
                  ->on('blogs')
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
        Schema::drop('blog_articles');
    }
}
