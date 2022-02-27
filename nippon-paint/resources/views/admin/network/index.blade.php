@extends('adminlte::page')
@section('title', '拠点情報一覧')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">拠点情報一覧</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/home') }}">
                            <span class="glyphicon glyphicon-home"></span>Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active">拠点情報一覧</li>
                </ol>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ url('admin/network') }}" class="input-group col-6 float-left">
                {{ Form::select('building_type', \App\Models\Network::BUILDING_TYPE, $request->get('building_type'), ['class' => 'form-control col-4', 'placeholder' => '建物種別']) }}
                {{ Form::text('name', $request->get('name'), ['class' => 'form-control col-4', 'placeholder' => '名前']) }}
                {{ Form::select('status', \App\Models\Network::STATUS_LIST, $request->get('status'), ['class' => 'form-control col-4', 'placeholder' => '公開ステータス']) }}
                <span class="input-group-append">
                    <input type="submit" value="検索" class="btn btn-primary">
                </span>
            </form>
            <div class="card-tools">
                <a href="{{ url('admin/network/sort') }}" class="btn btn-success">オーダー順変更</a>
                <a href="{{ url('admin/network/create') }}" class="btn btn-info">新規登録</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-highlight">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>建物種別</th>
                        <th>名前</th>
                        <th>公開ステータス</th>
                        <th>@sortablelink('updated_at', '更新日時')</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($networks as $network)
                    <tr>
                        <td>{{ $network->id }}</td>
                        <td>{{ $network->building_type_label }}</td>
                        <td>{{ $network->name }}</td>
                        <td><?= AdminHelper::publicStatusLabel2Badge($network->status_label) ?></td>
                        <td>{{ $network->updated_at }}</td>
                        <td class="d-inline-flex">
                            <a href="{{ url("admin/network/{$network->id}/edit") }}" class="btn btn-sm btn-dark mr-1 edit">
                                <i class="fas fa-pencil-alt"></i> 編集
                            </a>
                             <form action="{{ url("admin/network/{$network->id}/delete") }}" method="post">
                                {{ method_field('delete') }}
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger mr-1 delete">
                                    <i class="fas fa-trash"></i> 削除
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $networks->total() }}件中 {{ $networks->firstItem() }}-{{ $networks->lastItem() }}件
            {{ $networks->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/style.css') }}">
@endpush

