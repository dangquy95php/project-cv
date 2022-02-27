<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePAutomotiveApplicableClearPaintsForRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_automotive_applicable_clear_paints', function (Blueprint $table) {
            $table->id();
            $table->integer('p_automotive_id');
            $table->integer('applicable_clear_paint_id');
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
        Schema::dropIfExists('p_automotive_applicable_clear_paints');
    }
}
