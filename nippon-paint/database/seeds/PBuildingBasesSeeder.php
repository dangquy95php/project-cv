<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PBuildingBasesSeeder extends Seeder
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
        DB::table('p_building_bases')->truncate();
        DB::table('p_building_bases')->insert([
            [
                'name' => '水性系',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '弱溶剤系',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '強溶剤系',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
