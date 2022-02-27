<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeSpecPaintingMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_spec_painting_methods')->truncate();
        DB::table('p_large_spec_painting_methods')->insert([
            [
                'name' => 'スプレー',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'エアレススプレー',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '高塗着',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'はけ',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '硬質はけ',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'ローラー',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '短毛ローラー',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '砂骨ローラー',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'へら',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'こて',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '金こて',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
