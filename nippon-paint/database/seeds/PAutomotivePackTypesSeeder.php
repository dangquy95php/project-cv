<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PAutomotivePackTypesSeeder extends Seeder
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
        DB::table('p_automotive_pack_types')->truncate();
        DB::table('p_automotive_pack_types')->insert([
            [
                'name' => '1液',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '2液',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

