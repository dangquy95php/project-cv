@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', '建築用塗料｜製品情報編集')
@else
    @section('title', '建築用塗料｜製品登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">建築用塗料｜製品情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">建築用塗料｜製品登録</h1>
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
                            <a href="{{ url('admin/product/building/') }}">
                                <span class="glyphicon glyphicon-home">建築用塗料｜製品一覧</span>
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
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/product/building/{$p_building->id}/delete")]) }}
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
                @include('admin.elements.form.text', [
                    'label' => 'NKS製品番号',
                    'name' => 'nks_no',
                    'value' => $p_building->nks_no,
                ])
                @include('admin.elements.form.text', [
                    'label' => 'NKS製品版番',
                    'name' => 'nks_ver_no',
                    'value' => $p_building->nks_ver_no,
                ])
                @include('admin.elements.form.select', [
                    'label' => '公開ステータス',
                    'options' => $p_building::STATUS_LIST,
                    'name' => 'status',
                    'value' => $p_building->status ?? $p_building::TO_DRAFT,
                    'required' => 'true'
                ])
                @include('admin.elements.form.select', [
                    'label' => '製品カテゴリ',
                    'options' => $p_building::getSubcategoryList(),
                    'name' => 'p_building_subcategory_id',
                    'value' => $p_building->p_building_subcategory_id,
                    'required_public' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '製品名',
                    'name' => 'product_name',
                    'value' => $p_building->product_name,
                    'required' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '製品名カナ',
                    'name' => 'product_name_kana',
                    'value' => $p_building->product_name_kana,
                    'required_public' => 'true'
                ])
                @include('admin.elements.form.text', [
                    'label' => '一般塗料名称',
                    'name' => 'general_name',
                    'value' => $p_building->general_name,
                ])
                <div class="form-group row {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">サムネイル</label>
                    <div class="col-sm-10">
                        <img-upload
                            name="thumbnail"
                            value="{{ old('thumbnail', $p_building->thumbnail) }}"
                            path="{{$p_building->thumbnail_url}}"
                            dir="product|building|thumbnail">
                        </img-upload>
                    </div>
                </div>
                @include('admin.elements.form.textarea', [
                    'label' => '製品説明',
                    'name' => 'description',
                    'value' => $p_building->description,
                    'size' => '*x3'
                ])
                <div class="form-group row {{ $errors->has('finish_samples') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">仕上がりサンプル</label>
                    <div class="col-sm-10">
                        <finish-samples-table
                            :values="{{ $p_building->getFinishSamplesArray() }}"
                            :errors="{{ collect($errors->get('finish_samples.*')) }}">
                        </finish-samples-table>
                    </div>
                </div>
                @include('admin.elements.form.sortable_select', [
                    'label' => '製品資料',
                    'name' => 'documents',
                    'options' => $p_building->getDocumentsList(),
                    'values' => $p_building->getDocumentsArray(),
                    'placeholders' => [
                        'no_options' => '資料が見つかりません',
                        'no_selected_options' => '資料が見つかりません',
                        'search_options' => '資料を検索',
                        'selected_options' => '選択済み資料を検索',
                    ]
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => 'カラーラインナップ',
                    'name' => 'color_lineup',
                    'value' => old('color_lineup', $p_building->color_lineup),
                    'dir' => 'product|building|color_lineup'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '製品特長',
                    'name' => 'feature',
                    'value' => old('feature', $p_building->feature),
                    'dir' => 'product|building|feature',
                    'required_public' => 'true'
                ])
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>製品詳細情報</h4>
            </div>
            <div class="card-body">
                @include('admin.elements.form.multiselect', [
                    'label' => '樹脂',
                    'name' => 'resins',
                    'options' => $p_building::getResinList(),
                    'values' => $p_building->getValuesArray('resins'),
                ])
                @include('admin.elements.form.radio', [
                    'label' => '水性/溶剤',
                    'name' => 'base_id',
                    'options' => $p_building::getBaseList(),
                    'value' => $p_building->base_id,
                    'required_public' => 'true'
                ])
                @include('admin.elements.form.radio', [
                    'label' => '1液/2液',
                    'name' => 'pack_type_id',
                    'options' => $p_building::getPackTypeList(),
                    'value' => $p_building->pack_type_id,
                    'required_public' => 'true'
                ])
                <div class="form-group row {{ $errors->has('packings') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">荷姿</label>
                    <div class="col-sm-10">
                        <packings-table
                            :values="{{ $p_building->getPackingsArray() }}"
                            :options="{{ collect($p_building::UNIT_LIST_VOL) }}"
                            :errors="{{ collect($errors->get('packings.*')) }}">
                        </packings-table>
                    </div>
                </div>
                @include('admin.elements.form.multiselect', [
                    'label' => '素材',
                    'name' => 'materials',
                    'options' => $p_building::getMaterialsList(),
                    'values' => $p_building->getValuesArray('materials'),
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => 'JIS',
                    'name' => 'jis_numbers',
                    'options' => $p_building::getJisList(),
                    'values' => $p_building->getValuesArray('jis_numbers'),
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '機能',
                    'name' => 'purposes',
                    'options' => $p_building::getPurposeList(),
                    'values' => $p_building->getValuesArray('purposes'),
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '規格',
                    'name' => 'standard',
                    'value' => $p_building->standard,
                    'size' => '*x3'
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '適用下地',
                    'name' => 'applicable_base',
                    'value' => $p_building->applicable_base,
                    'size' => '*x3'
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '適用下塗り塗料・下塗り材',
                    'name' => 'sealers',
                    'options' => $p_building::getApplicablePaintList(),
                    'values' => $p_building->getApplicablePaintValuesArray('sealers'),
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '中塗り塗料',
                    'name' => 'middle_coats',
                    'options' => $p_building::getApplicablePaintList(),
                    'values' => $p_building->getApplicablePaintValuesArray('middle_coats'),
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '適用上塗り塗料・上塗り材',
                    'name' => 'topcoats',
                    'options' => $p_building::getApplicablePaintList(),
                    'values' => $p_building->getApplicablePaintValuesArray('topcoats'),
                ])
                @include('admin.elements.form.textarea', [
                    'label' => '色相',
                    'name' => 'color',
                    'value' => $p_building->color,
                    'size' => '*x2'
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => 'つや',
                    'name' => 'lusters',
                    'options' => $p_building::getLusterList(),
                    'values' => collect(explode(',', old('lusters', $p_building->lusters))),
                ])
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">
                        施工方法
                        <span class="badge badge-warning float-right hide">公開時必須</span>
                    </label>
                    <div class="col-sm-10">
                        <table class="table no-border">
                            <tr>
                                <td style="width: 10%">適</td>
                                <td>
                                    <multiselect-search
                                        :options="{{collect($p_building->getPaintingMethodsList())}}"
                                        name="painting_methods_suitable"
                                        :values="{{ $p_building->getValuesArray('painting_methods_suitable') }}">
                                    </multiselect-search>
                                    @include('admin.elements.form.parts.error', ['field' => 'painting_methods_suitable'])
                                </td>
                            </tr>
                            <tr>
                                <td>可</td>
                                <td>
                                    <multiselect-search
                                        :options="{{collect($p_building->getPaintingMethodsList())}}"
                                        name="painting_methods_usable"
                                        :values="{{ $p_building->getValuesArray('painting_methods_usable') }}">
                                    </multiselect-search>
                                    @include('admin.elements.form.parts.error', ['field' => 'painting_methods_usable'])
                                </td>
                            </tr>
                            <tr>
                                <td>不可</td>
                                <td>
                                    <multiselect-search
                                        :options="{{collect($p_building->getPaintingMethodsList())}}"
                                        name="painting_methods_na"
                                        :values="{{ $p_building->getValuesArray('painting_methods_na') }}">
                                    </multiselect-search>
                                    @include('admin.elements.form.parts.error', ['field' => 'painting_methods_na'])
                                </td>
                            </tr>
                            <tr>
                                <td>補足</td>
                                <td>
                                    {{ Form::textarea('painting_method_exception', $p_building->painting_method_exception, ['class' => 'form-control', 'size' => '*x2']) }}
                                    @include('admin.elements.form.parts.error', ['field' => 'painting_method_exception'])
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                @include('admin.elements.form.multiselect', [
                    'label' => '希釈剤',
                    'name' => 'diluents',
                    'options' => $p_building::getDiluentList(),
                    'values' => collect(explode(',', old('diluents', $p_building->diluents))),
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '工程',
                    'name' => 'processes',
                    'options' => $p_building::getProcessList(),
                    'values' => collect(explode(',', old('processes', $p_building->processes))),
                ])
                @include('admin.elements.form.text', [
                    'label' => 'ポットライフ',
                    'name' => 'pot_life',
                    'value' => $p_building->pot_life,
                ])
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="">
                        用途
                        <span class="badge badge-warning float-right hide">公開時必須</span>
                    </label>
                    <div class="col-sm-10">
                        <table class="table no-border">
                            <tbody>
                            <tr>
                                <td>戸建て住宅</td>
                                <td class="form-group {{ $errors->has('use_housing') ? 'has-error' : '' }}">
                                    {{ Form::select('use_housing', $p_building::SUITABILITY , $p_building->use_housing, ['class' => 'form-control', 'placeholder' => '-']) }}
                                    @include('admin.elements.form.parts.error', ['field' => 'use_housing'])
                                </td>
                                <td>マンション</td>
                                <td class="form-group {{ $errors->has('use_condominium') ? 'has-error' : '' }}">
                                    {{ Form::select('use_condominium', $p_building::SUITABILITY , $p_building->use_condominium, ['class' => 'form-control', 'placeholder' => '-']) }}
                                    @include('admin.elements.form.parts.error', ['field' => 'use_condominium'])
                                </td>
                                <td>教育施設／病院</td>
                                <td class="form-group {{ $errors->has('use_institution') ? 'has-error' : '' }}">
                                    {{ Form::select('use_institution', $p_building::SUITABILITY , $p_building->use_institution, ['class' => 'form-control', 'placeholder' => '-']) }}
                                    @include('admin.elements.form.parts.error', ['field' => 'use_institution'])
                                </td>
                            </tr>
                            <tr>
                                <td>オフィス</td>
                                <td class="form-group {{ $errors->has('use_office') ? 'has-error' : '' }}">
                                    {{ Form::select('use_office', $p_building::SUITABILITY , $p_building->use_office, ['class' => 'form-control', 'placeholder' => '-']) }}
                                    @include('admin.elements.form.parts.error', ['field' => 'use_office'])
                                </td>
                                <td>工場倉庫</td>
                                <td class="form-group {{ $errors->has('use_factory') ? 'has-error' : '' }}">
                                    {{ Form::select('use_factory', $p_building::SUITABILITY , $p_building->use_factory, ['class' => 'form-control', 'placeholder' => '-']) }}
                                    @include('admin.elements.form.parts.error', ['field' => 'use_factory'])
                                </td>
                                <td>鋼構造物</td>
                                <td class="form-group {{ $errors->has('use_steel_structure') ? 'has-error' : '' }}">
                                    {{ Form::select('use_steel_structure', $p_building::SUITABILITY , $p_building->use_steel_structure, ['class' => 'form-control', 'placeholder' => '-']) }}
                                    @include('admin.elements.form.parts.error', ['field' => 'use_steel_structure'])
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        @include('admin.elements.form.parts.message')
                        @include('admin.elements.form.parts.error', ['field' => 'use_housing'])
                    </div>
                </div>

                @include('admin.elements.form.ckeditor', [
                    'label' => '用途詳細',
                    'name' => 'use_detail',
                    'value' => old('use_detail', $p_building->use_detail),
                    'dir' => 'product|building|use_detail'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '使用量、{1缶当たりの塗り面積（m²）}',
                    'name' => 'usage',
                    'value' => old('usage', $p_building->usage),
                    'dir' => 'product|building|usage'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '希釈率',
                    'name' => 'dilution_rate',
                    'value' => old('dilution_rate', $p_building->dilution_rate),
                    'dir' => 'product|building|dilution_rate'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '乾燥時間',
                    'name' => 'drying_time',
                    'value' => old('drying_time', $p_building->drying_time),
                    'dir' => 'product|building|drying_time'
                ])
                @include('admin.elements.form.ckeditor', [
                    'label' => '価格',
                    'name' => 'price',
                    'value' => old('price', $p_building->price),
                    'dir' => 'product|building|price'
                ])
                @include('admin.elements.form.checkbox', [
                    'label' => '関連情報ページ',
                    'name' => 'related_information',
                    'options' => $p_building::RELATED_INFO_LIST,
                    'value' => explode(',', $p_building->related_information),
                ])
                <div class="form-group row {{ $errors->has('additional_related_pages') ? 'has-error' : '' }}">
                    <label class="col-sm-2 col-form-label">関連情報ページ（独自）</label>
                    <div class="col-sm-10">
                        <related-pages-table
                            :values="{{ $p_building->getRelatedPagesArray() }}"
                            :type_list="{{ collect($p_building::URL_TYPE_LIST) }}"
                            :errors="{{ collect($errors->get('additional_related_pages.*')) }}">
                        </related-pages-table>
                    </div>
                </div>
                @include('admin.elements.form.ckeditor', [
                    'label' => '自由入力',
                    'name' => 'free_area',
                    'value' => old('free_area', $p_building->free_area),
                    'dir' => 'product|building|free_area'
                ])
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
