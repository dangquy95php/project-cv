<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreNetwork;
use App\Models\Network;
use App\Models\Pref;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $networks = Network::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/network/index', compact('networks', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $network = new Network;
        $prefs = Pref::all()->pluck('name', 'id');
        return view('admin/network/edit', compact('network', 'prefs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNetwork $request)
    {
        $network = new Network;
        if ($network->fill($request->all())->save()) {
            return redirect('admin/network')->with('flash_message', '登録しました');
        }
        return redirect('admin/network/create')->with('error_message', '登録に失敗しました');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function edit(Network $network)
    {
        $prefs = Pref::all()->pluck('name', 'id');
        return view('admin/network/edit', compact('network', 'prefs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNetwork $request, Network $network)
    {
        if ($network->fill($request->all())->save()) {
            return redirect('admin/network')->with('flash_message', '登録しました');
        }
        return redirect('admin/network/edit')->with('error_message', '登録に失敗しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function delete(Network $network)
    {
        if ($network->delete()) {
            return redirect('admin/network')->with('flash_message', '削除しました');
        }
        return redirect('admin/network')->with('error_message', '削除に失敗しました');
    }
}
