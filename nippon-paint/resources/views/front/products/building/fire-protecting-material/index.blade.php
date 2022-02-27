<x-header>
    <x-slot name="title">防火材料等認定商品｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の建築用塗料「防火材料等認定商品」PDFカタログ一覧ページです。豊富なラインナップであらゆるニーズにお応えします。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/building/fire-protecting-material/</x-slot>
</x-header>

<main class="p-material">
    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/building/">建築用塗料</a></li>
                <li><span>防火材料等認定商品</span></li>
            </ul>
        </div>
    </div>

    <x-mainimg2>
        <x-slot name="title_jap1">防火材料等認定商品</x-slot>
        <x-slot name="title_jap2">／ 建築用塗料</x-slot>
        <x-slot name="text">塗料塗装／不燃（準不燃・難燃）材料の施工仕様は、国土交通省大臣官房官庁監修「公共建築工事標準仕様書」18 章塗装工事、または「日本建築学会建築工事共通仕様書JASS18」によって認定を受けております。<br class="pc-only">詳しくはお問い合わせください。</x-slot>
    </x-mainimg2>

    @if($ape_certs->isNotEmpty() || $sop_certs->isNotEmpty() || $fe_certs->isNotEmpty() || $nad_certs->isNotEmpty() || $epg_certs->isNotEmpty() || $ept_certs->isNotEmpty())
    <section class="p-material1">
        <div class="l-cont">
            <h2 class="c-title2 c-title2--small">NM-8585（塗料塗装 / 不燃材料）、QM-9816（塗料塗装 / 準不燃材料）、<br class="pc-only">RM-9364（塗料塗装 / 難燃材料）</h2>

            <p class="p-material__note pc-only">※1 旧認定番号：基材同等第0001号</p>
            @if($ape_certs->isNotEmpty())
            <div class="p-material1__box">
                <h3 class="c-title2 c-title2__style3">合成樹脂エマルシヨンペイント</h3>
                @include('front.elements.products.building.fire_table', ['certs' => $ape_certs])
                <p class="p-material__note">※平滑仕上げのみ対象</p>
            </div>
            @endif

            @if($sop_certs->isNotEmpty())
            <div class="p-material1__box">
                <h3 class="c-title2 c-title2__style3">合成樹脂調合ペイント</h3>
                @include('front.elements.products.building.fire_table', ['certs' => $sop_certs])
            </div>
            @endif

            @if($fe_certs->isNotEmpty())
            <div class="p-material1__box">
                <h3 class="c-title2 c-title2__style3">フタル酸樹脂エナメル</h3>
                @include('front.elements.products.building.fire_table', ['certs' => $fe_certs])
            </div>
            @endif

            @if($nad_certs->isNotEmpty())
            <div class="p-material1__box">
                <h3 class="c-title2 c-title2__style3">アクリル樹脂系非水分散形塗料</h3>
                @include('front.elements.products.building.fire_table', ['certs' => $nad_certs])
            </div>
            @endif

            @if($epg_certs->isNotEmpty())
            <div class="p-material1__box">
                <h3 class="c-title2 c-title2__style3">つや有り合成樹脂エマルションペイント</h3>
                @include('front.elements.products.building.fire_table', ['certs' => $epg_certs])
            </div>
            @endif

            @if($ept_certs->isNotEmpty())
            <div class="p-material1__box">
                <h3 class="c-title2 c-title2__style3">合成樹脂エマルション模様塗料</h3>
                @include('front.elements.products.building.fire_table', ['certs' => $ept_certs])
            </div>
            @endif
        </div>
    </section>
    @endif

    <section class="p-material2">
        <div class="l-cont">

            @if($ys_certs->isNotEmpty())
            <h2 class="c-title2 c-title2--small">
                NM-8572（有機質砂壁状塗料塗り / 不燃材料）、
                <br class="pc-only">QM-9812（有機質砂壁状塗料塗り / 準不燃材料）、
                <br class="pc-only">RM-9361（有機質砂壁状塗料塗り / 難燃材料）
            </h2>
            <p class="c-text2 u-right">※1 旧認定番号：基材同等第0004号</p>
            @include('front.elements.products.building.fire_table', ['certs' => $ys_certs])
            <p class="c-text2 u-right">※模様が制限されますのでご注意願います。詳しくはお問い合わせください。</p>
            @endif

            @if($ms_certs->isNotEmpty())
            <h2 class="c-title2 c-title2--small">
                NM-8571（無機質砂壁状吹付材塗り / 不燃塗料）、
                <br class="pc-only">QM-9811（無機質砂壁状吹付材塗り / 準不燃塗料）、
                <br class="pc-only">RM-9366（無機質砂壁状吹付材塗り / 難燃塗料）
            </h2>
            <p class="c-text2 u-right">※1 旧認定番号：基材同等第0003号</p>
            @include('front.elements.products.building.fire_table', ['certs' => $ms_certs])
            @endif

            @if($fk_certs->isNotEmpty())
            <h2 class="c-title2 c-title2--small">
                NM-8573（複合型化粧用仕上塗り / 不燃塗料）、
                <br class="pc-only">QM-9813（複合型化粧用仕上塗り / 準不燃塗料）、
                <br class="pc-only">RM-9362（複合型化粧用仕上塗り / 難燃塗料）
            </h2>
            <p class="c-text2 u-right">※1 旧認定番号：基材同等第0005号</p>
            @include('front.elements.products.building.fire_table', ['certs' => $fk_certs])
            <p class="c-text2 u-right">※上塗りに制限があります。上塗りには合成樹脂エマルションペイントをご使用ください。</p>
            @endif

        </div>
    </section>
</main>

<x-footer></x-footer>