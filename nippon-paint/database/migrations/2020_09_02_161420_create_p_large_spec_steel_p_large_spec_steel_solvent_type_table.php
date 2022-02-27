<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargeSpecSteelPLargeSpecSteelSolventTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_spec_steel_p_large_spec_steel_solvent_type', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_spec_steel_id')->comment('仕様ID');
            $table->integer('p_large_spec_steel_solvent_type_id')->comment('溶剤種別ID');
            $table->timestamps();

            $table->index(['p_large_spec_steel_id', 'p_large_spec_steel_solvent_type_id'], 'idx_spec_steel_solvent_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_large_spec_steel_p_large_spec_steel_solvent_type');
    }
}
