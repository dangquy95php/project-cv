<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Faq;
use App\Models\QuestionCategory;

class PickupSortFaqsTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        DB::table('faqs')->update([
            'pickup_sort' => null,
        ]);

        $parentCategories = QuestionCategory::PARENT_CATEGORY;

        foreach ($parentCategories as $pCatId => $value) {
            $childCategories = QuestionCategory::query()
                ->select('id')
                ->where('parent_category_id', $pCatId)
                ->get()->toArray();
            $cCatList = array_column($childCategories, 'id');

            if (empty($childCategories)) { continue; }
            $pickupFaqs = Faq::query()
                ->whereIn('question_category_id', $cCatList)
                ->limit(5)
                ->orderBy('id', 'asc')
                ->get();

            $i = 1;
            foreach ($pickupFaqs as $faq) {
                $faq->update(['pickup_sort' => $i]);
                $i ++;
            }
        }
    }
}
