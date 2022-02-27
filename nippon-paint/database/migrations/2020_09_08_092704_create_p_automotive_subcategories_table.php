<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePAutomotiveSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_automotive_subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->integer('parent_id')->nullable();
            $table->string('slug', 255)->nullable()->unique()->comment('スラッグ');
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
        Schema::dropIfExists('p_automotive_subcategories');
    }
}