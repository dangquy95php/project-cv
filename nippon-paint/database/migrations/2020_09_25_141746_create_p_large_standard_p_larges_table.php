<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargeStandardPLargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_standard_p_larges', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_standard_id')->comment('規格ID');
            $table->integer('p_large_id')->comment('製品ID');
            $table->string('general_name')->nullable()->comment('一般名称');
            $table->string('general_standard_number')->nullable()->comment('製品規格番号');
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
        Schema::dropIfExists('p_large_standard_p_larges');
    }
}
