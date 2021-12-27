<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSectionPostPivotTable extends Migration
{
    public function up()
    {
        Schema::create('content_section_post', function (Blueprint $table) {
            $table->unsignedBigInteger('content_section_id');
            $table->foreign('content_section_id', 'content_section_id_fk_5649863')->references('id')->on('content_sections')->onDelete('cascade');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'post_id_fk_5649863')->references('id')->on('posts')->onDelete('cascade');
        });
    }
}
