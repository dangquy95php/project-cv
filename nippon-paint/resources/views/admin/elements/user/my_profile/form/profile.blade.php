<div class="card">
    {{ Form::open(['method' => 'put', 'class' => 'form-horizontal', 'files' => true, 'url' => url("admin/user/my_profile")]) }}
    <div class="card-header">
        <div class="d-flex float-right">
            <a href="{{ url('admin/user/my_profile/password') }}" class="btn btn-info mr-1">パスワード変更</a>
            <button type="submit" class="btn btn-success submit">登録</button>
        </div>
    </div>
    <div class="card-body">
        @method('put')
        @can('isAdmin')
            @include('admin.elements.form.select', [
                'label' => '役割',
                'options' => $user::ADMIN_USER_ROLES,
                'name' => 'role_type',
                'value' => $user->role_type ?? $user::EDITOR,
                'required' => 'true',
            ])
        @else
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">役割</label>
                <div class="col-sm-10">{{ Form::text("role_type_readonly", $user::ADMIN_USER_ROLES[$user->role_type], ['readonly' => 'readonly', 'class' => 'form-control']) }}</div>
            </div>
        @endcan
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ユーザー名</label>
            <div class="col-sm-10">{{ Form::text("username_readonly", $user->username, ['readonly' => 'readonly', 'class' => 'form-control']) }}</div>
        </div>
        @include('admin.elements.form.text', [
            'label' => 'メールアドレス',
            'name' => 'email',
            'value' => $user->email,
            'required' => 'true'
        ])
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">パスワード</label>
            <div class="col-sm-10">{{ Form::text("password_readonly", '********', ['readonly' => 'readonly', 'class' => 'form-control']) }}</div>
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-success float-right submit" type="submit">登録</button>
    </div>
    {{ Form::close() }}
</div>
