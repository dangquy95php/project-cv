<div class="c-block2__body">
    <div class="c-block2__top">
        <div class="c-block2__top__content">
            <h3 class="c-block2__top__title">
                @if($product->small_category_front)
                    <span class="c-block2__top__tag">{{ $product->small_category_front }}</span>
                @endif
                <a class="c-block2__top__titletext" href="{{ url('/products/building/'.$product->id) }}"><span>{{ $product->product_name }}</span></a>
                <span class="c-block2__top__titlesub">{{ $product->general_name }}</span>
            </h3>
            <p class="c-block2__top__text">{{ $product->description }}</p>
            <ul class="c-block2__grlabel">
                @foreach($product->p_building_resins as $resin)
                    <li class="c-block2__grlabel__label">{{ $resin->name }}</li>
                @endforeach
                @foreach($product->p_building_jis_numbers as $jis_number)
                    <li class="c-block2__grlabel__label">{{ $jis_number->name }}</li>
                @endforeach
                @if($product->p_building_base)
                    <li class="c-block2__grlabel__label">{{ $product->p_building_base->name }}</li>
                @endif
            </ul>
        </div>
        @if ($product->thumbnail_url_front)
            <div class="c-block2__top__img">
                <img src="{{ $product->thumbnail_url_front }}" alt="製品の詳細を見る">
            </div>
        @endif
    </div><!-- / c-block2__top -->

    @if($product->published_documents->count() > 0)
    <div class="c-block2__bottom">
        <h4 class="c-block2__bottom__title">関連資料</h4>
        <ul class="c-block2__bottom__list">
            @foreach($product->published_documents as $document)
                <li class="c-block2__bottom__item">
                    <a href="{{ $document->document_url_path }}" target="_blank">{{ $document->document_category }}を見る</a>
                </li>
            @endforeach
        </ul>
    </div><!-- / c-block2__bottom -->
    @endif
</div><!-- / c-block2__body -->
