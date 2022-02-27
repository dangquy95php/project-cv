<x-header>
    <x-slot name="title">{{ $topic->title }}｜日本ペイント株式会社</x-slot>
    <x-slot name="description">『{{ $topic->title }}』日本ペイント株式会社からのお知らせ、製品、セミナー、イベント、CSR、キャンペーン、メンテナンス情報についてのページです。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">news</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/news/{{ $topic->title }}/</x-slot>
</x-header>
<main class="p-newsdetail">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/news/">トピックス</a></li>
                <li><span>{{ $topic->title }}</span></li>
            </ul>
        </div>
    </div>
    <section class="p-newsdetail1">
        <div class="l-cont2">
            <h1 class="c-title2 c-title2__style2">{{ $topic->title }}</h1>
            @if ($topic->article_category_id || $topic->publication_date)
                <div class="c-date">
                    @if ($topic->article_category_id)
                        <ul class="c-date1">
                            <li>{{ $topic_categories[$topic->article_category_id] }}</li>
                        </ul>
                    @endif
                    @if ($topic->publication_date)
                        <p class="c-date2">{{ $topic->publication_date->format('Y/m/d') }}</p>
                    @endif
                </div>
            @endif
            @if ($topic->content)
                <div class="p-newsbox">
                    {!! $topic->content !!}
                </div>
            @endif

            <ul class="c-nav5">
                @if (!empty($pagination_url['prev']))
                <li class="c-nav5__item prev">
                    <a href="{{ $pagination_url['prev'] }}" class="c-nav5__txt"><span>前へ</span></a>
                </li>
                @endif
                @if (!empty($pagination_url['next']))
                <li class="c-nav5__item next">
                    <a href="{{ $pagination_url['next'] }}" class="c-nav5__txt"><span>次へ</span></a>
                </li>
                @endif
            </ul>

        </div>
    </section>
</main>
<x-footer></x-footer>
