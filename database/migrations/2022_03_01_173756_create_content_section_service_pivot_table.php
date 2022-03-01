<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSectionServicePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_section_service', function (Blueprint $table) {
            $table->unsignedBigInteger('content_section_id');
            $table->foreign('content_section_id', 'content_section_id_fk_5649864120')->references('id')->on('content_sections')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_5649864120')->references('id')->on('services')->onDelete('cascade');
        });
    }
}
