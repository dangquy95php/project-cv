<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnPAutomotivesApplicableClearPaints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_automotives', function (Blueprint $table) {
            $table->dropColumn('applicable_clear_paints');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_automotives', function (Blueprint $table) {
            $table->string('applicable_clear_paints')->nullable()->comment('適応クリヤー')->after('applicable_material');
        });
    }
}
