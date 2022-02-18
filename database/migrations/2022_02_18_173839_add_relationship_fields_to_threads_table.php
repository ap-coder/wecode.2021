<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('threads', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id', 'author_fk_246788111')->references('id')->on('users');
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->foreign('topic_id', 'topic_fk_321403911')->references('id')->on('topics');
        });
    }
}
