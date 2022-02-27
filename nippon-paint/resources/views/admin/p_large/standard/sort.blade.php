@extends('adminlte::page')
@section('title', '重防食用塗料｜規格オーダー順変更')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">重防食用塗料｜規格オーダー順変更</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/home') }}">
                            <span class="glyphicon glyphicon-home"></span>Home
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/product/large/standard') }}">
                            <span class="glyphicon glyphicon-home"></span>重防食用塗料｜規格一覧
                        </a>
                    </li>
                    <li class="breadcrumb-item active">重防食用塗料｜規格オーダー順変更</li>
                </ol>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div id="list">
        @foreach($p_large_standards as $p_large_standard_category_id => $target_standards)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $p_large_standard_category_list[$p_large_standard_category_id] }}</h3>
                </div>
                {{ Form::open(['url' => url('admin/product/large/standard/sort')]) }}
                <div class="card-body p-1">
                    <draggable-list-component v-bind:items="{{ $target_standards->toJson() }}"></draggable-list-component>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right">保存</button>
                </div>
                {{ Form::close() }}
            </div>
        @endforeach
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}" defer></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/style.css') }}">
@endpush

