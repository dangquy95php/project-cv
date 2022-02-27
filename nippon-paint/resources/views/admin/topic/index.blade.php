@extends('adminlte::page')
@section('title', 'トピックス一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">トピックス一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">トピックス一覧</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form class="input-group col-6 float-left">
                {{ Form::select('article_category_id', \App\Models\Topic::ARTICLE_CATEGORY, $request->get('article_category_id'), ['class' => 'form-control col-2', 'placeholder' => 'カテゴリ']) }}
                {{ Form::select('publication_year', \App\Models\Topic::getYearOptions(), $request->get('publication_year'), ['class' => 'form-control col-2', 'placeholder' => '公開年']) }}
                {{ Form::select('status', \App\Models\Topic::STATUS_SEARCH_LIST, $request->get('status'), ['class' => 'form-control col-2', 'placeholder' => 'ステータス']) }}
                <input type="text" name="keyword" value="{{$request->get('keyword')}}" class="form-control" placeholder="タイトルを入力">
                <span class="input-group-append">
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/news/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>記事カテゴリ</th>
                        <th>タイトル</th>
                        <th>公開ステータス</th>
                        <th>@sortablelink('publication_date', '公開日時')</th>
                        <th>@sortablelink('updated_at', '更新日時')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topics as $topic)
                        <tr>
                            <td>{{ $topic->id }}</td>
                            <td>{{ $topic->article_category }}</td>
                            <td>{{ $topic->title_shorten }}</td>
                            <td><?= AdminHelper::publicStatusLabel2Badge($topic->status_label) ?></td>
                            <td>{{ $topic->publication_date }}</td>
                            <td>{{ $topic->updated_at }}</td>
                            <td class="d-inline-flex">
                                <a href="{{ url("admin/news/{$topic->id}/edit") }}" class="btn btn-sm btn-dark mr-1 edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    編集
                                </a>
                                <form method="POST" action="{{ url("/admin/news/{$topic->id}/delete") }}">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger mr-1 delete">
                                        <i class="fas fa-trash"></i>
                                        削除
                                    </button>
                                </form>
                                @if (empty($topic->redirect_url))
                                    <a href="{{ url("admin/news/{$topic->id}/preview") }}" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer">
                                @else
                                    <a href="{{ url($topic->redirect_url) }}" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer">
                                @endif
                                    <i class="fas fa-search"></i>
                                    プレビュー
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $topics->total() }}件中 {{ $topics->firstItem() }}-{{ $topics->lastItem() }}件
            {{ $topics->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
