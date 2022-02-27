<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentPLargeSpecBridgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_p_large_spec_bridge', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_spec_bridge_id')->index();
            $table->integer('document_id')->index();
            $table->integer('sort');
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
        Schema::dropIfExists('document_p_large_spec_bridge');
    }
}
