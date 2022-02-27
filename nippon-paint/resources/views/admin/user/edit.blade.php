@extends('adminlte::page')
@if (request()->is('*edit'))
    @section('title', 'ユーザー情報編集')
@else
    @section('title', 'ユーザー登録')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*edit'))
                        <h1 class="m-0 text-dark">ユーザー情報編集</h1>
                    @else
                        <h1 class="m-0 text-dark">ユーザー登録</h1>
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
                            <a href="{{ url('admin/user') }}">
                                <span class="glyphicon glyphicon-home"></span>ユーザー一覧
                            </a>
                        </li>
                        @if (request()->is('*edit'))
                            <li class="breadcrumb-item active">ユーザー情報編集</li>
                        @else
                            <li class="breadcrumb-item active">ユーザー登録</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    @if (request()->is('*edit'))
        @include('admin.elements.user.form.edit')
    @else
        @include('admin.elements.user.form.create')
    @endif
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
