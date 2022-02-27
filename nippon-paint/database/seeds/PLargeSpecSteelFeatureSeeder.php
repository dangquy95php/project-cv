<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeSpecSteelFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_spec_steel_features')->truncate();
        DB::table('p_large_spec_steel_features')->insert([
            [
                'name' => '高耐候性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '耐水性',
                'created_at' => $now,
                'updated_at' => $now
                        ],
            [
                'name' => '高防錆性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '耐熱性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '省工程',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '厚膜形',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '耐薬品性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'グリーン購入法',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '貼紙防止性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '低汚染性',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '孔食部',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '防汚性（没水部）',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '落書防止',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
