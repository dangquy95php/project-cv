<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_buildings', function (Blueprint $table) {
            $table->renameColumn('color_exception', 'color')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_buildings', function (Blueprint $table) {
            $table->renameColumn('color', 'color_exception')->change();
        });
    }
}
