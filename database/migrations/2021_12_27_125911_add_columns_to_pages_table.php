<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('published')->default(0)->nullable();
            $table->boolean('use_textonly_header')->default(0)->nullable();
            $table->boolean('show_title')->default(0)->nullable();
            $table->boolean('show_tagline')->default(0)->nullable();
            $table->boolean('show_featured_content')->default(0)->nullable();
            $table->boolean('use_svg_header')->default(0)->nullable();
            $table->boolean('use_featured_image_header')->default(0)->nullable();
            $table->text('featured_image_content')->nullable();
            $table->text('svg_masthead')->nullable();
            $table->string('title_style')->nullable();
            $table->string('tagline_style')->nullable();
            $table->string('fi_content_style')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('facebook_title')->nullable();
            $table->string('facebook_description')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('twitter_description')->nullable();
        });
    }

}
