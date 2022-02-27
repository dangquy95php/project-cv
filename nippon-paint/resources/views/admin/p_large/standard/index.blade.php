@extends('adminlte::page')
@section('title', '重防食用塗料｜規格一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">重防食用塗料｜規格一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">重防食用塗料｜規格一覧</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header" id="app">
            <form class="input-group col-6 float-left">
                {{ Form::select('p_large_standard_category_id', \App\Models\PLargeStandard::getStandardCategoryList(), $request->get('p_large_standard_category_id'), ['class' => 'form-control col-4', 'placeholder' => 'カテゴリ']) }}
                <input type="text" name="standard_name" value="{{$request->get('standard_name')}}" class="form-control" placeholder="規格名を入力">
                <span class="input-group-append">
                    <a href="{{ url('admin/product/large/standard') }}" class="btn btn-default">クリア</a>
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/product/large/standard/sort') }}" class="btn btn-success">オーダー順変更</a>
                <a href="{{ url('admin/product/large/standard/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>カテゴリ</th>
                        <th>規格名</th>
                        <th>登録製品数</th>
                        <th>@sortablelink('updated_at', '更新日時')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($p_large_standards as $p_large_standard)
                        <tr>
                            <td>{{ $p_large_standard->id }}</td>
                            <td>{{ $p_large_standard->p_large_standard_category->name }}</td>
                            <td>{{ $p_large_standard->standard_name }}</td>
                            <td>{{ $p_large_standard->p_large_standard_p_larges->count() }}</td>
                            <td>{{ $p_large_standard->updated_at }}</td>
                            <td class="d-inline-flex">
                                <a href="{{ url("admin/product/large/standard/{$p_large_standard->id}/edit") }}" class="btn btn-sm btn-dark mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                                    編集
                                </a>
                                <form method="POST" action="{{ url("/admin/product/large/standard/{$p_large_standard->id}/delete") }}">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger delete">
                                        <i class="fas fa-trash"></i>
                                        削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $p_large_standards->total() }}件中 {{ $p_large_standards->firstItem() }}-{{ $p_large_standards->lastItem() }}件
            {{ $p_large_standards->appends($request->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
