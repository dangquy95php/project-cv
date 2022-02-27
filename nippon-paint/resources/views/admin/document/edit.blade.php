@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', '資料情報編集')
@else
    @section('title', '資料追加')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">資料情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">資料登録</h1>
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
                            <a href="{{ url('admin/product/document') }}">
                                <span class="glyphicon glyphicon-home"></span>資料一覧
                            </a>
                        </li>
                        @if (request()->is('*edit'))
                            <li class="breadcrumb-item active">資料情報編集</li>
                        @else
                            <li class="breadcrumb-item active">資料登録</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/product/document/{$document->id}/delete")]) }}
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
                    'options' => $document::STATUS_LIST,
                    'name' => 'status',
                    'value' => $document->status ?? $document::TO_DRAFT,
                    'required' => 'true'
                ])
                <div
                    class="form-group row {{ $errors->has('product_category_id') || $errors->has('document_category_id') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">
                        資料カテゴリ
                        <span class="badge badge-danger float-right">必須</span>
                    </label>
                    <div class="col-sm-10">
                        <document-category
                            :product_category_list="{{ $document::getProductCategoryList() }}"
                            :docs_category_list="{{ $document::getDocsCategoryList() }}"
                            :value="{{ $document->getValues() }}">
                        </document-category>
                        @include('admin.elements.form.parts.error', ['field' => 'product_category_id'])
                        @include('admin.elements.form.parts.error', ['field' => 'document_category_id'])
                    </div>
                </div>
                @include('admin.elements.form.text', [
                    'label' => '資料名',
                    'name' => 'document_name',
                    'value' => $document->document_name,
                    'required' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '資料名（カナ）',
                    'name' => 'document_name_kana',
                    'value' => $document->document_name_kana,
                    'required' => 'true'
                ])
                <div class="form-group row {{ $errors->has('document_file') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">
                        資料
                        <span class="badge badge-danger float-right">必須</span>
                    </label>
                    <div class="col-sm-10">
                        <document-upload
                            name="document_file"
                            value="{{ old('document_file', $document->document_file) }}"
                            path="{{$document->document_url_path}}"
                            dir="product|document|document_file">
                        </document-upload>
                        @include('admin.elements.form.parts.error', ['field' => 'document_file'])
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">サムネイル</label>
                    <div class="col-sm-10">
                        <img-upload
                            name="thumbnail"
                            value="{{ old('thumbnail', $document->thumbnail) }}"
                            path="{{$document->thumbnail_url_path}}"
                            dir="product|document|thumbnail">
                        </img-upload>
                        @include('admin.elements.form.parts.error', ['field' => 'thumbnail'])
                    </div>
                </div>
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
