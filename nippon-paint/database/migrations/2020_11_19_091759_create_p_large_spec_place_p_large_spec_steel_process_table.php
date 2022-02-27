<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargeSpecPlacePLargeSpecSteelProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_spec_place_p_large_spec_steel_process', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_spec_steel_process_id')
                ->index('p_large_spec_place_steel_process_steel_process_id_index');
            $table->integer('p_large_spec_place_id')
                ->index('p_large_spec_place_steel_process_place_id_index');
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
        Schema::dropIfExists('p_large_spec_place_p_large_spec_steel_process');
    }
}
