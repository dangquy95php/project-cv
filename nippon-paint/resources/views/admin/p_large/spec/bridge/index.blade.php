@extends('adminlte::page')
@section('title', '重防食用塗料｜橋梁・コンクリート｜仕様一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">重防食用塗料｜橋梁・コンクリート｜仕様一覧</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/home') }}">
                                <span class="glyphicon glyphicon-home"></span>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">重防食用塗料｜橋梁・コンクリート｜仕様一覧</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header" id="app">
            <form action="{{ url('admin/product/large/specification/bridge') }}" class="input-group col-8 float-left">
                {{ Form::select('p_large_standard_id', \App\Models\PLargeSpecBridge::getStandardList(), $request->get('p_large_standard_id'), ['class' => 'form-control', 'placeholder' => '仕様規格']) }}
                {{ Form::select('section_id', \App\Models\PLargeSpecBridge::SECTIONS, $request->get('section_id'), ['class' => 'form-control', 'placeholder' => '塗装区分']) }}
                {{ Form::select('p_large_spec_bridge_coated_matter_id', \App\Models\PLargeSpecBridge::getCoatedMatterList(), $request->get('p_large_spec_bridge_coated_matter_id'), ['class' => 'form-control', 'placeholder' => '被塗物']) }}
                {{ Form::select('p_large_spec_bridge_paint_point_id', \App\Models\PLargeSpecBridge::getPaintPointList(), $request->get('p_large_spec_bridge_paint_point_id'), ['class' => 'form-control', 'placeholder' => '塗装箇所']) }}
                <input type="text" class="form-control" name="keyword" value="{{ $request->get('keyword') }}"
                       placeholder="仕様名を入力">
                <span class="input-group-append">
                    <a href="{{ url('admin/product/large/specification/bridge') }}" class="btn btn-default">クリア</a>
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/product/large/specification/bridge/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>仕様名</th>
                    <th>仕様番号</th>
                    <th>@sortablelink('status', '公開ステータス')</th>
                    <th>@sortablelink('updated_at', '更新日時')</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($spec_bridges as $spec_bridge)
                    <tr>
                        <td>{{ $spec_bridge->id }}</td>
                        <td>{{ $spec_bridge->name }}</td>
                        <td>{{ $spec_bridge->spec_number }}</td>
                        <td>{!! AdminHelper::publicStatusLabel2Badge($spec_bridge->status_label) !!}</td>
                        <td>{{ $spec_bridge->updated_at }}</td>
                        <td class="d-inline-flex">
                            <a href="{{ url("admin/product/large/specification/bridge/{$spec_bridge->id}/edit") }}"
                               class="btn btn-sm btn-dark mr-1 edit">
                                <i class="fas fa-pencil-alt"></i>
                                編集
                            </a>
                            <form method="POST"
                                  action="{{ url("/admin/product/large/specification/bridge/{$spec_bridge->id}/delete") }}">
                                {{ method_field('delete') }}
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger mr-1 delete">
                                    <i class="fas fa-trash"></i>
                                    削除
                                </button>
                            </form>
                            <a href="{{ url("admin/product/large/specification/bridge/{$spec_bridge->id}/copy") }}"
                               class="btn btn-sm btn-light mr-1">
                                <i class="fas fa-copy"></i>
                                複製
                            </a>
                            <a href="{{ url("admin/product/large/specification/bridge/{$spec_bridge->id}/preview") }}"
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
        <div class="card-footer clearfix">
            {{ $spec_bridges->total() }}件中 {{ $spec_bridges->firstItem() }}-{{ $spec_bridges->lastItem() }}件
            {{ $spec_bridges->appends($request->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('/css/admin/style.css')}}"/>
@endpush
