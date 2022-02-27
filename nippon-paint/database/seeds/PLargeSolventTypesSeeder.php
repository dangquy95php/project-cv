<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeSolventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_solvent_types')->truncate();
        DB::table('p_large_solvent_types')->insert([
            [
                'name' => '強溶剤',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '弱溶剤',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '水性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '低VOC',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '無溶剤',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '油性・フタル酸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '溶剤型',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
