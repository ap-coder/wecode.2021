<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('intro')->nullable();
            $table->longText('body_content')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->string('slug')->nullable();
            $table->date('start_date')->nullable();
            $table->string('project_type')->nullable();
            $table->longText('challenges')->nullable();
            $table->longText('solutions')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('fb_title')->nullable();
            $table->string('tw_title')->nullable();
            $table->string('fb_description')->nullable();
            $table->string('tw_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
