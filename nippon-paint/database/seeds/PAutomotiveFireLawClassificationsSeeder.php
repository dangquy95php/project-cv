<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PAutomotiveFireLawClassificationsSeeder extends Seeder
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
        DB::table('p_automotive_fire_law_classifications')->truncate();
        DB::table('p_automotive_fire_law_classifications')->insert([
            [
                'name' => '第四類第2石油類',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '指定可燃物',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '非危険物',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

