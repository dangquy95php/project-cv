<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PLargeSpecPlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('p_large_spec_places')->truncate();
        DB::table('p_large_spec_places')->insert([
            [
                'name' => '前処理',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '工場',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '製鋼工場',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '橋梁製作工場',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => '現場',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
