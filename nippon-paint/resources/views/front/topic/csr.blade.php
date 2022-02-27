<x-header>
    <x-slot name="title">{{ $title }}｜日本ペイント株式会社</x-slot>
    <x-slot name="description">{{ $title }} </x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">news</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/news/csr/?{{ $title }}</x-slot>
</x-header>

<main class="p-news">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><span>トピックス</span></li>
            </ul>
        </div>
    </div>
    <x-mainimg>
        <x-slot name="title_jap">{{ $title }}</x-slot>
        <x-slot name="title_eng">News</x-slot>
        <x-slot name="mainimg_class">c-mainimg--small</x-slot>
    </x-mainimg>

    <section class="p-news1">
        <div class="c-blocklist">
            <div class="l-cont">
                <ul class="c-nav3 c-nav3--col8">
                    <table>
                        <tr>
                            @if (request()->path() === 'news' || request()->path() === 'news/')
                                <li class="c-nav3__item is-active">
                            @else
                                <li class="c-nav3__item">
                            @endif
                                    <a href="{{ url("news") }}" class="c-nav3__txt">すべて</a>
                                </li>
                            @if (isset($topic_categories))
                                @foreach ($topic_categories as $i => $_topic_category)
                                    @if (in_array($i, $availability_topic_categories, true))
                                        @if (request()->path() === 'news/' . $category_url_list[$i] || request()->path() === 'news/' . $category_url_list[$i] . '/')
                                            <li class="c-nav3__item is-active">
                                        @else
                                            <li class="c-nav3__item">
                                        @endif
                                                <a href="{{ url("news/{$category_url_list[$i]}") }}" class="c-nav3__txt">{{ $_topic_category }}</a>
                                            </li>
                                    @endif
                                @endforeach
                                @if (!empty($csr_availability_topic_categories))
                                    @if (request()->path() === 'news/csr' || request()->path() === 'news/csr/')
                                        <li class="c-nav3__item is-active">
                                    @else
                                        <li class="c-nav3__item">
                                    @endif
                                            <a href="{{ url("news/csr") }}" class="c-nav3__txt">CSR</a>
                                        </li>
                                @endif
                            @endif
                        </tr>
                    </table>
                </ul><!-- / c-nav3 c-nav3--col8 -->
                <div class="c-blocklist__wrapper">
                    @if (isset($topics))
                        <div id="app">
                            <topics-csr-list-component api="/news"
                               :topics="{{ json_encode($topics) }}"
                               :topic_categories="{{ json_encode($topic_categories) }}"
                               :csr_category_url_list="{{ json_encode($csr_category_url_list) }}"
                               :csr_availability_topic_categories="{{ json_encode($csr_availability_topic_categories) }}"
                               :unique_years="{{ json_encode($unique_years) }}"
                               :topic_category="{{ json_encode($topic_category) }}"
                               :year="{{ json_encode($year) }}"
                            ></topics-csr-list-component>
                        </div>
                    @endif
                </div><!-- / c-blocklist__wrapper -->
            </div>
        </div><!-- / c-blocklist -->
    </section>
</main>

<x-footer></x-footer>
<script src="{{ asset('js/front/app.js') }}"></script>

