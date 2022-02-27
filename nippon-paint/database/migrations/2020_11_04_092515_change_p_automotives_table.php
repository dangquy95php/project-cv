<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePAutomotivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_automotives', function (Blueprint $table) {
            $table->text('mixing_ratio')->nullable()->comment('希釈率')->change();
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
            $table->text('mixing_ratio')->nullable()->comment('混合比率・シンナー希釈率')->change();
        });
    }
}
