<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSectionPagePivotTable extends Migration
{
    public function up()
    {
        Schema::create('content_section_page', function (Blueprint $table) {
            $table->unsignedBigInteger('content_section_id');
            $table->foreign('content_section_id', 'content_section_id_fk_5649862')->references('id')->on('content_sections')->onDelete('cascade');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id', 'page_id_fk_5649862')->references('id')->on('pages')->onDelete('cascade');
        });
    }
}
