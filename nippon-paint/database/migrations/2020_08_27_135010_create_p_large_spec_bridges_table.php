<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargeSpecBridgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_spec_bridges', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->comment('公開ステータス');
            $table->string('spec_number', 255)->nullable()->comment('仕様番号');
            $table->string('name', 255)->unique()->comment('一般仕様名称・仕様名称');
            $table->string('name_kana', 255)->index()->comment('一般仕様名称・仕様名称（カナ）');
            $table->integer('section_id')->comment('製品詳細__塗装区分');
            $table->text('remark')->nullable()->comment('製品詳細__備考');
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
        Schema::dropIfExists('p_large_spec_bridges');
    }
}
