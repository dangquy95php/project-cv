<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeSpecBridgePaintPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_spec_bridge_paint_points')->truncate();
        DB::table('p_large_spec_bridge_paint_points')->insert([
            [
                'name' => '外面',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '内面',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '継手部',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '溶接部',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '桁端部',
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
