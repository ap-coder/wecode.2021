<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageVideoContentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('page_video_content', function (Blueprint $table) {
            $table->unsignedBigInteger('video_content_id');
            $table->foreign('video_content_id', 'video_content_id_fk_5649604')->references('id')->on('video_contents')->onDelete('cascade');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id', 'page_id_fk_5649604')->references('id')->on('pages')->onDelete('cascade');
        });
    }
}
