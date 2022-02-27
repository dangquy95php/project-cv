<div class="c-accordion__box">
    <div class="c-accordion__tit">
        <h4 class="c-accordion__tit1">{{ $standard->standard_name }}</h4>
        <p class="c-accordion__tit2">
            @if($standard->pivot && $standard->pivot->general_standard_number)
            規格番号：{{ $standard->pivot->general_standard_number }}<br>
            @endif
            @if($standard->pivot && $standard->pivot->general_name)
            一般名称：{{ $standard->pivot->general_name }}
            @endif
        </p>
        <button class="c-accordion__bnt">開く</button>
    </div>
    <div class="c-accordion__content">
        <div class="c-table  c-table--large">
            <div class="c-table__scroll sp-only">
                <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
            </div>
            <table>
                <thead>
                <tr>
                    <th>仕様番号</th>
                    <th>仕様名称</th>
                    <th>仕様詳細</th>
                    <th>塗装仕様書</th>
                </tr>
                </thead>
                <tbody>
                @foreach($standard->getRelatedSpecBridges($p_large->id) as $spec_bridge)
                <tr>
                    <td>{{ $spec_bridge->spec_number }}</td>
                    <td>{{ $spec_bridge->name }}</td>
                    <td class="td__arrow"><a href="{{ url('products/large/specification-bridge/'.$spec_bridge->id) }}" target="_blank">詳細を見る</a></td>
                    <td class="td__pdf">
                        @if($spec_bridge->published_spec_docs->isNotEmpty())
                            @foreach($spec_bridge->published_spec_docs as $document)
                            <a href="{{ $document->document_url_path }}">塗装仕様書</a>
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @endforeach
                @foreach($standard->getRelatedSpecSteels($p_large->id) as $spec_steel)
                    <tr>
                        <td>{{ $spec_steel->spec_number }}</td>
                        <td>{{ $spec_steel->name }}</td>
                        <td class="td__arrow"><a href="{{ url('products/large/specification-steele/'.$spec_steel->id) }}" target="_blank">詳細を見る</a></td>
                        <td class="td__pdf">
                            @if($spec_steel->published_spec_docs->isNotEmpty())
                                @foreach($spec_bridge->published_spec_docs as $document)
                                    <a href="{{ $document->document_url_path }}">塗装仕様書</a>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
