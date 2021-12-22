<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesectionsTable extends Migration
{
    public function up()
    {
        Schema::create('pagesections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('section');
            $table->string('section_nickname')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
