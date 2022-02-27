@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', '拠点情報編集')
@else
    @section('title', '拠点情報登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <dic class="row mb-2">
            <div class="col-sm-6">
                @if (request()->is('*edit'))
                    <h1 class="m-0 text-dark">拠点情報編集</h1>
                @else
                    <h1 class="m-0 text-dark">拠点情報登録</h1>
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
                        <a href="{{ url('admin/network') }}">
                            <span class="glyphicon glyphicon-home"></span>拠点情報一覧
                        </a>
                    </li>
                    @if (request()->is('*edit'))
                        <li class="breadcrumb-item active">拠点情報編集</li>
                    @else
                        <li class="breadcrumb-item active">拠点情報登録</li>
                    @endif
                </ol>
            </div><!-- /.col -->
        </dic><!-- /.row -->
    </div>
@stop
@section('content')
    {{ Form::open(['method' => 'delete', 'id' => 'delete-form', 'url' => url("admin/network/{$network->id}/delete")]) }}
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
                'options' => $network::STATUS_LIST,
                'name' => 'status',
                'value' => $network->status ?? $network::TO_DRAFT,
                'required' => true,
            ])
            @include('admin.elements.form.select', [
                'label' => '建物種別',
                'options' => $network::BUILDING_TYPE,
                'name' => 'building_type',
                'value' => $network->building_type,
                'required_public' => 'true',
            ])
            @include('admin.elements.form.text', [
                'label' => '名前',
                'name' => 'name',
                'value' => $network->name,
                'required' => true,
            ])
            @include('admin.elements.form.text', [
                'label' => '郵便番号',
                'name' => 'zip',
                'value' => $network->zip,
                'required_public' => 'true',
                'help' => '※ハイフンありで入力してください'
            ])
            @include('admin.elements.form.select', [
                'label' => '都道府県',
                'options' => $prefs,
                'name' => 'pref_id',
                'value' => $network->pref_id,
                'required_public' => 'true',
            ])
            @include('admin.elements.form.text', [
                'label' => '市区町村',
                'name' => 'city',
                'value' => $network->city,
                'required_public' => 'true',
            ])
            @include('admin.elements.form.text', [
                'label' => '番地',
                'name' => 'block',
                'value' => $network->block,
                'required_public' => 'true',
            ])
            @include('admin.elements.form.text', [
                'label' => 'ビル名・建物名',
                'name' => 'building',
                'value' => $network->building,
            ])
            @include('admin.elements.form.text', [
                'label' => 'TEL',
                'name' => 'tel',
                'value' => $network->tel,
                'required_public' => 'true',
                'help' => '※ハイフンありで入力してください'
            ])
            @include('admin.elements.form.text', [
                'label' => 'FAX',
                'name' => 'fax',
                'value' => $network->fax,
                'required_public' => 'true',
                'help' => '※ハイフンありで入力してください'
            ])
            @include('admin.elements.form.text', [
                'label' => 'GoogleMap',
                'name' => 'googlemap',
                'value' => $network->googlemap,
                'required_public' => 'true',
            ])
            @include('admin.elements.form.textarea', [
                'label' => '備考',
                'name' => 'remark',
                'value' => $network->remark,
                'size' => '30x5'
            ])
        </div>
        <div class="card-footer">
            <a href="{{ url('admin/network') }}" class="btn btn-default fload-left">戻る</a>
            <button type="submit" class="btn btn-success float-right submit">登録</button>
        </div>
    </div>
    {{ Form::close() }}
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@endpush
