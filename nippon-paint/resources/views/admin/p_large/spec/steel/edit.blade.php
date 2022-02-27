@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', '重防食用塗料｜プラント・鉄塔・鋼構造物｜仕様情報編集')
@else
    @section('title', '重防食用塗料｜プラント・鉄塔・鋼構造物｜仕様登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">重防食用塗料｜プラント・鉄塔・鋼構造物｜仕様情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">重防食用塗料｜プラント・鉄塔・鋼構造物｜仕様登録</h1>
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
                            <a href="{{ url('admin/product/large/specification/steel') }}">
                                <span class="glyphicon glyphicon-home">重防食用塗料｜プラント・鉄塔・鋼構造物｜仕様一覧</span>
                            </a>
                        </li>
                        @if (request()->is('*edit'))
                            <li class="breadcrumb-item active">仕様情報編集</li>
                        @else
                            <li class="breadcrumb-item active">仕様登録</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/product/large/specification/steel/{$spec_steel->id}/delete")]) }}
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
                    'label' => '公開ステータス',
                    'options' => $spec_steel::STATUS_LIST,
                    'name' => 'status',
                    'value' => $spec_steel->status ?? $spec_steel::TO_DRAFT,
                    'required' => true
                ])
                @include('admin.elements.form.text', [
                    'label' => '仕様番号',
                    'name' => 'spec_number',
                    'value' => $spec_steel->spec_number,
                    'required' => false
                ])
                @include('admin.elements.form.text', [
                    'label' => '仕様名',
                    'name' => 'name',
                    'value' => $spec_steel->name,
                    'required' => true
                ])
                @include('admin.elements.form.text', [
                    'label' => '一般名称',
                    'name' => 'general_name',
                    'value' => $spec_steel->general_name,
                ])
                @include('admin.elements.form.sortable_select', [
                    'label' => '関連資料',
                    'name' => 'documents',
                    'options' => $spec_steel->getDocumentsList(),
                    'values' => $spec_steel->getDocumentsArray(),
                    'placeholders' => [
                        'no_options' => '資料が見つかりません',
                        'no_selected_options' => '資料が見つかりません',
                        'search_options' => '資料を検索',
                        'selected_options' => '選択済み資料を検索'
                    ]
                ])
                @include('admin.elements.form.sortable_select', [
                    'label' => '製品使用説明書',
                    'name' => 'instructions',
                    'options' => $spec_steel->getInstructionsList(),
                    'values' => $spec_steel->getInstructionsArray(),
                    'placeholders' => [
                        'no_options' => '資料が見つかりません',
                        'no_selected_options' => '資料が見つかりません',
                        'search_options' => '資料を検索',
                        'selected_options' => '選択済み資料を検索'
                    ]
                ])
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>仕様詳細情報</h4>
            </div>
            <div class="card-body">
                @include('admin.elements.form.checkbox', [
                    'label' => '塗装区分',
                    'name' => 'section_ids',
                    'options' => $spec_steel::SECTIONS,
                    'value' => $spec_steel->p_large_spec_steel_sections->pluck('section_id')->toArray(),
                    'required_public' => true,
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '特徴',
                    'name' => 'features',
                    'options' => $spec_steel::getFeatureList(),
                    'values' => $spec_steel->getValuesArray('features'),
                    'required_public' => true
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '塗料系統',
                    'name' => 'systems',
                    'options' => $spec_steel::getSystemList(),
                    'values' => $spec_steel->getValuesArray('systems'),
                    'required_public' => true
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '溶剤種別',
                    'name' => 'solvent_types',
                    'options' => $spec_steel::getSolventTypeList(),
                    'values' => $spec_steel->getValuesArray('solvent_types'),
                    'required_public' => true
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '適用部位',
                    'name' => 'points',
                    'options' => $spec_steel::getPointList(),
                    'values' => $spec_steel->getValuesArray('points'),
                    'required_public' => true
                ])
                <standard-processes
                    :values="{{ $spec_steel->getProcessesArray() }}"
                    :diluent_list="{{ $spec_steel::getDiluentList() }}"
                    :method_list="{{ $spec_steel::getPaintingMethodList() }}"
                    :place_list="{{ $spec_steel::getPlaceList() }}"
                    :film_thickness_unit_list="{{ collect($spec_steel::UNIT_LIST_LEN) }}"
                    :errors_processes="{{ collect($errors->get('processes.*')) }}"
                    :standard_options="{{ $spec_steel::getStandardList() }}"
                    :standard_value="{{ old('p_large_standard_id', $spec_steel->p_large_standard_id) ?? 0 }}"
                    :errors_standard_id="{{collect($errors->get('p_large_standard_id'))}}"
                ></standard-processes>
                @include('admin.elements.form.textarea', [
                    'label' => '備考',
                    'name' => 'remark',
                    'value' => $spec_steel->remark,
                    'size' => '*x4',
                ])
            </div>
            <div class="card-footer">
                <a href="{{ url('admin/product/large/specification/steel') }}" class="btn btn-default">戻る</a>
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
