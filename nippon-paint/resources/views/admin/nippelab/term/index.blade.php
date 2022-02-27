@extends('adminlte::page')
@section('title', 'ニッペラボ｜用語一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ニッペラボ｜用語一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">ニッペラボ｜用語一覧</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form class="input-group col-4 float-left" action="{{url('admin/nippelab/term')}}">
                {{ Form::select('title_kana', \App\Models\TechnicalTerm::KANA_LINE, $request->get('title_kana'), ['class' => 'form-control col-4', 'placeholder' => '50音順で検索']) }}
                <input type="text" name="keyword" value="{{$request->get('keyword')}}" class="form-control" placeholder="用語名を入力">
                <span class="input-group-append">
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/nippelab/term/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>@sortablelink('title', '用語名')</th>
                        <th>タグ</th>
                        <th>@sortablelink('status', '公開ステータス')</th>
                        <th>@sortablelink('updated_at', '更新日時')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($technical_terms as $technical_term)
                        <tr>
                            <td>{{ $technical_term->id }}</td>
                            <td>{{$technical_term->title}}</td>
                            <td><?php $technical_term->term_tags->each(function ($item) {
                                echo AdminHelper::value2Badge($item->name, 'secondary') . ' ';
                                return;
                            }) ?></td>
                            <td><?= AdminHelper::publicStatusLabel2Badge($technical_term->status_label) ?></td>
                            <td>{{$technical_term->updated_at}}</td>
                            <td class="d-inline-flex">
                                <a href="{{ url("admin/nippelab/term/{$technical_term->id}/edit") }}" class="btn btn-sm btn-dark mr-1 edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    編集
                                </a>
                                <form method="POST" action="{{ url("/admin/nippelab/term/{$technical_term->id}/delete") }}">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger mr-1 delete">
                                        <i class="fas fa-trash"></i>
                                        削除
                                    </button>
                                </form>
                                <a href="{{ url("admin/nippelab/term/{$technical_term->id}/preview") }}" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer">
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
            {{ $technical_terms->total() }}件中 {{ $technical_terms->firstItem() }}-{{ $technical_terms->lastItem() }}件
            {{ $technical_terms->appends($request->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
