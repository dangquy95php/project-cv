<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PBuildingLustersSeeder extends Seeder
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
        DB::table('p_building_lusters')->truncate();
        DB::table('p_building_lusters')->insert([
            [
                'name' => 'つや有り',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '7分つや有り',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '5分つや有り',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '3分つや有り',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'つや消し',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
