<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PBuildingJisNumbersSeeder extends Seeder
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
        DB::table('p_building_jis_numbers')->truncate();
        DB::table('p_building_jis_numbers')->insert([
            [
                'name' => 'JIS A 6916',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS A 6021',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS A 6909',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5492',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5516',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5551',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5552',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5553',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5572',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5582',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5621',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5658',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5659',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5660',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5663',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5665',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5668',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5669',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5670',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5674',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5675',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'JIS K 5970',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
