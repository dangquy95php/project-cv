<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnPLargesFeature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_larges', function (Blueprint $table) {
            $table->dropColumn('feature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_larges', function (Blueprint $table) {
            $table->text('feature')->nullable()->comment('製品特長')->after('description');
        });
    }
}
