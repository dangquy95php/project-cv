<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPLargeSpecDiluentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('p_large_spec_diluents');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('p_large_spec_diluents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->comment('希釈剤名');
            $table->timestamps();
        });
    }
}
