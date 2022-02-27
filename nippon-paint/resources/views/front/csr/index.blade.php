<x-header>
    <x-slot name="title">CSR活動｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社のCSRへの取り組み「HAPPY HAPPY PROJECT」、「産学連携の取り組み」についてご紹介いたします。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">csr</x-slot>
    <x-slot name="unique">csr</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/csr/</x-slot>
</x-header>

<main class="p-csr">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/about/">日本ペイントについて</a></li>
                <li><span>CSR活動</span></li>
            </ul>
        </div>
    </div>
    <section class="c-mainimg ">
        <div class="l-cont">
            <h1 class="c-mainimg__title">
                <span class="c-mainimg__title__jap">CSR活動</span>
                <span class="c-mainimg__title__eng">Corporate Social Responsibility</span>
            </h1>
            <p class="c-mainimg__text">日本ペイントのCSRへの取り組みをご紹介いたします。</p>
        </div>
    </section>
    <section class="p-csr1">
        <div class="l-cont">
            <h2 class="c-title2 c-title2--center">HAPPY PAINT PROJECT</h2>
            <p class="c-text1 u-center">
                ペイントでハッピーをお届けする、 日本ペイント（株）のプロジェクト。これまで日本ペイントは塗料を通じて様々な社会貢献活動を実施して参りました。
                <br>これらの活動がさらに皆さまに認知され、親しみを持っていただける事を願い、 「HAPPY PAINT PROJECT」 の名前・ロゴを、このたび設けました。
                <br>日本ペイントの社会貢献活動は、これからもさらに進化を続けて参ります。
            </p>
            <div class="p-csr__box">
                <img src="/images/csr/img1.svg" />
                <div class="p-csr__box1">
                    <h3 class="c-title2 c-title2__style3">ロゴについて</h3>
                    <p>幸せの象徴である四つ葉のクローバー ペイントで描かれた四つ葉のクローバーは、 プロジェクト名に含まれる４つの「Ｐ」を 組み合わせて形作られています</p>
                </div>
            </div>
            <ul class="c-list__list c-list4__list">
                @foreach($hpp_topics as $topic)
                    <li class="c-list4__item">
                        @if(!empty($topic->content) || !empty($topic->redirect_url))
                            <a href="{{ $topic->topic_url }}">
                                <div class="c-list4__item__inner">
                                    <div class="c-list4__item__img">
                                        @if(!empty($topic->thumbnail))
                                            <img src="{{ $topic->thumbnail_url_path }}" alt="">
                                        @else
                                            <img src="/images/top/top5_img.jpg" alt="">
                                        @endif
                                    </div>
                                    <div class="c-list4__item__detail">
                                        <p class="c-list4__label">{{ $topic_categories[$topic->article_category_id] }}</p>
                                        <p class="c-list4__date">{{ $topic->publication_date->format('Y.m.d') }}</p>
                                        <p class="c-list4__text">{{ $topic->title }}</p>
                                    </div>
                                </div>
                            </a>
                        @else
                            <div class="c-list4__item__inner">
                                <div class="c-list4__item__img">
                                    @if(!empty($topic->thumbnail))
                                        <img src="{{ $topic->thumbnail_url_path }}" alt="">
                                    @else
                                        <img src="/images/top/top5_img.jpg" alt="">
                                    @endif
                                </div>
                                <div class="c-list4__item__detail">
                                    <p class="c-list4__label">{{ $topic_categories[$topic->article_category_id] }}</p>
                                    <p class="c-list4__date">{{ $topic->publication_date->format('Ymd') }}</p>
                                    <p class="c-list4__text">{{ $topic->title }}</p>
                                </div>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
            <a href="/news/csr" class="c-btn2 ">CSR活動の一覧を見る</a>
            <h2 class="c-title2 c-title2--center">産学連携の取り組み</h2>
            <p class="c-text1 u-center">日本ペイントは社会貢献活動の一環として、産学連携事業に取り組んでいます。</p>
            <div class="p-csr__box">
                <div class="p-csr__box1">
                    <h3 class="c-title2 c-title2__style3">大阪府立今宮工科高等学校との<br class="sp-only">産学連携</h3>
                    <p>
                        大阪府立今宮工科高等学校グラフィックデザイン系の生徒が当社の「外部企業チーム」の位置付けで企画立案したプロジェクトを両者の共同事業とし、実社会に近い創造活動を通じたパッケージデザイン、カタログデザイン、WEB動画デザインに取り組みます。
                        <br>（実行する企画内容は現在立案中です。想定するものは学校内外の塗料による価値創造・イベントの企画立案・販促物のデザインなどで、採用されるものによって連携の頻度・形態が異なります。）
                    </p>
                </div>
            </div>
            <ul class="c-list__list c-list4__list">
                @foreach($iu_topics as $topic)
                    <li class="c-list4__item">
                        @if(!empty($topic->content) || !empty($topic->redirect_url))
                            <a href="{{ $topic->topic_url }}">
                                <div class="c-list4__item__inner">
                                    <div class="c-list4__item__img">
                                        @if(!empty($topic->thumbnail))
                                            <img src="{{ $topic->thumbnail_url_path }}" alt="">
                                        @else
                                            <img src="/images/top/top5_img.jpg" alt="">
                                        @endif
                                    </div>
                                    <div class="c-list4__item__detail">
                                        <p class="c-list4__label">{{ $topic_categories[$topic->article_category_id] }}</p>
                                        <p class="c-list4__date">{{ $topic->publication_date->format('Y.m.d') }}</p>
                                        <p class="c-list4__text">{{ $topic->title }}</p>
                                    </div>
                                </div>
                            </a>
                        @else
                            <div class="c-list4__item__inner">
                                <div class="c-list4__item__img">
                                    @if(!empty($topic->thumbnail))
                                        <img src="{{ $topic->thumbnail_url_path }}" alt="">
                                    @else
                                        <img src="/images/top/top5_img.jpg" alt="">
                                    @endif
                                </div>
                                <div class="c-list4__item__detail">
                                    <p class="c-list4__label">{{ $topic_categories[$topic->article_category_id] }}</p>
                                    <p class="c-list4__date">{{ $topic->publication_date->format('Ymd') }}</p>
                                    <p class="c-list4__text">{{ $topic->title }}</p>
                                </div>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
            <a href="/news/csr" class="c-btn2 ">CSR活動の一覧を見る</a>
            <ul class="c-list10">
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="/about/message/">
                        <div class="c-list10__img">
                            <img src="/images/about/index/img_01.jpg" alt="トップメッセージ" class="off-hover">
                            <img src="/images/about/index/img_01-hover.jpg" alt="トップメッセージ" class="on-hover">
                            <img src="/images/about/index/img_01_sp.jpg" alt="トップメッセージ" class="sp-only">
                        </div>
                        <span class="c-list10__text">トップメッセージ</span>
                    </a>
                </li>
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="/about/company/">
                        <div class="c-list10__img">
                            <img src="/images/about/index/img_02.jpg" alt="会社概要" class="off-hover">
                            <img src="/images/about/index/img_02-hover.jpg" alt="会社概要" class="on-hover">
                            <img src="/images/about/index/img_02_sp.jpg" alt="会社概要" class="sp-only">
                        </div>
                        <span class="c-list10__text">会社概要</span>
                    </a>
                </li>
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="/about/network/">
                        <div class="c-list10__img">
                            <img src="/images/about/index/img_03.jpg" alt="拠点情報" class="off-hover">
                            <img src="/images/about/index/img_03-hover.jpg" alt="拠点情報" class="on-hover">
                            <img src="/images/about/index/img_03_sp.jpg" alt="拠点情報" class="sp-only">
                        </div>
                        <span class="c-list10__text">拠点情報</span>
                    </a>
                </li>
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="/recruit/">
                        <div class="c-list10__img">
                            <img src="/images/about/index/img_04.jpg" alt="採用情報" class="off-hover">
                            <img src="/images/about/index/img_04-hover.jpg" alt="採用情報" class="on-hover">
                            <img src="/images/about/index/img_04_sp.jpg" alt="採用情報" class="sp-only">
                        </div>
                        <span class="c-list10__text">採用情報</span>
                    </a>
                </li>
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="/csr/">
                        <div class="c-list10__img">
                            <img src="/images/about/index/img_05.jpg" alt="CSR活動" class="off-hover">
                            <img src="/images/about/index/img_05-hover.jpg" alt="CSR活動" class="on-hover">
                            <img src="/images/about/index/img_05_sp.jpg" alt="CSR活動" class="sp-only">
                        </div>
                        <span class="c-list10__text">CSR活動</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

</main>

<x-footer></x-footer>
