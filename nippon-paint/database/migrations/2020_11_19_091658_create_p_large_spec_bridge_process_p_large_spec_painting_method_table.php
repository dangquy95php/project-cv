<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargeSpecBridgeProcessPLargeSpecPaintingMethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_spec_bridge_process_p_large_spec_painting_method', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_spec_bridge_process_id')
                ->index('p_large_spec_bridge_process_method_bridge_process_id_index');
            $table->integer('p_large_spec_painting_method_id')
                ->index('p_large_spec_bridge_process_method_painting_method_id_index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_large_spec_bridge_process_p_large_spec_painting_method');
    }
}
