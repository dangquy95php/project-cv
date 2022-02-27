<div class="card">
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/user/{$user->id}/delete")]) }}
    {{ Form::close() }}
    {{ Form::open(['method' => 'put', 'class' => 'form-horizontal', 'url' => url("admin/user/create")]) }}
    <div class="card-header">
        <div class="d-flex float-right">
            <button type="submit" class="btn btn-success submit">登録</button>
        </div>
    </div>
    <div class="card-body">
        @method('put')
        @include('admin.elements.form.select', [
            'label' => '役割',
            'options' => $user::ADMIN_USER_ROLES,
            'name' => 'role_type',
            'value' => $user->role_type ?? $user::EDITOR,
            'required' => 'true',
        ])
        @include('admin.elements.form.text', [
            'label' => 'ユーザー名',
            'name' => 'username',
            'value' => $user->username,
            'required' => 'true'
        ])
        @include('admin.elements.form.text', [
            'label' => 'メールアドレス',
            'name' => 'email',
            'value' => $user->email,
            'required' => 'true'
        ])
        @include('admin.elements.form.password', [
            'label' => 'パスワード',
            'name' => 'password',
            'required' => 'true',
            'help' => ' ※半角英数字記号8字以上'
        ])
        @include('admin.elements.form.password', [
            'label' => 'パスワード（確認用）',
            'name' => 'password_confirmation',
            'required' => 'true',
            'help' => ' ※もう一度パスワードを入力してください'
        ])
    </div>
    <div class="card-footer">
        <button class="btn btn-success float-right submit" type="submit">登録</button>
    </div>
    {{ Form::close() }}
</div>
