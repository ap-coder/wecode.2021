<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVideoContentsTable extends Migration
{
    public function up()
    {
        Schema::table('video_contents', function (Blueprint $table) {
            $table->unsignedBigInteger('thread_id')->nullable();
            $table->foreign('thread_id', 'thread_fk_5649603')->references('id')->on('threads');
        });
    }
}
