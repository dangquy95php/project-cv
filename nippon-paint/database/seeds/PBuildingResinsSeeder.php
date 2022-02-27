<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PBuildingResinsSeeder extends Seeder
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
        DB::table('p_building_resins')->truncate();
        DB::table('p_building_resins')->insert([
            [
                'name' => 'アクリル',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ウレタン',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シリコン',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'ラジカル制御形',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'フッ素',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '無機系',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'エポキシ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'アルキド',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'フェノール',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'シラン系・セメント系・消石灰系',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'そのほか',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
