@extends('adminlte::page')
@section('title', 'ユーザー一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ユーザー一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">ユーザー一覧</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form class="input-group col-6 float-left">
                <input type="text" name="keyword" value="{{$request->get('keyword')}}" class="form-control" placeholder="ユーザー名、メールアドレスを入力">
                <span class="input-group-append">
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/user/my_profile') }}" class="btn btn-success">マイプロフィール</a>
                @can('isAdmin')
                    <a href="{{ url('admin/user/create') }}" class="btn btn-info">新規登録</a>
                @endcan
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                <tr>
                    <th>@sortablelink('id', 'ID')</th>
                    <th>ユーザー名</th>
                    <th>メールアドレス</th>
                    <th>役割</th>
                    <th>@sortablelink('updated_at', '更新日時')</th>
                    @can('isAdmin')
                        <th>操作</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td><?= AdminHelper::value2Badge($user->getRole(), $user->getRoleBadgeType()) ?></td>
                        <td>{{ $user->updated_at }}</td>
                        <td class="d-inline-flex">
                            @can('isAdmin')
                                <a href="{{ url("admin/user/{$user->id}/edit") }}" class="btn btn-sm btn-dark mr-1 edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    編集
                                </a>
                                <form method="POST" action="{{ url("/admin/user/{$user->id}/delete") }}">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger mr-1 delete">
                                        <i class="fas fa-trash"></i>
                                        削除
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $users->total() }}件中 {{ $users->firstItem() }}-{{ $users->lastItem() }}件
            {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
