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
                <a href="{{ $productSearch->getDetailPageUrl($base) }}" class="c-block2__top__titletext" data-kw="{{ $productSearch->displayKeywords }}"><span>{{ $productSearch->getDetailData($base)->name }}</span></a>
            </h3>
            <p class="c-block2__top__text" data-kw="{{ $productSearch->displayKeywords }}">{{ $productSearch->getDetailData($base)->description }}</p>
            @if($productSearch->getDetailData($base)->standard_name || $productSearch->getDetailData($base)->section)
            <div class="c-block2__grtag">
                <div class="c-block2__grtag__title">規格：</div>
                <ul class="c-block2__grlabel">
                    @if($productSearch->getDetailData($base)->standard_name)
                        <li class="c-block2__grlabel__label">{{ $productSearch->getDetailData($base)->standard_name }}</li>
                    @endif
                    @if($productSearch->getDetailData($base)->section)
                        <li class="c-block2__grlabel__label">{{ $productSearch->getDetailData($base)->section }}</li>
                    @endif
                </ul>
            </div>
            @endif
        </div>
    </div><!-- / c-block2__top -->
</div><!-- / c-block2__body -->
