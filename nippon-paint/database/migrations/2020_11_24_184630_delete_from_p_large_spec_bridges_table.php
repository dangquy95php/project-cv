<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteFromPLargeSpecBridgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_large_spec_bridges', function (Blueprint $table) {
            $table->dropColumn('section_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_large_spec_bridges', function (Blueprint $table) {
            $table->integer('section_id')->nullable()->comment('製品詳細__塗装区分')->after('p_large_standard_id');
        });
    }
}
