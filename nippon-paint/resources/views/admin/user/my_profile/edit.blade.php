@extends('adminlte::page')
@if (request()->is('*password'))
    @section('title', 'パスワード変更')
@else
    @section('title', 'マイプロフィール')
@endif
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (request()->is('*password'))
                        <h1 class="m-0 text-dark">パスワード変更</h1>
                    @else
                        <h1 class="m-0 text-dark">マイプロフィール</h1>
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
                        @if (request()->is('*password'))
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/user/my_profile') }}">
                                    <span class="glyphicon glyphicon-home"></span>マイプロフィール
                                </a>
                            </li>
                            <li class="breadcrumb-item active">パスワード変更</li>
                        @else
                            <li class="breadcrumb-item active">マイプロフィール</li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    @if (request()->is('*password'))
        @include('admin.elements.user.my_profile.form.password')
    @else
        @include('admin.elements.user.my_profile.form.profile')
    @endif
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
