<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Http\Requests\Admin\StoreMyProfile;
use Auth;

class MyProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = AdminUser::find(Auth::id());
            return $next($request);
        });
    }

    public function edit(Request $request)
    {
        $user = $this->user;
        return view('admin/user/my_profile/edit', compact('user'));
    }

    public function update(StoreMyProfile $request)
    {
        $user = $this->user;
        if ($user->fill($request->all())->save()) {
            return redirect('admin/user/my_profile')->with('flash_message', '登録しました。');
        }
        return redirect('admin/user/my_profile')->with('error_message', '登録に失敗しました。');
    }

    public function password()
    {
        $user = $this->user;
        return view('admin/user/my_profile/edit', compact('user'));
    }

}
