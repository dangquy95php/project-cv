@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', 'ニッペラボ｜記事情報編集')
@else
    @section('title', 'ニッペラボ｜記事登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if (request()->is('*edit'))
                    <h1 class="m-0 text-dark">ニッペラボ｜記事情報編集</h1>
                @else
                    <h1 class="m-0 text-dark">ニッペラボ｜記事登録</h1>
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
                        <a href="{{ url('admin/nippelab/article') }}">
                            <span class="glyphicon glyphicon-home"></span>ニッペラボ｜記事一覧
                        </a>
                    </li>
                    @if (request()->is('*edit'))
                        <li class="breadcrumb-item active">記事情報編集</li>
                    @else
                        <li class="breadcrumb-item active">記事登録</li>
                    @endif
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop
@section('content')
    <div id="app">
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/nippelab/article/{$article->id}/delete")]) }}
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
                'options' => $article::STATUS_LIST,
                'name' => 'status',
                'value' => $article->status ?? $article::TO_DRAFT,
                'required' => true,
                'help' => '※公開日を未来に設定した場合は予約公開となります。'
            ])
            @include('admin.elements.form.datetime', [
                'label' => '公開日時',
                'name' => 'publication_date',
                'value' => $article->publication_date,
                'required_public' => 'true',
            ])
            @include('admin.elements.form.select', [
                'label' => 'テーマ',
                'options' => $article::THEMES,
                'name' => 'theme_id',
                'value' => $article->theme_id,
                'required' => false,
                'required_public' => 'true',
            ])
            @include('admin.elements.form.select', [
                'label' => 'カテゴリ',
                'options' => $article->theme_id ? $article::CATEGORIES[old('theme_id', $article->theme_id)] : [],
                'name' => 'category_id',
                'value' => $article->category_id,
                'required_public' => 'true',
            ])
            @include('admin.elements.form.text', [
                'label' => 'タイトル',
                'name' => 'title',
                'value' => $article->title,
                'required' => true,
            ])
            @include('admin.elements.form.text', [
                'label' => 'スラッグ',
                'name' => 'slug',
                'value' => $article->slug,
                'required_public' => 'true',
            ])
            @include('admin.elements.form.textarea', [
                'label' => 'meta description',
                'name' => 'meta_description',
                'value' => $article->meta_description,
                'size' => '*x2'
            ])
            @include('admin.elements.form.textarea', [
                'label' => 'og:description',
                'name' => 'og_description',
                'value' => $article->og_description,
                'size' => '*x2'
            ])
            <div class="form-group row {{ $errors->has('og_image') ? 'has-error' : '' }}">
                <label class="col-sm-2 col-form-label">og:image</label>
                <div class="col-sm-10">
                    <img-upload
                        name="og_image"
                        value="{{ old('og_image', $article->og_image) }}"
                        path="{{$article->og_image_url}}"
                        dir="imgs|nippelab">
                    </img-upload>
                </div>
            </div>
            @include('admin.elements.form.ckeditor', [
                'label' => '本文',
                'name' => 'body',
                'value' => old('body', $article->body),
                'dir' => 'nippelab',
                'required_public' => 'true',
            ])
        </div>
        <div class="card-footer">
            <a href="{{ url('admin/nippelab/article') }}" class="btn btn-default fload-left">戻る</a>
            <button type="submit" class="btn btn-success float-right submit">登録</button>
        </div>
    </div>
    {{ Form::close() }}
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
    <script>
        $(function () {
            // 連動プルダウン
            const theme_select = $('select[name=theme_id]');
            const category_select = $('select[name=category_id]');
            const category_group = @json($article::CATEGORIES);
            const theme_id = theme_select.val();

            // 新規登録時の初期設定
            if (category_select.find('option').length === 1) {
                category_select.attr('disabled', true);

                // エラー時のoption表示
                if (theme_id != '') {
                    $.each(category_group[theme_id], function (key, val) {
                        category_select.append($('<option>').html(val).val(key));
                    })
                    category_select.removeAttr('disabled', false);
                }
            }

            theme_select.change(function () {
                const select_theme_id = $(this).val();

                // optionを空にする
                category_select.find('option').remove();
                category_select.append('<option value="">未選択</option>');

                // テーマが未選択のとき
                if (select_theme_id == '') {
                    category_select.attr('disabled', true);
                } else {
                    $.each(category_group[select_theme_id], function (key, val) {
                        category_select.append($('<option>').html(val).val(key));
                    })
                    category_select.removeAttr('disabled', false);
                }
            });
        });
    </script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@endpush
