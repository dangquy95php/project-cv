<?php

namespace App\Http\Controllers\Admin;

use App\Models\Network;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NetworkSortController extends Controller
{
    public function index(Request $request)
    {
        $networks = Network::query()
            ->orderBy('building_type', 'asc')
            ->orderBy('sort', 'asc')
            ->orderBy('id', 'asc')
            ->get()
            ->groupBy('building_type');
        return view('admin/network/sort', compact('networks', 'request'));
    }

    public function update(Request $request)
    {
        $params = $request->input('sort');

        DB::beginTransaction();
        try {
            $sort = 1;
            foreach ($params as $id) {
                $network = Network::where('id', '=', $id)->first();
                $network->sort = $sort;
                $network->save();
                $sort++;
            }
            DB::commit();
            return redirect('admin/network/sort')->with('flash_message', '登録しました');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/network/sort')->with('error_message', '登録に失敗しました');
        }
    }
}
