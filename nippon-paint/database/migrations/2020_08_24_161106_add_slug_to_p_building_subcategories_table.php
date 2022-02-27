<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToPBuildingSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_building_subcategories', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->unique()->comment('スラッグ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_building_subcategories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
