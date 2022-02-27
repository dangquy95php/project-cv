<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Http\Requests\Admin\StoreAdminUser;
use Auth;
use Route;
use Gate;

class UserController extends Controller
{
    //管理者権限が必要なアクション
    static protected $admin_actions = [
        'create',
        'store',
        'edit',
        'update',
        'delete',
    ];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (array_search(Route::getCurrentRoute()->getActionMethod(), self::$admin_actions) !== false) {
                if(Gate::denies('isAdmin')) {
                    return redirect('admin/user')->with('error_message', 'アカウントに権限がありません');
                }
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $users = AdminUser::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $auth_user = Auth::user();
        return view('admin/user/index', compact('users', 'request', 'auth_user'));
    }

    public function create()
    {
        $user = new AdminUser;
        return view('admin/user/edit', compact('user'));
    }

    public function store(StoreAdminUser $request)
    {
        $user = new AdminUser;
        if ($user->fill($request->all())->save()) {
            return redirect('admin/user')->with('flash_message', '登録しました。');
        }
        return redirect('admin/user/create')->with('error_message', '登録に失敗しました。');
    }

    public function edit(AdminUser $user)
    {
        return view('admin/user/edit', compact('user'));
    }

    public function update(StoreAdminUser $request, AdminUser $user)
    {
        if ($user->fill($request->all())->save()) {
            return redirect('admin/user')->with('flash_message', '登録しました。');
        }
        return redirect('admin/user/create')->with('error_message', '登録に失敗しました。');
    }

    public function delete(AdminUser $user)
    {
        if ($user->delete()) {
            return redirect('admin/user')->with('flash_message', '削除しました');
        }
        return redirect('admin/user')->with('error_message', '削除に失敗しました');
    }
}
