<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('published')->default(0)->nullable();
            $table->boolean('private')->default(0)->nullable();
            $table->boolean('best_answer')->default(0)->nullable();
            $table->longText('content_area')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
