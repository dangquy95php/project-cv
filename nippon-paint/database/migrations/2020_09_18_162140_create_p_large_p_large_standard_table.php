<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargePLargeStandardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_p_large_standard', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_id');
            $table->integer('p_large_standard_id');
            $table->timestamps();
            $table->index(['p_large_id', 'p_large_standard_id'], 'p_large_id_p_large_standard_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_large_p_large_standard');
    }
}
