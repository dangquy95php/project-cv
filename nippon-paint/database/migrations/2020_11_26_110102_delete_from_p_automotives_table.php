<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteFromPAutomotivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_automotives', function (Blueprint $table) {
            $table->dropColumn('regulations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_automotives', function (Blueprint $table) {
            $table->string('regulations')->nullable()->comment('法令')->after('pack_type_id');
        });
    }
}
