@extends('adminlte::page')
@section('title', '建築用塗料｜製品一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">建築用塗料｜製品一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">建築用塗料｜製品一覧</li>
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
                {{ Form::select('capital_kana', \App\Models\PBuilding::$kana, $request->get('capital_kana'), ['class' => 'form-control col-4', 'placeholder' => '50音順']) }}
                {{ Form::select('p_building_subcategory_id', \App\Models\PBuilding::getSubcategoryList(), $request->get('p_building_subcategory_id'), ['class' => 'form-control col-4', 'placeholder' => 'カテゴリ']) }}
                <input type="text" name="product_name" value="{{ $request->get('product_name') }}" class="form-control" placeholder="製品名を入力">
                <span class="input-group-append">
                    <a href="{{ url('admin/product/building') }}" class="btn btn-default">クリア</a>
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/product/building/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>製品中カテゴリ</th>
                        <th>製品小カテゴリ</th>
                        <th>製品名</th>
                        <th>@sortablelink('status', '公開ステータス')</th>
                        <th>@sortablelink('updated_at', '更新日時')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($p_buildings as $p_building)
                        <tr>
                            <td>{{ $p_building->id }}</td>
                            <td>{{ $p_building->middle_category }}</td>
                            <td>{{ $p_building->small_category }}</td>
                            <td>{{ $p_building->product_name }}</td>
                            <td><?= AdminHelper::publicStatusLabel2Badge($p_building->status_label) ?></td>
                            <td>{{ $p_building->updated_at }}</td>
                            <td class="d-inline-flex">
                                <a href="{{ url("admin/product/building/{$p_building->id}/edit") }}" class="btn btn-sm btn-dark mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                                    編集
                                </a>
                                <form method="POST" action="{{ url("/admin/product/building/{$p_building->id}/delete") }}">
                                    {{ method_field('delete') }}
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger delete mr-1">
                                        <i class="fas fa-trash"></i>
                                        削除
                                    </button>
                                </form>
                                <a href="{{ url("admin/product/building/{$p_building->id}/copy") }}" class="btn btn-sm btn-light mr-1">
                                    <i class="fas fa-copy"></i>
                                    複製
                                </a>
                                <a href="{{ url("admin/product/building/{$p_building->id}/preview") }}" class="btn btn-sm btn-info" target="_blank" rel="noopener noreferrer">
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
            {{ $p_buildings->total() }}件中 {{ $p_buildings->firstItem() }}-{{ $p_buildings->lastItem() }}件
            {{ $p_buildings->appends($request->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
