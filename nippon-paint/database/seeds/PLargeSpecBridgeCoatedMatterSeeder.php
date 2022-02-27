<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeSpecBridgeCoatedMatterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_spec_bridge_coated_matters')->truncate();
        DB::table('p_large_spec_bridge_coated_matters')->insert([
            [
                'name' => '鉄',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '亜鉛めっき',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '溶射',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '耐候性鋼材',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'コンクリート',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'その他',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
