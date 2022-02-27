<div class="c-table4 c-table--large">
    <div class="c-table__scroll sp-only">
        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
    </div>
    <table>
        <thead>
        <tr>
            <th></th>
            <th>塗装場所</th>
            <th>塗装工程</th>
            <th>製品名<br>（一般塗料名称）</th>
            <th>使用量<br>(kg/㎡/回)</th>
            <th>膜厚／回</th>
            <th>塗装方法</th>
            <th>希釈剤<br>（希釈率）</th>
            <th>塗装間隔（23℃）</th>
        </tr>
        </thead>
        <tbody>
        @foreach($processes as $process)
            @if($process->p_large)
                <tr>
                    <th>{{ $process->sort }}</th>
                    <td>{{ $process->place }}</td>
                    <td>{{ $process->process_name }}</td>
                    <td class="td--arrow">
                        <span>
                            @if($process->p_large->is_published)
                                <a href="{{ url('products/large/'.$process->p_large_id) }}">
                                {{ $process->p_large->product_name }}（{{ $process->p_large_general_name }}）
                            </a>
                            @else
                                {{ $process->p_large->product_name }}（{{ $process->p_large_general_name }}）
                            @endif
                        </span>
                    </td>
                    <td>{{ $process->usage }}</td>
                    <td>{!! $process->thickness !!}</td>
                    <td>{{ $process->painting_method }}</td>
                    <td>{!! $process->diluent !!}</td>
                    <td>{{ $process->dried_time }}</td>
                </tr>
            @else
                <tr>
                    <th>{{ $process->sort }}</th>
                    <td>{{ $process->p_large_spec_places->implode('name', '、') }}</td>
                    <td>{{ $process->process_name }}</td>
                    <td colspan="5" class="td--col5 text-left">{{ $process->detail }}</td>
                    <td>{{ $process->dried_time }}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
