<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSortToPLargeStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_large_standards', function (Blueprint $table) {
            $table->integer('sort')->nullable()->after('slug')->comment('ソート順');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_large_standards', function (Blueprint $table) {
            $table->dropColumn('sort');
        });
    }
}
