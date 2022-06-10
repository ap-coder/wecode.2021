<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->bigIncrements('at_id');
            $table->unsignedBigInteger('at_uid')->nullable();
            $table->foreign('at_uid', 'at_uid_fk_24678811100')->references('id')->on('users');
            $table->string('at_title');
            $table->text('at_desc')->nullable();
            $table->text('at_file');
            $table->longText('at_files')->nullable();
            $table->string('at_mimes');
            $table->text('at_type');
            $table->integer('at_size')->nullable();
            $table->text('at_dimensions', '32')->nullable();
            $table->dateTime('at_modified')->useCurrent();;
            $table->tinyInteger('trash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
