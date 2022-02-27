@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', '重防食用塗料｜規格情報編集')
@else
    @section('title', '重防食用塗料｜規格登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">重防食用塗料｜規格情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">重防食用塗料｜規格登録</h1>
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
                            <a href="{{ url('admin/product/large/standard') }}">
                                <span class="glyphicon glyphicon-home">重防食用塗料｜規格一覧</span>
                            </a>
                        </li>
                        @if (request()->is('*edit'))
                            <li class="breadcrumb-item active">規格情報編集</li>
                        @else
                            <li class="breadcrumb-item active">規格登録</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/product/large/standard/{$p_large_standard->id}/delete")]) }}
    {{ Form::close() }}
    <div id="app">
        {{ Form::open(['method' => 'put', 'class' => 'form-horizontal', 'files' => true]) }}
        <div class="card">
            <div class="card-header">
                <h4 class="float-left">基本項目</h4>
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
                    'label' => 'カテゴリ',
                    'options' => $p_large_standard::getStandardCategoryList(),
                    'name' => 'p_large_standard_category_id',
                    'value' => $p_large_standard->p_large_standard_category_id,
                    'required' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '規格名',
                    'name' => 'standard_name',
                    'value' => $p_large_standard->standard_name,
                    'required' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => 'スラッグ',
                    'name' => 'slug',
                    'value' => $p_large_standard->slug,
                    'required' => 'true'
                ])

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>製品登録</h4>
            </div>
            <div class="card-body">
                <standard-p-larges
                    :values="{{ $p_large_standard->getProductsArray() }}"
                    :options="{{ $p_large_standard::getPLargeList() }}"
                    :errors="{{ collect($errors->get('products.*')) }}">
                </standard-p-larges>
            </div>
            <div class="card-footer">
                <button class="btn btn-success float-right submit" type="submit">登録</button>
            </div>
        </div>
        {{Form::close()}}
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
