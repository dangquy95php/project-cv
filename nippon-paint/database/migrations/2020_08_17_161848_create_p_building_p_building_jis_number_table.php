<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePBuildingPBuildingJisNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_building_p_building_jis_number', function (Blueprint $table) {
            $table->id();
            $table->integer('p_building_id')->index();
            $table->integer('p_building_jis_number_id')->index();
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
        Schema::dropIfExists('p_building_p_building_jis_number');
    }
}
