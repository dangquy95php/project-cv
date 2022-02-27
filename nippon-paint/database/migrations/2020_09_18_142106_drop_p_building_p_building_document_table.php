<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPBuildingPBuildingDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('p_building_p_building_document');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('p_building_p_building_document', function (Blueprint $table) {
            $table->id();
            $table->integer('p_building_id')->index();
            $table->integer('p_building_document_id')->index();
            $table->integer('sort');
            $table->timestamps();
        });
    }
}
