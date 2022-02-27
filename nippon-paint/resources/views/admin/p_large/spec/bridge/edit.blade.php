@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', '重防食用塗料｜橋梁・コンクリート｜仕様情報編集')
@else
    @section('title', '重防食用塗料｜橋梁・コンクリート｜仕様登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">重防食用塗料｜橋梁・コンクリート｜仕様情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">重防食用塗料｜橋梁・コンクリート｜仕様登録</h1>
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
                            <a href="{{ url('admin/product/large/specification/bridge') }}">
                                <span class="glyphicon glyphicon-home">重防食用塗料｜橋梁・コンクリート｜仕様一覧</span>
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
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/product/large/specification/bridge/{$spec_bridge->id}/delete")]) }}
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
                    'options' => $spec_bridge::STATUS_LIST,
                    'name' => 'status',
                    'value' => $spec_bridge->status ?? $spec_bridge::TO_DRAFT,
                    'required' => true
                ])
                @include('admin.elements.form.text', [
                    'label' => '仕様番号',
                    'name' => 'spec_number',
                    'value' => $spec_bridge->spec_number,
                    'required' => false
                ])
                @include('admin.elements.form.text', [
                    'label' => '仕様名',
                    'name' => 'name',
                    'value' => $spec_bridge->name,
                    'required' => true
                ])
                @include('admin.elements.form.text', [
                    'label' => '一般名称',
                    'name' => 'general_name',
                    'value' => $spec_bridge->general_name,
                ])
                @include('admin.elements.form.sortable_select', [
                    'label' => '関連資料',
                    'name' => 'documents',
                    'options' => $spec_bridge->getDocumentsList(),
                    'values' => $spec_bridge->getDocumentsArray(),
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
                    'options' => $spec_bridge->getInstructionsList(),
                    'values' => $spec_bridge->getInstructionsArray(),
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
                    'options' => $spec_bridge::SECTIONS,
                    'value' => $spec_bridge->p_large_spec_bridge_sections->pluck('section_id')->toArray(),
                    'required_public' => true,
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '被塗物',
                    'name' => 'coated_matters',
                    'options' => $spec_bridge::getCoatedMatterList(),
                    'values' => $spec_bridge->getValuesArray('coated_matters'),
                    'required_public' => true
                ])
                @include('admin.elements.form.multiselect', [
                    'label' => '塗装箇所',
                    'name' => 'paint_points',
                    'options' => $spec_bridge::getPaintPointList(),
                    'values' => $spec_bridge->getValuesArray('paint_points'),
                    'required_public' => true
                ])
                <standard-processes
                    :values="{{ $spec_bridge->getProcessesArray() }}"
                    :diluent_list="{{ $spec_bridge::getDiluentList() }}"
                    :method_list="{{ $spec_bridge::getPaintingMethodList() }}"
                    :place_list="{{ $spec_bridge::getPlaceList() }}"
                    :film_thickness_unit_list="{{ collect($spec_bridge::UNIT_LIST_LEN) }}"
                    :errors_processes="{{ collect($errors->get('processes.*')) }}"
                    :standard_options="{{ $spec_bridge::getStandardList() }}"
                    :standard_value="{{ old('p_large_standard_id', $spec_bridge->p_large_standard_id) ?? 0 }}"
                    :errors_standard_id="{{collect($errors->get('p_large_standard_id'))}}"
                ></standard-processes>
                @include('admin.elements.form.textarea', [
                    'label' => '備考',
                    'name' => 'remark',
                    'value' => $spec_bridge->remark,
                    'size' => '*x4',
                ])
            </div>
            <div class="card-footer">
                <a href="{{ url('admin/product/large/specification/bridge') }}" class="btn btn-default">戻る</a>
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
