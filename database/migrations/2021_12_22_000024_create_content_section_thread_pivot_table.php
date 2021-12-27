<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSectionThreadPivotTable extends Migration
{
    public function up()
    {
        Schema::create('content_section_thread', function (Blueprint $table) {
            $table->unsignedBigInteger('content_section_id');
            $table->foreign('content_section_id', 'content_section_id_fk_5649864')->references('id')->on('content_sections')->onDelete('cascade');
            $table->unsignedBigInteger('thread_id');
            $table->foreign('thread_id', 'thread_id_fk_5649864')->references('id')->on('threads')->onDelete('cascade');
        });
    }
}
