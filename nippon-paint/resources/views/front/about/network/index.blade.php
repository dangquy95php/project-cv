<x-header>
    <x-slot name="title">{{ $title }}｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の拠点情報一覧です。支店・営業所・工場・事業所のマップや所在地等。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">about_network</x-slot>
    <x-slot name="unique">about_network</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/about/network/</x-slot>
</x-header>

<main class="p-aboutNetwork">

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/about/">日本ペイントについて</a></li>
                <li><span>拠点情報</span></li>
            </ul>
        </div>
    </div>

    <section class="p-aboutNetwork1">
        <div class="l-cont">
            <h1 class="c-title2 c-title2__style2">拠点情報<span>／ 日本ペイントについて</span></h1>
            @if (!empty($network_headquarters))
            <div class="c-map">
                <x-title2>
                    <x-slot name="title2_class">c-title2--small</x-slot>
                    <x-slot name="title2_text">{{ $headquarters }}</x-slot>
                </x-title2>
                <ul class="c-map__list">
                    @foreach ($network_headquarters as $network_headquarter)
                    <li class="c-map__item">
                        <div class="c-map__info">
                            <p class="c-map__txt">〒{{ $network_headquarter->zip }}<br>{{ $network_headquarter->block }}</p>
                            <p class="c-map__phone">
                                <span>TEL <a href="tel:+{{$network_headquarter->tel}}">{{ $network_headquarter->tel }}</a></span>
                                <span>FAX <a href="tel:+{{$network_headquarter->fax}}">{{ $network_headquarter->fax }}</a></span>
                            </p>
                            <p class="c-map__note">{{ $network_headquarter->remark }}</p>
                        </div>
                        <div class="c-map__map">
                            <iframe src="{{ $network_headquarter->googlemap }}"></iframe>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (!empty($network_branches))
            <div class="c-map c-map--col2">
                <x-title2>
                    <x-slot name="title2_text">{{ $branch }}</x-slot>
                    <x-slot name="title2_class">c-title2--small</x-slot>
                </x-title2>
                <ul class="c-map__list">
                    @foreach ($network_branches as $network_branch)
                    <li class="c-map__item">
                        <div class="c-map__info">
                            <x-title2>
                                <x-slot name="title2_class">c-title2__style3</x-slot>
                                <x-slot name="title2_text">{{ $network_branch->name }}</x-slot>
                            </x-title2>
                            <p class="c-map__txt">〒{{ $network_branch->zip }}<br>{{ $network_headquarter->block }}</p>
                            <p class="c-map__phone">
                                <span>TEL <a href="tel:+{{ $network_branch->tel }}">{{ $network_branch->tel }}</a></span>
                                <span>FAX <a href="tel:+{{ $network_branch->fax }}">{{ $network_branch->fax }}</a></span>
                            </p>
                        </div>
                        <a href="{{ $network_branch->googlemap }}" class="c-btn2" target=_blank>地図を見る</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (!empty($network_sales_offices))
            <div class="c-map c-map--col3">
                <x-title2>
                    <x-slot name="title2_text">{{ $sales_office }}</x-slot>
                    <x-slot name="title2_class">c-title2--small</x-slot>
                </x-title2>
                <ul class="c-map__list">
                    @foreach ($network_sales_offices as $network_sales_office)
                    <li class="c-map__item">
                        <div class="c-map__info">
                            <x-title2>
                                <x-slot name="title2_class">c-title2__style3</x-slot>
                                <x-slot name="title2_text">{{ $network_sales_office->name }}</x-slot>
                            </x-title2>
                            <p class="c-map__txt">〒{{ $network_sales_office->zip }}<br>{{ $network_sales_office->block }}</p>
                            <p class="c-map__phone">
                                <span>TEL <a href="tel:+{{ $network_sales_office->tel }}">{{ $network_sales_office->tel }}</a></span>
                                <span>FAX <a href="tel:+{{ $network_sales_office->fax }}">{{ $network_sales_office->fax }}</a></span>
                            </p>
                        </div>
                        <a href="{{ $network_sales_office->googlemap }}" class="c-btn2" target=_blank>地図を見る</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            @if (!empty($network_factories))
            <div class="c-map c-map--col2">
                <x-title2>
                    <x-slot name="title2_text">{{$factory}}</x-slot>
                    <x-slot name="title2_class">c-title2--small</x-slot>
                </x-title2>
                <ul class="c-map__list">
                    @foreach ($network_factories as $network_factory)
                    <li class="c-map__item">
                        <div class="c-map__info">
                            <x-title2>
                                <x-slot name="title2_class">c-title2__style3</x-slot>
                                <x-slot name="title2_text">{{ $network_factory->name }}</x-slot>
                            </x-title2>
                            <p class="c-map__txt">〒{{ $network_factory->zip }}<br>{{ $network_factory->block }}</p>
                            <p class="c-map__phone">
                                <span>TEL <a href="tel:+{{ $network_factory->tel }}">{{ $network_factory->tel }}</a></span>
                                <span>FAX <a href="tel:+{{ $network_factory->fax }}">{{ $network_factory->fax }}</a></span>
                            </p>
                        </div>
                        <a href="{{ $network_factory->googlemap }}" class="c-btn2" target=_blank>地図を見る</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (!empty($network_offices))
            <div class="c-map c-map--col2">
                <x-title2>
                    <x-slot name="title2_text">{{$office}}</x-slot>
                    <x-slot name="title2_class">c-title2--small</x-slot>
                </x-title2>
                <ul class="c-map__list">
                    @foreach ($network_offices as $network_office)
                    <li class="c-map__item">
                        <div class="c-map__info">
                            <x-title2>
                                <x-slot name="title2_class">c-title2__style3</x-slot>
                                <x-slot name="title2_text">{{ $network_office->name }}</x-slot>
                            </x-title2>
                            <p class="c-map__txt">〒{{ $network_office->zip }}<br>{{ $network_office->block }}</p>
                            <p class="c-map__phone">（代）
                                <span>TEL <a href="tel:+{{ $network_office->tel }}">{{ $network_office->tel }}</a></span>
                                <span>FAX <a href="tel:+{{ $network_office->fax }}">{{ $network_office->fax }}</a></span>
                            </p>
                            <p class="c-map__txt">{{ $network_office->remark }}</p>
                        </div>
                        <a href="{{ $network_office->googlemap }}" class="c-btn2" target=_blank>地図を見る</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <ul class="c-list10 c-list10__style1">
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="/about/message/">
                        <div class="c-list10__img">
                            <img src="/images/common/list10_style1_img1.jpg" alt="トップメッセージ" class="pc-only">
                            <img src="/images/common/list10_style1_img1_sp.jpg" alt="トップメッセージ" class="sp-only">
                        </div>
                        <span class="c-list10__text">トップメッセージ</span>
                    </a>
                </li>
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="/about/company/">
                        <div class="c-list10__img">
                            <img src="/images/common/list10_style1_img2.jpg" alt="会社概要" class="pc-only">
                            <img src="/images/common/list10_style1_img2_sp.jpg" alt="会社概要" class="sp-only">
                        </div>
                        <span class="c-list10__text">会社概要</span>
                    </a>
                </li>
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="/about/network/">
                        <div class="c-list10__img">
                            <img src="/images/common/list10_style1_img3.jpg" alt="拠点情報" class="pc-only">
                            <img src="/images/common/list10_style1_img3_sp.jpg" alt="拠点情報" class="sp-only">
                        </div>
                        <span class="c-list10__text">拠点情報</span>
                    </a>
                </li>
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="/recruit/">
                        <div class="c-list10__img">
                            <img src="/images/common/list10_style1_img4.jpg" alt="採用情報" class="pc-only">
                            <img src="/images/common/list10_style1_img4_sp.jpg" alt="採用情報" class="sp-only">
                        </div>
                        <span class="c-list10__text">採用情報</span>
                    </a>
                </li>
                <li class="c-list10__item">
                    <a class="c-list10__inner" href="/csr/">
                        <div class="c-list10__img">
                            <img src="/images/common/list10_style1_img5.jpg" alt="CSR活動" class="pc-only">
                            <img src="/images/common/list10_style1_img5_sp.jpg" alt="CSR活動" class="sp-only">
                        </div>
                        <span class="c-list10__text">CSR活動</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

</main>

<x-footer></x-footer>
