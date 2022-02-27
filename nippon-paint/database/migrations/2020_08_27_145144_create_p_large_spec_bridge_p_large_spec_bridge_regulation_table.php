<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargeSpecBridgePLargeSpecBridgeRegulationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_spec_bridge_p_large_spec_bridge_regulation', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_spec_bridge_id')->comment('仕様ID');
            $table->integer('p_large_standard_id')->comment('仕様規格ID');
            $table->timestamps();

            $table->index(['p_large_spec_bridge_id', 'p_large_standard_id'], 'idx_spec_bridge_regulation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_large_spec_bridge_p_large_spec_bridge_regulation');
    }
}
