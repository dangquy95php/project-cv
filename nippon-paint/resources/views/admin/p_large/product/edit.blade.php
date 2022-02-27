@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', '重防食用塗料｜製品情報編集')
@else
    @section('title', '重防食用塗料｜製品登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">重防食用塗料｜製品情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">重防食用塗料｜製品登録</h1>
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
                            <a href="{{ url('admin/product/large/') }}">
                                <span class="glyphicon glyphicon-home">重防食用塗料｜製品一覧</span>
                            </a>
                        </li>
                        @if (request()->is('*edit'))
                            <li class="breadcrumb-item active">製品情報編集</li>
                        @else
                            <li class="breadcrumb-item active">製品登録</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/product/large/{$p_large->id}/delete")]) }}
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
                @include('admin.elements.form.text', [
                    'label' => 'NKS製品番号',
                    'name' => 'nks_no',
                    'value' => $p_large->nks_no,
                ])
                @include('admin.elements.form.text', [
                    'label' => 'NKS製品版番',
                    'name' => 'nks_ver_no',
                    'value' => $p_large->nks_ver_no,
                ])
                @include('admin.elements.form.select', [
                    'label' => '公開ステータス',
                    'options' => $p_large::STATUS_LIST,
                    'name' => 'status',
                    'value' => $p_large->status ?? $p_large::TO_DRAFT,
                    'required' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '製品名',
                    'name' => 'product_name',
                    'value' => $p_large->product_name,
                    'required' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '製品名カナ',
                    'name' => 'product_name_kana',
                    'value' => $p_large->product_name_kana,
                    'required_public' => 'true'
                ])
                <div class="form-group row {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">サムネイル</label>
                    <div class="col-sm-10">
                        <img-upload
                            name="thumbnail"
                            value="{{ old('thumbnail', $p_large->thumbnail) }}"
                            path="{{$p_large->thumbnail_url}}"
                            dir="product|large|thumbnail">
                        </img-upload>
                    </div>
                </div>
                @include('admin.elements.form.textarea', [
                    'label' => '製品説明',
                    'name' => 'description',
                    'value' => $p_large->description,
                    'size' => '*x3',
                ])
                @include('admin.elements.form.sortable_select', [
                    'label' => '製品資料',
                    'name' => 'documents',
                    'options' => $p_large->getDocumentsList(),
                    'values' => $p_large->getDocumentsArray(),
                    'placeholders' => [
                        'no_options' => '資料が見つかりません',
                        'no_selected_options' => '資料が見つかりません',
                        'search_options' => '資料を検索',
                        'selected_options' => '選択済み資料を検索',
                    ]
                ])
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>製品詳細情報</h4>
            </div>
            <div class="card-body">
                @include('admin.elements.form.text', [
                    'label' => '一般名称(民間)',
                    'name' => 'general_name',
                    'value' => $p_large->general_name,
                    'required_public' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '製品規格番号(民間)',
                    'name' => 'general_standard_number',
                    'value' => $p_large->general_standard_number,
                ])
                @include('admin.elements.form.text', [
                    'label' => 'JIS 規格',
                    'name' => 'jis_number',
                    'value' => $p_large->jis_number,
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '塗料系統',
                    'name' => 'systems',
                    'options' => $p_large::getSystemList(),
                    'values' => $p_large->getSystemsArray(),
                    'required_public' => 'true'
                ])
                @include('admin.elements.form.select', [
                    'label' => '溶剤種別',
                    'name' => 'solvent_type',
                    'options' => $p_large::getSolventTypeList(),
                    'value' => $p_large->solvent_type,
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '色相',
                    'name' => 'color',
                    'value' => $p_large->color,
                    'size' => '*x3'
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '希釈剤',
                    'name' => 'diluents',
                    'options' => $p_large::getDiluentList(),
                    'values' => $p_large->getDiluentsArray(),
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '容量',
                    'name' => 'content',
                    'value' => $p_large->content,
                    'size' => '*x3'
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '混合比',
                    'name' => 'mixing_ratio',
                    'value' => $p_large->mixing_ratio,
                    'size' => '*x3'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '塗料単価',
                    'name' => 'unit_price',
                    'value' => old('unit_price', $p_large->unit_price),
                    'dir' => 'product|large|unit_price'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '消防法表示',
                    'name' => 'fire_laws_indication',
                    'value' => old('fire_laws_indication', $p_large->fire_laws_indication),
                    'dir' => 'product|large|fire_laws_indication'
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
