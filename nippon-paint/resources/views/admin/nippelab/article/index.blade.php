@extends('adminlte::page')
@section('title', 'ニッペラボ｜記事一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">ニッペラボ｜記事一覧</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/home') }}">
                            <span class="glyphicon glyphicon-home"></span>Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active">ニッペラボ｜記事一覧</li>
                </ol>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ url('admin/nippelab/article') }}" class="input-group col-6 float-left">
                {{ Form::select('theme_id', \App\Models\NippelabArticle::THEMES, $request->get('theme_id'), ['class' => 'form-control col-4', 'placeholder' => 'テーマ']) }}
                {{ Form::select('category_id', $request->get('theme_id') ? \App\Models\NippelabArticle::CATEGORIES[$request->get('theme_id')] : [], $request->get('category_id'), ['class' => 'form-control col-4', 'placeholder' => 'カテゴリ']) }}
                <input type="text" name="keyword" value="{{ $request->get('keyword') }}" class="form-control" placeholder="タイトルを入力">
                <span class="input-group-append">
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/nippelab/article/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>タイトル</th>
                        <th>テーマ</th>
                        <th>カテゴリ</th>
                        <th>公開ステータス</th>
                        <th>@sortablelink('publication_date', '公開日時')</th>
                        <th>@sortablelink('updated_at' ,'最終更新日時')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->theme }}</td>
                        <td>{{ $article->category }}</td>
                        <td><?= AdminHelper::publicStatusLabel2Badge($article->status_label) ?></td>
                        <td>{{ $article->publication_date }}</td>
                        <td>{{ $article->updated_at }}</td>
                        <td class="d-inline-flex">
                            <a href="{{ url("admin/nippelab/article/{$article->id}/edit") }}" class="btn btn-sm btn-dark mr-1 edit">
                                <i class="fas fa-pencil-alt"></i> 編集
                            </a>
                             <form action="{{ url("admin/nippelab/article/{$article->id}/delete") }}" method="post">
                                {{ method_field('delete') }}
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger mr-1 delete">
                                    <i class="fas fa-trash"></i> 削除
                                </button>
                            </form>
                            <a href="{{ url("admin/nippelab/article/{$article->id}/preview") }}"
                               class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer">
                                <i class="fas fa-search"></i>
                                プレビュー
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $articles->total() }}件中 {{ $articles->firstItem() }}-{{ $articles->lastItem() }}件
            {{ $articles->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
    <script>
        $(function() {
            const theme_select = $('select[name=theme_id]');
            const category_select = $('select[name=category_id]');
            const category_group = @json(\App\Models\NippelabArticle::CATEGORIES);

            theme_select.change(function() {
                let theme_id = $(this).val();

                // optionを空にする
                category_select.find('option').remove();
                category_select.append('<option value="">カテゴリ</option>');

                $.each(category_group[theme_id], function (key, val) {
                    category_select.append($('<option>').html(val).val(key));
                })
            });
        });
    </script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/style.css') }}">
@endpush

