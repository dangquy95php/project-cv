@extends('adminlte::page')
@section('title', 'よくあるご質問｜ご質問一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">よくあるご質問｜ご質問一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">よくあるご質問｜ご質問一覧</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form class="input-group col-5 float-left">
                {{ Form::select('question_category_id', \App\Models\Faq::getQuestionCategoryList(), $request->get('question_category_id'), ['class' => 'form-control col-5', 'placeholder' => 'カテゴリを選択']) }}
                <input type="text" name="keyword" value="{{$request->get('keyword')}}" class="form-control" placeholder="質問を入力">
                <span class="input-group-append">
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/faq/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>大カテゴリ</th>
                        <th>中カテゴリ</th>
                        <th>質問</th>
                        <th>公開ステータス</th>
                        <th>@sortablelink('updated_at', '更新日時')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                        <tr>
                            <td>{{ $faq->id }}</td>
                            <td>{{ $faq->parent_category_name }}</td>
                            <td>{{ $faq->question_category_name }}</td>
                            <td>{{ $faq->question }}</td>
                            <td><?= AdminHelper::publicStatusLabel2Badge($faq->status_label) ?></td>
                            <td>{{ $faq->updated_at }}</td>
                            <td class="d-inline-flex">
                                <a href="{{ url("admin/faq/{$faq->id}/edit") }}" class="btn btn-sm btn-dark mr-1 edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    編集
                                </a>
                                <form method="POST" action="{{ url("/admin/faq/{$faq->id}/delete") }}">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger mr-1 delete">
                                        <i class="fas fa-trash"></i>
                                        削除
                                    </button>
                                </form>
                                <a href="{{ url("admin/faq/{$faq->id}/preview") }}" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer">
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
            {{ $faqs->total() }}件中 {{ $faqs->firstItem() }}-{{ $faqs->lastItem() }}件
            {{ $faqs->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
