<div class="card">
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/user/{$user->id}/delete")]) }}
    {{ Form::close() }}
    {{ Form::open(['method' => 'put', 'class' => 'form-horizontal', 'url' => url("admin/user/{$user->id}/edit")]) }}
    <div class="card-header">
        <div class="d-flex float-right">
            <button type="submit" class="btn btn-success submit">登録</button>
            <button type="submit" form="delete-form" class="btn btn-danger delete ml-1">
                削除
            </button>
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
