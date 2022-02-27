<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PBuildingProcessesSeeder extends Seeder
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
        DB::table('p_building_processes')->truncate();
        DB::table('p_building_processes')->insert([
            [
                'name' => '下塗り',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '中塗り',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '上塗り',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '下塗り・中塗り',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '中塗り・上塗り',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '下地調整',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
