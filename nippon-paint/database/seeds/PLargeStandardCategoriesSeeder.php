<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeStandardCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_standard_categories')->truncate();
        DB::table('p_large_standard_categories')->insert([
            [
                'name' => '橋梁塗装',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'プラント塗装',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'コンクリート塗装',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '鉄塔塗装',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '鋼構造物塗装',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
