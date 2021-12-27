<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagePagesectionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('page_pagesection', function (Blueprint $table) {
            $table->unsignedBigInteger('pagesection_id');
            $table->foreign('pagesection_id', 'pagesection_id_fk_5649848')->references('id')->on('pagesections')->onDelete('cascade');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id', 'page_id_fk_5649848')->references('id')->on('pages')->onDelete('cascade');
        });
    }
}
