<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargeSpecSteelPLargeSpecSteelPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_spec_steel_p_large_spec_steel_point', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_spec_steel_id')->comment('仕様ID');
            $table->integer('p_large_spec_steel_point_id')->comment('適用部位ID');
            $table->timestamps();

            $table->index(['p_large_spec_steel_id', 'p_large_spec_steel_point_id'], 'idx_spec_steel_point');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_large_spec_steel_p_large_spec_steel_point');
    }
}
