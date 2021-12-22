<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoContentsTable extends Migration
{
    public function up()
    {
        Schema::create('video_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('published')->default(0)->nullable();
            $table->boolean('public_everywhere')->default(0)->nullable();
            $table->string('title');
            $table->string('alternate_title')->nullable();
            $table->longText('content_area')->nullable();
            $table->string('youtube')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('other_video')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('fbt')->nullable();
            $table->string('fbd')->nullable();
            $table->string('twt')->nullable();
            $table->string('twd')->nullable();
            $table->longText('notes_area')->nullable();
            $table->string('video_type')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
