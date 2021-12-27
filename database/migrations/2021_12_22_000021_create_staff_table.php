<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('startdate')->nullable();
            $table->string('name')->nullable();
            $table->string('job_title')->nullable();
            $table->longText('short_intro')->nullable();
            $table->longText('bio')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->string('slug')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('other_link')->nullable();
            $table->string('staff_email')->nullable();
            $table->string('gravatar')->nullable();
            $table->boolean('in_teams')->default(0)->nullable();
            $table->boolean('is_author')->default(0)->nullable();
            $table->integer('order')->nullable();
            $table->boolean('list_on_about')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
