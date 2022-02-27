<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePLargeSpecSteelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_large_spec_steels', function (Blueprint $table) {
            $table->dropColumn('name_kana');
            $table->integer('section_id')->nullable()->comment('製品詳細__塗装区分')->change();
            $table->integer('p_large_standard_id')->default(0)->after('name')->comment('仕様規格');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_large_spec_steels', function (Blueprint $table) {
            $table->string('name_kana', 255)->index()->after('name')->comment('塗装系・適合規格（カナ）');
            $table->integer('section_id')->comment('製品詳細__塗装区分')->change();
            $table->dropColumn('p_large_standard_id');
        });
    }
}
