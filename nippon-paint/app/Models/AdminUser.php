<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Notifications\RestPasswordNotificationJp;
use Kyslik\ColumnSortable\Sortable;

class AdminUser extends Authenticatable
{
    use Sortable;
    public $sortable = ['id', 'updated_at'];

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role_type',
        'profiles',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ADMINISTRATOR = 1;
    const EDITOR = 2;

    const ADMIN_USER_ROLES = [
        self::ADMINISTRATOR => '管理者',
        self::EDITOR => '編集者',
    ];

    const ADMIN_USER_ROLES_BADGE_TYPE = [
        self::ADMINISTRATOR => 'dark',
        self::EDITOR => 'light',
    ];

    /**
     * パスワード再設定メールの送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RestPasswordNotificationJp($token));
    }

    public function scopeSearch($query, $params)
    {
        if (isset($params['keyword'])) {
            $query->where('username', 'like', '%'.$params['keyword'].'%');
            $query->orWhere('email', 'like', '%'.$params['keyword'].'%');
        }
    }

    public function getRole()
    {
        return self::ADMIN_USER_ROLES[$this->role_type];
    }

    public function getRoleBadgeType()
    {
        return self::ADMIN_USER_ROLES_BADGE_TYPE[$this->role_type];
    }
}
