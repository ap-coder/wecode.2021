<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->longText('excerpt')->nullable();
            $table->string('path')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('fb_title')->nullable();
            $table->string('fb_description')->nullable();
            $table->string('tw_title')->nullable();
            $table->string('tw_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
