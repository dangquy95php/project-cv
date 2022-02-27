@extends('adminlte::page')
@section('title', 'ニッペラボ｜用語タグ一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ニッペラボ｜用語タグ一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">ニッペラボ｜用語タグ一覧</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header d-flex flex-column">
            <form class="input-group float-left" action="{{ url('admin/nippelab/term_tag') }}">
                <input type="text" name="keyword" value="{{ $request->get('keyword') }}" class="form-control" placeholder="タグ名orスラッグを入力">
                <span class="input-group-append">
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <form class="mt-3" method="POST" action="{{ url("/admin/nippelab/term_tag") }}">
                @csrf
                <div class="d-flex flex-row align-items-center">
                    <div class="d-flex flex-column col-8">
                        @include('admin.elements.form.text', [
                            'label' => 'タグ名',
                            'name' => 'name',
                            'value' => '',
                            'required' => 'true'
                        ])
                        @include('admin.elements.form.text', [
                            'label' => 'スラッグ',
                            'name' => 'slug',
                            'value' => '',
                            'required' => 'true'
                        ])
                    </div>
                    <div class="col-4 ml-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-file"></i> 新規登録
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div id="app" class="card-body table-responsive p-0">
            <?php /* vue側 (term-tags-table) から読み取って使うリンク */ ?>
                <div id="sortable-id" style="display:none;">@sortablelink('id', 'ID')</div>
                <div id="sortable-updated_at" style="display:none;">@sortablelink('updated_at', '更新日時')</div>
                <div id="sortable-name" style="display:none;">@sortablelink('name', 'タグ名')</div>
                <div id="sortable-slug" style="display:none;">@sortablelink('slug', 'スラッグ')</div>
            <?php /* --- */ ?>
            <term-tags-table api="/admin/nippelab/term_tag" csrf="{{ csrf_token() }}" :tags="{{ json_encode($term_tags->items()) }}">
            </term-tags-table>
        </div>
        <div class="card-footer clearfix">
            {{ $term_tags->total() }}件中 {{ $term_tags->firstItem() }}-{{ $term_tags->lastItem() }}件
            {{ $term_tags->appends($request->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
