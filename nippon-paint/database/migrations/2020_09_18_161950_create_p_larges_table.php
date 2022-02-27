<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_larges', function (Blueprint $table) {
            $table->id();
            $table->string('nks_no')->nullable()->comment('NKS製品番号');
            $table->integer('nks_ver_no')->nullable()->comment('NKS製品板番');
            $table->integer('status')->comment('公開ステータス');
            $table->string('product_name')->comment('製品名');
            $table->string('product_name_kana')->index('product_name_kana')->comment('製品名カナ');
            $table->string('thumbnail')->nullable()->comment('サムネイルURL');
            $table->text('description')->nullable()->comment('製品説明');
            $table->text('feature')->nullable()->comment('製品特長');
            $table->string('general_name')->nullable()->comment('一般名称(民間)');
            $table->string('general_standard_number')->nullable()->comment('製品規格番号(民間)');
            $table->string('jis_number')->nullable()->comment('JIS 規格');
            $table->integer('solvent_type')->nullable()->comment('溶剤種別');
            $table->text('color')->nullable()->comment('色相');
            $table->text('content')->nullable()->comment('容量');
            $table->text('mixing_ratio')->nullable()->comment('混合比');
            $table->text('unit_price')->nullable()->comment('塗料単価');
            $table->text('fire_laws_indication')->nullable()->comment('消防法表示');
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
        Schema::dropIfExists('p_larges');
    }
}
