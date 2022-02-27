<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PAutomotiveLabelsSeeder extends Seeder
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
        DB::table('p_automotive_labels')->truncate();
        DB::table('p_automotive_labels')->insert([
            [
                'name' => '特化則対象外',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

