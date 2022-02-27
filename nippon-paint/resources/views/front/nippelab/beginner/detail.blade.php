<x-header>
    <x-slot name="title">{記事タイトル}｜塗料の基礎知識｜日本ペイント株式会社</x-slot>
    <x-slot name="description">塗料・塗装に関する基礎知識をまとめています。塗料の機能や成分、分類別の特徴など塗料の基本を知り、塗装の工程や道具など塗料を使用するときに必要な知識を確認することができます。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">beginnerdetail</x-slot>
    <x-slot name="unique">nippelab_beginner</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/nippelab/beginner/{任意}/</x-slot>
</x-header>
<main class="p-beginnerdetail">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/nippelab/">ニッペラボ</a></li>
                <li><a href="/nippelab/beginner/">塗料の基礎知識</a></li>
                <li><span>{{$nippelab_article->title}}</span></li>
            </ul>
        </div>
    </div>
    <div class="l-cont l-aside">
        <article>
            <div class="p-beginnerdetail__content">
                <span class="c-title2 c-title2__style4">塗料の基礎知識</span>
                <h1><span>{{ $nippelab_article->title }}</span></h1>
                {!! $nippelab_article->body !!}
            </div>

            <div class="p-beginnerdetail__grbtn">
                @if($nippelab_article->prev_url)
                    <a href="{{ $nippelab_article->prev_url  }}" class="c-btn2 c-btn2__border">前へ</a>
                @endif
                @if($nippelab_article->next_url)
                    <a href="{{ $nippelab_article->next_url  }}" class="c-btn2 c-btn2__border">次へ</a>
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
