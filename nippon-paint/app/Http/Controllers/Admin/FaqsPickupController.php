<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Http\Requests\Admin\StoreFaqPickup;
use Illuminate\Support\Facades\DB;

class FaqsPickupController extends Controller
{
    public function index(Faq $faq)
    {
        $parentCategories = [];
        foreach ($faq->getParentQuestionCategoryList() as $parentCatId => $parentCatName) {
            $parentCategories[$parentCatId] = [
                'name' => $parentCatName,
                'count' => $faq->getParentQuestionCategoryFaqsList($parentCatId)->count(),
            ];
        }
        return view('admin/faq/pickup', compact('faq', 'parentCategories'));
    }

    public function update(StoreFaqPickup $request)
    {
        $params = $request->input('pickup_ids');
        $parentCategories = Faq::getParentQuestionCategoryList();

        DB::beginTransaction();
        try {
            Faq::query()->update(['pickup_sort' => null]);
            foreach ($parentCategories as $parentCatId => $parentCatName) {
                if (empty($params[$parentCatId])) continue;

                foreach ($params[$parentCatId] as $pickupFaq) {
                    $faq = Faq::where('id', '=', $pickupFaq['id'])->first();
                    $faq->pickup_sort = $pickupFaq['sort'];
                    $faq->save();
                }
                
            }
            DB::commit();
            return redirect('admin/faq/pickup')->with('flash_message', '登録しました');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/faq/pickup')->with('error_message', '登録に失敗しました');
        }
    }
}
