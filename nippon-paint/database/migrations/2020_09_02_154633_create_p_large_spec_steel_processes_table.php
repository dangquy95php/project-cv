<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargeSpecSteelProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_spec_steel_processes', function (Blueprint $table) {
            $table->id();
            $table->integer('p_large_spec_steel_id')->index()->comment('仕様ID');
            $table->integer('sort')->comment('ソート順');
            $table->string('process_name', 255)->comment('塗装工程');
            $table->integer('field_type')->comment('フィールドタイプ');
            $table->text('detail')->nullable()->comment('工程内容');
            $table->integer('p_large_id')->nullable()->index()->comment('製品ID');
            $table->string('usage', 255)->nullable()->comment('使用量（kg/㎡/回）');
            $table->string('dried_time', 255)->nullable()->comment('塗り重ね乾燥時間（摂氏23度）');
            $table->integer('p_large_spec_diluent_id')->nullable()->comment('希釈剤ID');
            $table->string('dilution_rate')->nullable()->comment('希釈率');
            $table->string('film_thickness')->nullable()->comment('膜厚/回');
            $table->integer('film_thickness_unit')->nullable()->comment('膜厚単位');
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
        Schema::dropIfExists('p_large_spec_steel_processes');
    }
}
