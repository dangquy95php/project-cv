<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePBuildingPBuildingPaintingMethodSuitableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_building_p_building_painting_method_suitable', function (Blueprint $table) {
            $table->id();
            $table->integer('p_building_id')->index('p_building_painting_method_us_p_building_id_index');
            $table->integer('p_building_painting_method_id')->index('p_building_painting_method_us_painting_method_id_index');
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
        Schema::dropIfExists('p_building_p_building_painting_method_suitable');
    }
}
