<div class="card">
    {{ Form::open(['method' => 'put', 'class' => 'form-horizontal', 'files' => true, 'url' => url("admin/user/my_profile")]) }}
    <div class="card-header">
        <div class="d-flex float-right">
            <a href="{{ url('admin/user/my_profile') }}" class="btn btn-info mr-1">マイプロフィール</a>
            <button type="submit" class="btn btn-success submit">登録</button>
        </div>
    </div>
    <div class="card-body">
        @method('put')
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">役割</label>
            <div class="col-sm-10">{{ Form::text("role_type_readonly", $user::ADMIN_USER_ROLES[$user->role_type], ['readonly' => 'readonly', 'class' => 'form-control']) }}</div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ユーザー名</label>
            <div class="col-sm-10">{{ Form::text("username_readonly", $user->username, ['readonly' => 'readonly', 'class' => 'form-control']) }}</div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">メールアドレス</label>
            <div class="col-sm-10">{{ Form::text("email_readonly", $user->email, ['readonly' => 'readonly', 'class' => 'form-control']) }}</div>
        </div>
        @include('admin.elements.form.password', [
            'label' => '現在のパスワード',
            'name' => 'old_password',
            'required' => 'true'
        ])
        @include('admin.elements.form.password', [
            'label' => '新しいパスワード',
            'name' => 'password',
            'required' => 'true',
            'help' => ' ※半角英数字記号8字以上'
        ])
        @include('admin.elements.form.password', [
            'label' => '新しいパスワード（確認用）',
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
