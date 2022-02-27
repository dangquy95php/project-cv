<div class="c-block2__body">
    <div class="c-block2__top">
        <div class="c-block2__top__content">
            <h3 class="c-block2__top__title">
                @foreach ($p_large->p_large_systems as $system)
                    <span class="c-block2__top__tag">{{ $system->name }}</span>
                @endforeach
                <a href="{{ url("/products/large/$p_large->id") }}"
                   class="c-block2__top__titletext"><span>{{ $p_large->product_name }}</span></a>
                <span class="c-block2__top__titlesub">{{ $p_large->general_name }}</span>
            </h3>
            @if (isset($p_large->description))
                <p class="c-block2__top__text">{{ $p_large->description }}</p>
            @endif
        </div>
    </div><!-- / c-block2__top -->

    @if (!$p_large->published_documents->isEmpty())
        <div class="c-block2__bottom">
            <h4 class="c-block2__bottom__title">製品使用説明書、製品カタログ</h4>
            <ul class="c-block2__bottom__list">
                @foreach ($p_large->published_documents as $document)
                    <li class="c-block2__bottom__item">
                        <a href="{{ $document->document_url_path }}"
                           target="_blank">{{ $document->document_name }}</a>
                    </li>
                @endforeach
            </ul>
        </div><!-- / c-block2__bottom -->
    @endif
</div><!-- / c-block2__body -->
