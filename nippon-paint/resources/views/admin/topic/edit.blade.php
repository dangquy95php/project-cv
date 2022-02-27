@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', 'トピックス情報編集')
@else
    @section('title', 'トピックス登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">トピックス情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">トピックス登録</h1>
                    @endif
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/news') }}">
                                <span class="glyphicon glyphicon-home"></span>トピックス一覧
                            </a>
                        </li>
                        @if (request()->is('*edit'))
                            <li class="breadcrumb-item active">トピックス情報編集</li>
                        @else
                            <li class="breadcrumb-item active">トピックス登録</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    <div id="app">
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/news/{$topic->id}/delete")]) }}
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
                'label' => '公開ステータス',
                'options' => $topic::STATUS_LIST,
                'name' => 'status',
                'value' => $topic->status ?? $topic::TO_DRAFT,
                'required' => 'true',
                'help' => '※公開日を未来に設定した場合は予約公開となります。'
            ])
            @include('admin.elements.form.select', [
                'label' => '記事カテゴリ',
                'options' => $topic::ARTICLE_CATEGORY,
                'name' => 'article_category_id',
                'value' => $topic->article_category_id,
                'required_public' => 'true'
            ])
            @include('admin.elements.form.datetime', [
                'label' => '公開日時',
                'name' => 'publication_date',
                'value' => $topic->publication_date,
                'required_public' => 'true'
            ])
            @include('admin.elements.form.textarea', [
                'label' => 'タイトル',
                'name' => 'title',
                'value' => $topic->title,
                'size' => '*x2',
                'required' => 'true'
            ])
            @include('admin.elements.form.ckeditor', [
                'label' => '本文',
                'name' => 'content',
                'value' => old('content', $topic->content),
                'dir' => 'news',
                'help' => '※リンク先を入力しない場合の必須項目です。'
            ])
            <div class="form-group row {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
                <label class="col-sm-2 col-form-label">サムネイル</label>
                <div class="col-sm-10">
                    <img-upload
                        name="thumbnail"
                        value="{{ old('thumbnail', $topic->thumbnail) }}"
                        path="{{$topic->thumbnail_url_path}}"
                        dir="news|thumbnail">
                    </img-upload>
                </div>
            </div>
            @include('admin.elements.form.text', [
                'label' => 'リンク先',
                'name' => 'redirect_url',
                'value' => $topic->redirect_url,
                'help' => '※本文を入力しない場合の必須項目です。※http込みで入力してください。入力例: https://example.com/example'
            ])
            @include('admin.elements.form.select', [
                'label' => 'リンク先種類',
                'options' => $topic::URL_TYPE_LIST,
                'name' => 'redirect_url_type',
                'value' => $topic->redirect_url_type,
                'help' => '※本文を入力しない場合の必須項目です。'
            ])
        </div>
        <div class="card-footer">
            <button class="btn btn-success float-right submit" type="submit">登録</button>
        </div>
    </div>
    {{ Form::close() }}
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
