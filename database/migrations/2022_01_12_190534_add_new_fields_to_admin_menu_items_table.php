<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToAdminMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_menu_items', function (Blueprint $table) {
            $table->boolean('local')->default(1)->nullable();
            $table->boolean('development')->default(1)->nullable();
            $table->boolean('stage')->default(0)->nullable();
            $table->boolean('production')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_menu_items', function (Blueprint $table) 
        {
            $table->dropColumn('local');
            $table->dropColumn('development');
            $table->dropColumn('stage');
            $table->dropColumn('production');
        });
    }
}
