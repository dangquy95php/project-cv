@extends('adminlte::page')
@section('title', '自動車補修用塗料｜カテゴリ一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">自動車補修用塗料｜カテゴリ一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">自動車補修用塗料｜カテゴリ一覧</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ url('admin/product/automotive/category/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>中カテゴリ名</th>
                        <th>小カテゴリ名</th>
                        <th>@sortablelink('updated_at', '更新日時')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($automotive_subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td>{{ $subcategory->parent_category->category_name }}</td>
                            <td>{{ $subcategory->category_name }}</td>
                            <td>{{ $subcategory->updated_at }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ url("admin/product/automotive/category/{$subcategory->id}/edit") }}" class="btn btn-sm btn-dark mr-1 edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        編集
                                    </a>
                                    <form method="POST" action="{{ url("/admin/product/automotive/category/{$subcategory->id}/delete") }}">
                                        {{ method_field('delete') }}
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger mr-1 delete">
                                            <i class="fas fa-trash"></i>
                                            削除
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $automotive_subcategories->total() }}件中 {{ $automotive_subcategories->firstItem() }}-{{ $automotive_subcategories->lastItem() }}件
            {{ $automotive_subcategories->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
