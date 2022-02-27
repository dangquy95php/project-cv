@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', 'よくあるご質問｜ご質問情報編集')
@else
    @section('title', 'よくあるご質問｜ご質問登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">よくあるご質問｜ご質問情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">よくあるご質問｜ご質問登録</h1>
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
                            <a href="{{ url('admin/faq') }}">
                                <span class="glyphicon glyphicon-home"></span>よくあるご質問｜ご質問一覧
                            </a>
                        </li>
                        @if (request()->is('*edit'))
                            <li class="breadcrumb-item active">ご質問情報編集</li>
                        @else
                            <li class="breadcrumb-item active">ご質問登録</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/faq/{$faq->id}/delete")]) }}
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
                'options' => $faq::STATUS_LIST,
                'name' => 'published_status',
                'value' => $faq->published_status ?? $faq::TO_DRAFT,
                'required' => 'true'
            ])
            @include('admin.elements.form.select', [
                'label' => '中カテゴリ',
                'options' => $faq::getQuestionCategoryList(),
                'name' => 'question_category_id',
                'value' => $faq->question_category_id,
                'required_public' => 'true',
            ])
            @include('admin.elements.form.text', [
                'label' => '質問',
                'name' => 'question',
                'value' => $faq->question,
                'required' => 'true'
            ])
            @include('admin.elements.form.ckeditor', [
                'label' => '回答',
                'name' => 'answer',
                'value' => old('answer', $faq->answer),
                'dir' => 'faq',
                'required_public' => 'true',
            ])
        </div>
        <div class="card-footer">
            <button class="btn btn-success float-right submit" type="submit">登録</button>
        </div>
    </div>
    {{ Form::close() }}
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/style.css') }}"/>
@endpush
