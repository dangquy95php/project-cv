<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDilutionRateToPBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_buildings', function (Blueprint $table) {
            $table->text('dilution_rate')->nullable()->comment('希釈率')->after('usage');
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
            $table->dropColumn('dilution_rate');
        });
    }
}
