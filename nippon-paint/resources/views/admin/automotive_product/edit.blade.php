@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', '自動車補修用塗料｜製品情報編集')
@else
    @section('title', '自動車補修用塗料｜製品登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">自動車補修用塗料｜製品情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">自動車補修用塗料｜製品登録</h1>
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
                            <a href="{{ url('admin/product/automotive/') }}">
                                <span class="glyphicon glyphicon-home">自動車補修用塗料｜製品一覧</span>
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
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/product/automotive/{$p_automotive->id}/delete")]) }}
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
                    'value' => $p_automotive->nks_no,
                ])
                @include('admin.elements.form.text', [
                    'label' => 'NKS製品版番',
                    'name' => 'nks_ver_no',
                    'value' => $p_automotive->nks_ver_no,
                ])
                @include('admin.elements.form.select', [
                    'label' => '公開ステータス',
                    'options' => $p_automotive::STATUS_LIST,
                    'name' => 'status',
                    'value' => $p_automotive->status ?? $p_automotive::TO_DRAFT,
                    'required' => 'true'
                ])
                @include('admin.elements.form.select', [
                    'label' => '製品カテゴリ',
                    'options' => $p_automotive::getSubcategoryList(),
                    'name' => 'p_automotive_subcategory_id',
                    'value' => $p_automotive->p_automotive_subcategory_id,
                    'required_public' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '製品名',
                    'name' => 'product_name',
                    'value' => $p_automotive->product_name,
                    'required' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '製品名カナ',
                    'name' => 'product_name_kana',
                    'value' => $p_automotive->product_name_kana,
                    'required_public' => 'true'
                ])
                <div class="form-group row {{ $errors->has('logo') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">ロゴ</label>
                    <div class="col-sm-10">
                        <img-upload
                            name="logo"
                            value="{{ old('logo', $p_automotive->logo) }}"
                            path="{{$p_automotive->logo_url}}"
                            dir="product|automotive|logo">
                        </img-upload>
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">製品イメージ</label>
                    <div class="col-sm-10">
                        <img-upload
                            name="image"
                            value="{{ old('image', $p_automotive->image) }}"
                            path="{{$p_automotive->image_url}}"
                            dir="product|automotive|image">
                        </img-upload>
                    </div>
                </div>
                @include('admin.elements.form.multiselect', [
                    'label' => 'ラベル',
                    'name' => 'labels',
                    'options' => $p_automotive::getLabelList(),
                    'values' => collect(explode(',', old('labels', $p_automotive->labels))),
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '製品説明',
                    'name' => 'description',
                    'value' => $p_automotive->description,
                    'size' => '*x3',
                ])
                @include('admin.elements.form.sortable_select', [
                    'label' => '資料',
                    'name' => 'documents',
                    'options' => $p_automotive->getDocumentsList(),
                    'values' => $p_automotive->getDocumentsArray(),
                    'placeholders' => [
                        'no_options' => '資料が見つかりません',
                        'no_selected_options' => '資料が見つかりません',
                        'search_options' => '資料を検索',
                        'selected_options' => '選択済み資料を検索',
                    ]
                ])
                @include('admin.elements.form.sortable_select', [
                    'label' => 'カタログ・コンセプトブック',
                    'name' => 'catalogs',
                    'options' => $p_automotive->getCatalogsList(),
                    'values' => $p_automotive->getCatalogsArray(),
                    'placeholders' => [
                        'no_options' => '資料が見つかりません',
                        'no_selected_options' => '資料が見つかりません',
                        'search_options' => '資料を検索',
                        'selected_options' => '選択済み資料を検索',
                    ]
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '製品特長',
                    'name' => 'feature',
                    'value' => old('feature', $p_automotive->feature),
                    'dir' => 'product|building|feature',
                    'required_public' => 'true'
                ])
                @include('admin.elements.form.select', [
                    'label' => '製品分類',
                    'options' => $p_automotive::getClassificationList(),
                    'name' => 'classification',
                    'value' => $p_automotive->classification,
                    'required_public' => 'true'
                ])
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>製品詳細情報</h4>
            </div>
            <div class="card-body">
                @include('admin.elements.form.radio', [
                    'label' => '水性/溶剤',
                    'name' => 'base_id',
                    'options' => $p_automotive::getBaseList(),
                    'value' => $p_automotive->base_id,
                ])
                @include('admin.elements.form.radio', [
                    'label' => '1液/2液',
                    'name' => 'pack_type_id',
                    'options' => $p_automotive::getPackTypeList(),
                    'value' => $p_automotive->pack_type_id,
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '消防法区分',
                    'name' => 'fire_laws_classifications',
                    'options' => $p_automotive::getFireLawClassificationList(),
                    'values' => collect(explode(',', old('fire_laws_classifications', $p_automotive->fire_laws_classifications))),
                ])
                @include('admin.elements.form.select', [
                    'label' => '硬化剤比率',
                    'options' => $p_automotive::getHardenerRatioList(),
                    'name' => 'hardener_ratio',
                    'value' => $p_automotive->hardener_ratio,
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '硬化剤比率（補足）',
                    'name' => 'hardener_ratio_supplement',
                    'value' => $p_automotive->hardener_ratio_supplement,
                    'size' => '*x3'
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '特徴',
                    'name' => 'characteristics',
                    'options' => $p_automotive::getCharacteristicsList(),
                    'values' => $p_automotive->getCharacteristicsValuesArray(),
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '容量',
                    'name' => 'content',
                    'value' => $p_automotive->content,
                    'size' => '*x3'
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '色相',
                    'name' => 'color',
                    'value' => $p_automotive->color,
                    'size' => '*x3'
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '硬化剤',
                    'name' => 'hardeners',
                    'options' => $p_automotive::getPAutomotiveList(),
                    'values' => $p_automotive->getHardenersValuesArray(),
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '希釈剤',
                    'name' => 'diluents',
                    'options' => $p_automotive::getPAutomotiveList(),
                    'values' => $p_automotive->getDiluentsValuesArray(),
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '希釈率',
                    'name' => 'mixing_ratio',
                    'value' => $p_automotive->mixing_ratio,
                    'size' => '*x3'
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '適応素材',
                    'name' => 'applicable_material',
                    'value' => $p_automotive->applicable_material,
                    'size' => '*x3'
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '適応クリヤー',
                    'name' => 'applicable_clear_paints',
                    'options' => $p_automotive::getApplicableClearPaintList(),
                    'values' => $p_automotive->getApplicableClearPaintValuesArray(),
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '混合比',
                    'name' => 'mixing_ratio_table',
                    'value' => old('mixing_ratio_table', $p_automotive->mixing_ratio_table),
                    'dir' => 'product|building|mixing_ratio_table'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '乾燥',
                    'name' => 'drying_time',
                    'value' => old('drying_time', $p_automotive->drying_time),
                    'dir' => 'product|building|drying_time'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => 'ポットライフ',
                    'name' => 'pot_life',
                    'value' => old('pot_life', $p_automotive->pot_life),
                    'dir' => 'product|building|pot_life'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '樹脂仕様',
                    'name' => 'resin_specs',
                    'value' => old('resin_specs', $p_automotive->resin_specs),
                    'dir' => 'product|building|resin_specs'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '自由入力',
                    'name' => 'free_area',
                    'value' => old('free_area', $p_automotive->free_area),
                    'dir' => 'product|building|free_area'
                ])
                <div class="form-group row {{ $errors->has('related_pages') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">関連情報ページ（独自）</label>
                    <div class="col-sm-10">
                        <related-pages-table
                            :values="{{ $p_automotive->getRelatedPagesArray() }}"
                            :type_list="{{ collect($p_automotive::URL_TYPE_LIST) }}"
                            :errors="{{ collect($errors->get('additional_related_pages.*')) }}">
                        </related-pages-table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success float-right submit" type="submit">登録</button>
            </div>
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
