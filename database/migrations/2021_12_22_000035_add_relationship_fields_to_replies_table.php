<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRepliesTable extends Migration
{
    public function up()
    {
        Schema::table('replies', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id', 'author_fk_5649552')->references('id')->on('users');
            $table->unsignedBigInteger('thread_id')->nullable();
            $table->foreign('thread_id', 'thread_fk_5649556')->references('id')->on('threads');
        });
    }
}
