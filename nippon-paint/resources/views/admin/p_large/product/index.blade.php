@extends('adminlte::page')
@section('title', '重防食用塗料｜製品一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">重防食用塗料｜製品一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">重防食用塗料｜製品一覧</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header" id="app">
            <form class="input-group col-6 float-left">
                {{ Form::select('capital_kana', \App\Models\PLarge::$kana, $request->get('capital_kana'), ['class' => 'form-control col-4', 'placeholder' => '50音順']) }}
                {{ Form::select('p_large_system_id', \App\Models\PLarge::getSystemList(), $request->get('p_large_system_id'), ['class' => 'form-control col-4', 'placeholder' => '塗料系統']) }}
                <input type="text" name="product_name" value="{{ $request->get('product_name') }}" class="form-control" placeholder="製品名を入力">
                <span class="input-group-append">
                    <a href="{{ url('admin/product/large') }}" class="btn btn-default">クリア</a>
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/product/large/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>製品名</th>
                        <th>塗料系統</th>
                        <th>製品規格</th>
                        <th>@sortablelink('status', '公開ステータス')</th>
                        <th>@sortablelink('updated_at', '更新日時')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($p_larges as $p_large)
                        <tr>
                            <td>{{ $p_large->id }}</td>
                            <td>{{ $p_large->product_name }}</td>
                            <td>{{ $p_large->systems }}</td>
                            <td></td>
                            <td><?= AdminHelper::publicStatusLabel2Badge($p_large->status_label) ?></td>
                            <td>{{ $p_large->updated_at }}</td>
                            <td class="d-inline-flex">
                                <a href="{{ url("admin/product/large/{$p_large->id}/edit") }}" class="btn btn-sm btn-dark mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                                    編集
                                </a>
                                <form method="POST" action="{{ url("/admin/product/large/{$p_large->id}/delete") }}">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger delete mr-1">
                                        <i class="fas fa-trash"></i>
                                        削除
                                    </button>
                                </form>
                                <a href="{{ url("admin/product/large/{$p_large->id}/copy") }}" class="btn btn-sm btn-light mr-1">
                                    <i class="fas fa-copy"></i>
                                    複製
                                </a>
                                <a href="{{ url("admin/product/large/{$p_large->id}/preview") }}" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer">
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
            {{ $p_larges->total() }}件中 {{ $p_larges->firstItem() }}-{{ $p_larges->lastItem() }}件
            {{ $p_larges->appends($request->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
