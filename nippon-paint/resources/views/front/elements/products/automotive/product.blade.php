<div class="c-block2__body">
    <div class="c-block2__top">
        <div class="c-block2__top__content">
            <h3 class="c-block2__top__title">
                <span class="c-block2__top__tag">{{ $p_automotive->parent_category_name }}</span>
                <a href="{{ url('products/automotive/'.$p_automotive->id) }}" class="c-block2__top__titletext"><span>{{ $p_automotive->product_name }}</span></a>
            </h3>
            <p class="c-block2__top__text">{{ $p_automotive->description }}</p>
            <div class="c-block2__grtag">
                <ul class="c-block2__grlabel">
                    @if($p_automotive->p_automotive_base)
                    <li class="c-block2__grlabel__label">{{ $p_automotive->p_automotive_base->name }}</li>
                    @endif
                    @if($p_automotive->p_automotive_hardener_ratio)
                    <li class="c-block2__grlabel__label">{{ $p_automotive->p_automotive_hardener_ratio->name }}</li>
                    @endif
                    @if($p_automotive->p_automotive_pack_type)
                    <li class="c-block2__grlabel__label">{{ $p_automotive->p_automotive_pack_type->name }}</li>
                    @endif
                    @foreach($p_automotive->p_automotive_characteristics as $characteristic)
                    <li class="c-block2__grlabel__label">{{ $characteristic->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if ($p_automotive->image_url_front)
            <div class="c-block2__top__img">
                <img src="{{ $p_automotive->image_url_front }}" alt="製品の詳細を見る">
            </div>
        @endif
    </div><!-- / c-block2__top -->
    @if($p_automotive->published_catalogs->isNotEmpty())
    <div class="c-block2__bottom">
        <h4 class="c-block2__bottom__title">カタログ・コンセプトブック</h4>
        <ul class="c-list9 c-list9__style3">
            @foreach($p_automotive->published_catalogs as $catalog)
            <li class="c-list9__item">
                <div class="c-list9__item__inner">
                    <a href="{{ $catalog->document_url_path }}">
                        <img src="{{ $catalog->thumbnail_url_path_front ?? '/images/products/building/noimg.jpg' }}">
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</div><!-- / c-block2__body -->
