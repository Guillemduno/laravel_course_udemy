<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogpostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogpost_comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->text('comment');
            $table->unsignedInteger('blog_post_id');
            $table->foreign('blog_post_id')->references('id')->on('blog_posts');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogpost_comments');
    }
}
