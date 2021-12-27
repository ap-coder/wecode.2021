<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('content_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section_title');
            $table->integer('order')->nullable();
            $table->longText('section')->nullable();
            $table->string('location')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
