<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PAutomotiveHardenerRatiosSeeder extends Seeder
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
        DB::table('p_automotive_hardener_ratios')->truncate();
        DB::table('p_automotive_hardener_ratios')->insert([
            [
                'name' => '2:1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '3:1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '4:1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '5:1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '8:1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '10:1',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

