<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargePLargeDiluentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_p_large_diluent', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_id')->comment('製品ID');
            $table->integer('p_large_diluent_id')->comment('溶剤種別ID');
            $table->timestamps();
            $table->index(['p_large_id', 'p_large_diluent_id'], 'p_large_id_p_large_diluent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_large_p_large_diluent');
    }
}
