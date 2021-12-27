<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('video_url')->nullable();
            $table->string('read_time')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id', 'author_fk_23322351')->references('id')->on('staff');
        });
    }

}
