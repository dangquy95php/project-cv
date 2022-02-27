<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargeStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_standards', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_standard_category_id')->comment('カテゴリID');
            $table->string('standard_name')->comment('規格名');
            $table->string('slug')->comment('スラッグ');
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
        Schema::dropIfExists('p_large_standards');
    }
}
