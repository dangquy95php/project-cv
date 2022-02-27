<x-header>
    <x-slot name="title">{記事タイトル}｜戸建て塗替え｜日本ペイント株式会社</x-slot>
    <x-slot name="description">家の塗り替えを行うときに押さえておきたい、基本情報をまとめています。塗り替えの必要性や塗料の選び方など、疑問や関心にマッチした情報が手に入ります。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">detached-home__detail</x-slot>
    <x-slot name="unique">nippelab_detached-home</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/nippelab/detached-home/{任意}/</x-slot>
</x-header>

<main class="p-detached-home__detail">

    <div class="l-cont l-aside">
        <div class="p-detached-home__left">
            <article>
                <h5 class="c-title6"><span class="c-title6__text">戸建て塗替えの基本</span></h5>
                <h1 class="c-title5"><span class="c-title5__text">{{$nippelab_article->title}}</span></h1>
                <div class="p-detached-home__detail__content">
                    {!! $nippelab_article->body !!}
                </div>
            </article>
            <div class="p-detached-home__detail__btn">
                @if (!empty($nippelab_article->prevurl))
                <a href="{{ $nippelab_article->prevurl }}" class="c-btn3 c-btn3 c-btn3--blue">前へ</a>
                @endif
                @if (!empty($nippelab_article->nexturl))
                <a href="{{ $nippelab_article->nexturl }}" class="c-btn3 c-btn3 c-btn3--blue">次へ</a>
                @endif
            </div>
        </div>

        <div class="l-sidebar">
            <aside class="c-side2">
                <h4 class="c-side2__title">ニッペラボ</h4>
                <ul class="c-side2__list">
                    <li class="c-side2__item is-blue"><a href="">塗料の基礎知識</a></li>
                    <li class="c-side2__item is-active is-blue"><a href="">戸建て塗替えの基本</a></li>
                    <li class="c-side2__item is-blue"><a href="">マンション塗替え</a></li>
                    <li class="c-side2__item is-blue"><a href="">内装ペイント</a></li>
                    <li class="c-side2__item is-blue"><a href="">用語解説</a></li>
                </ul>
            </aside>

            <div class="c-side3">
                <p class="c-side3__title">カテゴリー</p>
                <ul class="c-side3__list">
                    <li class="c-side3__item">
                        <span class="c-side3__item__title js-open-side3 is-open">塗り替えの必要性について</span>
                        <ul class="c-side3__listsub is-open">
                            <li class="c-side3__itemsub is-active"><a href="/">戸建て塗り替えの必要性</a></li>
                            <!-- / c-side3__itemsub -->
                            <li class="c-side3__itemsub"><a href="/">家を塗り替えるメリット</a></li><!-- / c-side3__itemsub -->
                            <li class="c-side3__itemsub"><a href="/">塗り替え前の家のチェックポイント</a></li>
                            <!-- / c-side3__itemsub -->

                        </ul><!-- / c-side3__listsub -->

                    </li><!-- / c-side3__item -->
                    <li class="c-side3__item">
                        <span class="c-side3__item__title js-open-side3">塗り替えの時期・費用について</span>
                        <ul class="c-side3__listsub">
                            <li class="c-side3__itemsub"><a href="/">戸建て塗り替えの必要性</a></li><!-- / c-side3__itemsub -->
                            <li class="c-side3__itemsub"><a href="/">戸建て塗り替えの必要性</a></li><!-- / c-side3__itemsub -->
                            <li class="c-side3__itemsub"><a href="/">戸建て塗り替えの必要性</a></li><!-- / c-side3__itemsub -->

                        </ul><!-- / c-side3__listsub -->

                    </li><!-- / c-side3__item -->
                    <li class="c-side3__item">
                        <span class="c-side3__item__title js-open-side3">塗料について</span>
                        <ul class="c-side3__listsub">
                            <li class="c-side3__itemsub"><a href="/">戸建て塗り替えの必要性</a></li><!-- / c-side3__itemsub -->
                            <li class="c-side3__itemsub"><a href="/">戸建て塗り替えの必要性</a></li><!-- / c-side3__itemsub -->
                            <li class="c-side3__itemsub"><a href="/">戸建て塗り替えの必要性</a></li><!-- / c-side3__itemsub -->

                        </ul><!-- / c-side3__listsub -->

                    </li><!-- / c-side3__item -->
                    <li class="c-side3__item">
                        <span class="c-side3__item__title js-open-side3">施工について</span>
                        <ul class="c-side3__listsub">
                            <li class="c-side3__itemsub"><a href="/">戸建て塗り替えの必要性</a></li><!-- / c-side3__itemsub -->
                            <li class="c-side3__itemsub"><a href="/">戸建て塗り替えの必要性</a></li><!-- / c-side3__itemsub -->
                            <li class="c-side3__itemsub"><a href="/">戸建て塗り替えの必要性</a></li><!-- / c-side3__itemsub -->

                        </ul><!-- / c-side3__listsub -->

                    </li><!-- / c-side3__item -->
                </ul><!-- / c-side3__list -->
            </div>

            <div class="c-anchor">
                <p class="c-anchor__title">目次</p>
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

<div class="c-breadcrumb">
    <div class="l-cont">
        <ul>
            <li><a href="/">日本ペイントHOME</a></li>
            <li><a href="/nippelab/">ニッペラボ</a></li>
            <li><a href="/nippelab/detached-home/">戸建て塗り替えの基本</a></li>
            <li><span>戸建て塗り替えの必要性</span></li>
        </ul>
    </div>
</div>

<x-footer></x-footer>
