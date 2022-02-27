@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', '自動車補修用塗料｜カテゴリ情報編集')
@else
    @section('title', '自動車補修用塗料｜カテゴリ登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">自動車補修用塗料｜カテゴリ情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">自動車補修用塗料｜カテゴリ登録</h1>
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/product/automotive/category') }}">
                                <span class="glyphicon glyphicon-home">自動車補修用塗料｜カテゴリ一覧</span>
                            </a>
                        </li>
                        @if (request()->is('*edit'))
                            <li class="breadcrumb-item active">カテゴリ情報編集</li>
                        @else
                            <li class="breadcrumb-item active">カテゴリ登録</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/product/automotive/category/{$automotive_subcategory->id}/delete")]) }}
    {{ Form::close() }}
    {{ Form::open(['method' => 'put', 'class' => 'form-horizontal', 'files' => true]) }}
    <div class="card">
        <div class="card-header">
            <div class="d-flex float-right">
                <button type="submit" class="btn btn-success submit">登録</button>
                @if (request()->is('*edit') || request()->is('*edit/'))
                    <button type="submit" form="delete-form" class="btn btn-danger delete ml-1">
                        削除
                    </button>
                @endif
            </div>
        </div>
        <div class="card-body">
            @method('put')
            @include('admin.elements.form.select', [
                'label' => '中カテゴリ',
                'options' => $automotive_subcategory::getParentCategoryAndSlugList(),
                'name' => 'parent_id',
                'value' => $automotive_subcategory->parent_id,
                'required' => 'true'
            ])
            @include('admin.elements.form.text', [
                'label' => '小カテゴリ名',
                'name' => 'category_name',
                'value' => $automotive_subcategory->category_name,
                'required' => 'true'
            ])
            @include('admin.elements.form.text', [
                'label' => 'スラッグ',
                'name' => 'slug',
                'value' => $automotive_subcategory->slug,
                'required' => 'true',
            ])
        </div>
        <div class="card-footer">
            <button class="btn btn-success float-right submit" type="submit">登録</button>
        </div>
    </div>
    {{Form::close()}}
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
