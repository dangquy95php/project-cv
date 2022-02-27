<div class="c-block2__body">
    <div class="c-block2__top">
        <div class="c-block2__top__content">
            <h3 class="c-block2__top__title">
                <span class="c-block2__top__tag">{{ $productSearch->getCategoryName($base) }}</span>
                @if($productSearch->getDetailData($base)->general_name)
                    <span class="c-block2__top__tag" data-kw="{{ $productSearch->displayKeywords }}">{{ $productSearch->getDetailData($base)->general_name }}</span>
                @endif
                @if($productSearch->getDetailData($base)->spec_number)
                    <span class="c-block2__top__tag" data-kw="{{ $productSearch->displayKeywords }}">{{ $productSearch->getDetailData($base)->spec_number }}</span>
                @endif
                @foreach ($productSearch->getDetailData($base)->p_large_systems as $system)
                    <span class="c-block2__top__tag">{{ $system->name }}</span>
                @endforeach
                <a href="{{ $productSearch->getDetailPageUrl($base) }}" class="c-block2__top__titletext" data-kw="{{ $productSearch->displayKeywords }}"><span>{{ $productSearch->getDetailData($base)->product_name }}</span></a>
            </h3>
            <p class="c-block2__top__text" data-kw="{{ $productSearch->displayKeywords }}">{{ $productSearch->getDetailData($base)->description }}</p>
            <div class="c-block2__grtag">
                @if(!empty($productSearch->getDetailData($base)->p_large_standards[0] ))
                    <div class="c-block2__grtag__title">規格：</div>
                    <ul class="c-block2__grlabel">
                        @foreach ($productSearch->getDetailData($base)->p_large_standards as $standard)
                            <li class="c-block2__grlabel__label" data-kw="{{ $productSearch->displayKeywords }}">
                                [{{ $standard->p_large_standard_category->name }}]{{ $standard->standard_name }}
                            </li>
                            @if(isset($standard->pivot->general_name))
                                <li class="c-block2__grlabel__label" data-kw="{{ $productSearch->displayKeywords }}">
                                    {{ $standard->pivot->general_name }}
                                </li>
                            @endif
                            @if(isset($standard->pivot->general_standard_number))
                                <li class="c-block2__grlabel__label" data-kw="{{ $productSearch->displayKeywords }}">
                                    {{ $standard->pivot->general_standard_number }}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        @if ($productSearch->getDetailData($base)->thumbnail_url_front)
            <div class="c-block2__top__img">
                <img src="{{ $productSearch->getDetailData($base)->thumbnail_url_front }}" alt="製品の詳細を見る">
            </div>
        @endif
    </div><!-- / c-block2__top -->
</div><!-- / c-block2__body -->
