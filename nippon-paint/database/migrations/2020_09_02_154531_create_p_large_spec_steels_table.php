<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLargeSpecSteelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_large_spec_steels', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->comment('公開ステータス');
            $table->string('spec_number', 255)->nullable()->comment('仕様番号');
            $table->string('name', 255)->unique()->comment('塗装系・適合規格');
            $table->string('name_kana', 255)->index()->comment('塗装系・適合規格（カナ）');
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
        Schema::dropIfExists('p_large_spec_steels');
    }
}
