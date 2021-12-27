<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longText('body_text')->nullable();
            $table->longText('excerpt')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('facebook_title')->nullable();
            $table->string('facebook_desc')->nullable();
            $table->string('twitter_post_description')->nullable();
            $table->string('twitter_post_title')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->string('slug')->nullable();
            $table->string('contributor')->nullable();
            $table->string('contributor_link')->nullable();
            $table->string('contributor_2')->nullable();
            $table->string('contributor_2_link')->nullable();
            $table->integer('menu_order')->nullable();
            $table->string('comment_status')->nullable();
            $table->string('post_password')->nullable();
            $table->integer('comment_count')->nullable();
            $table->boolean('ping_status')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
