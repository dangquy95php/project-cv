<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToPAutomotiveRelatedPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_automotive_related_pages', function (Blueprint $table) {
            $table->integer('type')->nullable()->comment('種類')->after('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_automotive_related_pages', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
