<div class="c-block2 c-block2--full">
    <div class="c-block2__body">
        <div class="c-block2__top">
            <div class="c-block2__top__content">
                <h3 class="c-block2__top__title">
                    @foreach($standard_p_large->p_large->p_large_systems as $system)
                    <span class="c-block2__top__tag">{{ $system->name }}</span>
                    @endforeach
                    <span class="c-block2__top__text2">{{'{'.$standard->p_large_standard_category->name.'}'}}規格番号：{{ $standard_p_large->general_standard_number }}</span>
                    <a class="c-block2__top__titletext"><span>{{ $product->product_name }}</span></a>
                    <span class="c-block2__top__titlesub">{{ $product->general_name }}</span>
                </h3>
                <p class="c-block2__top__text">{{ $product->description }}</p>
            </div>
        </div><!-- / c-block2__top -->

        <div class="c-block2__bottom">
            <h4 class="c-block2__bottom__title">製品使用説明書、製品カタログ</h4>
            <ul class="c-block2__bottom__list">
                @foreach($product->published_documents as $document)
                <li class="c-block2__bottom__item">
                    <a href="#" target="_blank">{{ $document->document_category }}</a>
                </li>
                @endforeach
            </ul>
        </div><!-- / c-block2__bottom -->
    </div><!-- / c-block2__body -->
</div><!-- / c-block2 -->