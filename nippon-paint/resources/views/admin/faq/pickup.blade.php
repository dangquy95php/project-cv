@extends('adminlte::page')
@section('title', 'よくあるご質問｜ピックアップ一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">よくあるご質問｜ピックアップ一覧</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/home') }}">
                            <span class="glyphicon glyphicon-home"></span>Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active">よくあるご質問｜ピックアップ一覧</li>
                </ol>
            </div>
        </div>
    </div>
@stop
@section('content')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <div id="list">
        {{ Form::open(['url' => url('admin/faq/pickup')]) }}
            @foreach($parentCategories as $parentCatId => $parentCat)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $parentCat['name'] }}</h3>
                    </div>
                    <div class="card-body">
                        @if($parentCat['count'] > 0)
                            <div class="form-group row {{ $errors->has('pickup_ids.' . $parentCatId) ? 'has-error' : '' }}">
                                <label class="col-sm-2 col-form-label">
                                    ピックアップする質問<br>
                                    <small>※5つまで</small>
                                </label>
                                <div class="col-sm-10">
                                    <sortable-select
                                        name="{{ 'pickup_ids[' . $parentCatId . ']' }}"
                                        :options="{{ $faq->getParentQuestionCategoryFaqsList($parentCatId) }}"
                                        :values="{{ old("pickup_ids.$parentCatId", json_encode($faq->getPickedUpFaqsList($parentCatId))) }}"
                                        :placeholders="{{ @collect([
                                            'no_options' => '質問が見つかりません',
                                            'no_selected_options' => '質問が見つかりません',
                                            'search_options' => '質問を検索',
                                            'selected_options' => '選択済みの質問を検索',
                                        ]) ?: collect() }}">
                                    </sortable-select>
                                    @include('admin.elements.form.parts.message')
                                    @include('admin.elements.form.parts.error', ['field' => 'pickup_ids.' . $parentCatId])
                                </div>
                            </div>
                        @else
                            設定できる質問がありません。
                            <input type="hidden" name="pickup_ids[{{ $parentCatId }}]" value="">
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="card-header">
                <button type="submit" class="btn btn-success float-right">保存</button>
            </div>
        {{ Form::close() }}
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}" defer></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/style.css') }}">
    <style type="text/css">
        .multiselect__tag {
            display: block;
        }
    </style>
@endpush

