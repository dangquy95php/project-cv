<x-header>
    <x-slot name="title">{{ $nippelab_article->title }}｜{{ $nippelab_article->category ?? '' }}｜日本ペイント株式会社</x-slot>
    <x-slot name="slug">{{ $nippelab_article->slug ?? ''}}</x-slot>
    <x-slot name="description">description</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    @if ($nippelab_article->themeslug)
        <x-slot name="unique">nippelab_{{ $nippelab_article->themeslug }}</x-slot>
    @else
        <x-slot name="unique">unique</x-slot>
    @endif
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url"></x-slot>
</x-header>

<main class="p-beginnerdetail">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/nippelab/">ニッペラボ</a></li>
                @if ($nippelab_article->themeslug && $nippelab_article->theme)
                    <li><a href="/nippelab/{{ $nippelab_article->themeslug }}/">{{ $nippelab_article->theme }}</a></li>
                @else
                    <li><span>未設定</span></li>
                @endif
                <li><span>{{ $nippelab_article->title }}</span></li>
            </ul>
        </div>
    </div>
    <div class="l-cont l-aside">
        <article>
            <div class="p-beginnerdetail__content">
                <span class="c-title2 c-title2__style4">{{ $nippelab_article->theme ?? '未設定' }}</span>
                <h1><span>{{ $nippelab_article->title }}</span></h1>
                @if ($nippelab_article->body)
                    <section>
                        {!! $nippelab_article->body !!}
                    </section>
                @endif
            </div>

            <div class="p-beginnerdetail__grbtn">
                @if (!empty($nippelab_article->publication_date) && !empty($nippelab_article->prevurl))
                    <a href="{{ $nippelab_article->prevurl }}" class="c-btn2 c-btn2__border">前へ</a>
                @endif
                @if (!empty($nippelab_article->publication_date) && !empty($nippelab_article->nexturl))
                    <a href="{{ $nippelab_article->nexturl }}" class="c-btn2 c-btn2__border">次へ</a>
                @endif
            </div>
        </article>

        <div class="l-sidebar">
            <aside class="c-side2">
                <div class="c-side2__title">ニッペラボ</div>
                <ul class="c-side2__list">
                    <li class="c-side2__item is-active"><a href="/">塗料の基礎知識</a></li>
                    <li class="c-side2__item"><a href="/">戸建て塗替え</a></li>
                    <li class="c-side2__item"><a href="/">マンション塗替え</a></li>
                    <li class="c-side2__item"><a href="/">内装ペイント</a></li>
                </ul>
            </aside>

            <div class="c-anchor">
                <div class="c-anchor__title">目次</div>
                <ul>
                    <li class="c-anchor__item">
                        <a href="/">塗料は世の中のさまざまな物に使われている</a>
                    </li>
                    <li class="c-anchor__item">
                        <a href="/">塗料の3大機能</a>
                        <ul class="c-anchor__grlink">
                            <li class="c-anchor__item">
                                <a href="/">塗装対象物の保護</a>
                            </li>
                            <li class="c-anchor__item">
                                <a href="/">塗装対象物への美観付与</a>
                            </li>
                            <li class="c-anchor__item">
                                <a href="/">塗装対象物への特別な機能の付与</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- / c-anchor -->

        </div><!-- / sidebar -->
    </div><!-- / aside-content -->

</main>

<x-footer></x-footer>
