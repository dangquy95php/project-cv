<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePAutomotivePAutomotiveCharacteristicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_automotive_p_automotive_characteristic', function (Blueprint $table) {
            $table->id();
            $table->integer('p_automotive_id');
            $table->integer('p_automotive_characteristic_id');
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
        Schema::dropIfExists('p_automotive_p_automotive_characteristic');
    }
}
