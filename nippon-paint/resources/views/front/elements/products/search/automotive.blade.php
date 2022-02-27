<div class="c-block2__body">
    <div class="c-block2__top">
        <div class="c-block2__top__content">
            <h3 class="c-block2__top__title">
                <span class="c-block2__top__tag">{{ $productSearch->getCategoryName($base) }}</span>
                <a href="{{ $productSearch->getDetailPageUrl($base) }}" class="c-block2__top__titletext" data-kw="{{ $productSearch->displayKeywords }}"><span>{{ $productSearch->getDetailData($base)->product_name }}</span></a>
            </h3>
            <p class="c-block2__top__text" data-kw="{{ $productSearch->displayKeywords }}">{{ $productSearch->getDetailData($base)->description }}</p>
        </div>
        @if ($productSearch->getDetailData($base)->thumbnail_url_front)
            <div class="c-block2__top__img">
                <img src="{{ $productSearch->getDetailData($base)->thumbnail_url_front }}" alt="製品の詳細を見る">
            </div>
        @endif
    </div><!-- / c-block2__top -->
</div><!-- / c-block2__body -->
