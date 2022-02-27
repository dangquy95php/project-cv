<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PAutomotiveBasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('p_automotive_bases')->truncate();
        DB::table('p_automotive_bases')->insert([
            [
                'name' => '水性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '溶剤',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

