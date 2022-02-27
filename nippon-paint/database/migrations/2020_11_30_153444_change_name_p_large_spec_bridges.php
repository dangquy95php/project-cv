<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNamePLargeSpecBridges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_large_spec_bridges', function (Blueprint $table) {
            $table->dropIndex('p_large_spec_bridges_name_unique');
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
            //ユニークでないものが保存されている場合は戻せないので定義しない
        });
    }
}
