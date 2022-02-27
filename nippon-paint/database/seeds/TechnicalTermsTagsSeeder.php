<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TechnicalTermsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('technical_term_tags')->truncate();
        DB::table('technical_term_tags')->insert([
            [
                'technical_term_id' => 1,
                'term_tag_id' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'technical_term_id' => 2,
                'term_tag_id' => 2,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'technical_term_id' => 3,
                'term_tag_id' => 3,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'technical_term_id' => 4,
                'term_tag_id' => 4,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'technical_term_id' => 5,
                'term_tag_id' => 5,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
