@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', 'ニッペラボ｜用語情報編集')
@else
    @section('title', 'ニッペラボ｜用語登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">ニッペラボ｜用語情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">ニッペラボ｜用語登録</h1>
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
                            <a href="{{ url('admin/nippelab/term') }}">
                                <span class="glyphicon glyphicon-home"></span>ニッペラボ｜用語一覧
                            </a>
                        </li>
                        @if (request()->is('*edit'))
                            <li class="breadcrumb-item active">用語情報編集</li>
                        @else
                            <li class="breadcrumb-item active">用語登録</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/nippelab/term/{$technical_term->id}/delete")]) }}
    {{ Form::close() }}
    <div id="app">
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
                    'label' => '公開ステータス',
                    'options' => $technical_term::STATUS_LIST,
                    'name' => 'status',
                    'value' => $technical_term->status ?? $technical_term::TO_DRAFT,
                    'required' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '用語名',
                    'name' => 'title',
                    'value' => $technical_term->title,
                    'required' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '用語名（カナ）',
                    'name' => 'title_kana',
                    'value' => $technical_term->title_kana,
                    'required' => 'true'
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => 'タグ',
                    'name' => 'term_tag_ids',
                    'options' => $technical_term::getTermTagList(),
                    'values' => $technical_term->getTagsArray()
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '説明文',
                    'name' => 'contents',
                    'value' => old('contents', $technical_term->contents),
                    'dir' => 'term'
                ])
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
