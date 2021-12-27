<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTechnologyPivotTable extends Migration
{
    public function up()
    {
        Schema::create('project_technology', function (Blueprint $table) {
            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id', 'technology_id_fk_5649978')->references('id')->on('technologies')->onDelete('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_5649978')->references('id')->on('projects')->onDelete('cascade');
        });
    }
}
