@extends('adminlte::page')
@section('title', '資料一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">資料一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">資料一覧</li>
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
                {{ Form::select('document_category_id', \App\Models\Document::getCategoryListForSearch(), $request->get('document_category_id'), ['class' => 'form-control col-5', 'placeholder' => 'カテゴリを選択']) }}
                <input type="text" name="keyword" value="{{$request->get('keyword')}}" class="form-control" placeholder="資料orファイル名を入力">
                <span class="input-group-append">
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/product/document/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>資料名</th>
                        <th>ファイル名</th>
                        <th>製品カテゴリ</th>
                        <th>資料カテゴリ</th>
                        <th>公開ステータス</th>
                        <th>@sortablelink('updated_at', '更新日時')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $document)
                        <tr>
                            <td>{{ $document->id }}</td>
                            <td>{{ $document->document_name }}</td>
                            <td>{{ $document->document_file }}</td>
                            <td>{{ $document->product_category }}</td>
                            <td>{{ $document->document_category }}</td>
                            <td><?= AdminHelper::publicStatusLabel2Badge($document->status_label) ?></td>
                            <td>{{ $document->updated_at }}</td>
                            <td class="d-inline-flex">
                                <a href="{{ url("admin/product/document/{$document->id}/edit") }}" class="btn btn-sm btn-dark mr-1 edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    編集
                                </a>
                                <form method="POST" action="{{ url("/admin/product/document/{$document->id}/delete") }}">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger mr-1 delete">
                                        <i class="fas fa-trash"></i>
                                        削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $documents->total() }}件中 {{ $documents->firstItem() }}-{{ $documents->lastItem() }}件
            {{ $documents->appends($request->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
