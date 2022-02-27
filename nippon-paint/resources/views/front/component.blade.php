<x-header>
    <x-slot name="title">components</x-slot>
    <x-slot name="description">components</x-slot>
    <x-slot name="keywords">components, components</x-slot>
    <x-slot name="slug">components</x-slot>
    <x-slot name="unique">components</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url"></x-slot>
</x-header>

<main class="p-component">
    <div class="c-dev-title1">tab</div>
    <div class="c-dev-title2">c-tab</div>
    <div class="l-cont">
        <x-tab></x-tab>
    </div>

    <div class="c-dev-title1">breadcrumb</div>
    <div class="c-dev-title2">c-breadcrumb</div>
    <div class="l-cont">
        <x-breadcrumb></x-breadcrumb>
    </div>

    <div class="c-dev-title1">form</div>
    <div class="c-dev-title2">c-form1</div>
    <div class="l-cont">
        <x-form1></x-form1>
    </div>

    <div class="c-dev-title2">c-form1 c-form1--style2</div>
    <div class="l-cont">
        <div class="c-form1 c-form1--style2">
            <h2 class="c-form1__text">
                <span class="c-form1__text1">製品を探す</span>
                <span class="c-form1__text2">Search</span>
            </h2><!-- / c-form1__text -->

            <form class="c-form1__form">
                <div class="c-form1__input">
                    <input type="text" placeholder="製品名・キーワード・JIS規格を入力して下さい">
                </div>
                <button class="c-form1__btn"></button>
            </form><!-- / c-form1__form -->
        </div>
    </div>
    <div class="c-dev-title2">c-form1 c-form1--style3</div>
    <div class="l-cont">
        <div class="c-form1 c-form1--style3">
            <h2 class="c-form1__text">
                <span class="c-form1__text1">キーワードから探す</span>
                <span class="c-form1__text2">Keyword</span>
            </h2><!-- / c-form1__text -->

            <form class="c-form1__form">
                <div class="c-form1__input">
                    <input type="text" placeholder="キーワードを入力して下さい">
                </div>
                <button class="c-form1__btn"></button>
            </form><!-- / c-form1__form -->
        </div>
    </div>
    <div class="c-dev-title2">c-form2</div>
    <x-form2></x-form2>

    <div class="c-dev-title2">c-form2 c-form2--noextend</div>
    <div class="c-form2 c-form2--noextend">
        <div class="l-cont">
            <div class="c-form2__header">
                <h3 class="c-form2__title1">
                    <span class="c-form2__title1__jap">条件で絞り込む</span>
                    <span class="c-form2__title1__eng">Filter</span>
                </h3>

                <h4 class="c-form2__title2">該当件数<span>40</span>件</h4>
            </div><!-- / c-form2__header -->

            <div class="c-form2__text sp-only">
                <div class="c-form2__text__inner">
                    <div class="c-form2__text__row">
                        <p class="c-form2__text1"><strong>外塗り用上塗り塗材</strong>／</p>
                        <p class="c-form2__text2">水性塗料、弱溶剤系塗料、溶剤<br>系塗料、外壁用遮熱塗料、陶磁器<br>タイル用塗料</p>
                    </div>

                    <div class="c-form2__text__row">
                        <p class="c-form2__text1"><strong>樹脂</strong>／</p>
                        <p class="c-form2__text2">アクリル、ウレタン</p>
                    </div>

                    <div class="c-form2__text__row">
                        <p class="c-form2__text1"><strong>水性/溶剤</strong>／</p>
                        <p class="c-form2__text2">水性系、強溶剤系</p>
                    </div>
                </div><!-- / c-form2__text__inner -->

            </div><!-- / c-form2__text -->

            <div class="c-form2__body">
                <form action="" class="c-form2__form">
                    <div class="c-form2__form__inner">
                        <div class="c-form2__btnclose js-c-form2__btnclose"><span class="c-form2__btnclose__text">閉じる</span></div>

                        <div class="c-form2__row">
                            <div class="c-form2__label">系統</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox1">
                                        <input type="checkbox" id="checkbox1">
                                        <span>外装用上塗り塗料</span>
                                    </label>
                                </span>

                                <span class="c-form2__cb">
                                    <label for="checkbox2">
                                        <input type="checkbox" id="checkbox2">
                                        <span>外装用仕上げ塗材</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox3">
                                        <input type="checkbox" id="checkbox3">
                                        <span>内装用塗料</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox4">
                                        <input type="checkbox" id="checkbox4">
                                        <span>屋根用塗料</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox5">
                                        <input type="checkbox" id="checkbox5">
                                        <span>下塗り塗料・下地調整材</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox6">
                                        <input type="checkbox" id="checkbox6">
                                        <span>鉄部用塗料</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox7">
                                        <input type="checkbox" id="checkbox7">
                                        <span>床・路面用塗料</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox8">
                                        <input type="checkbox" id="checkbox8">
                                        <span>屋上防水材</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox9">
                                        <input type="checkbox" id="checkbox9">
                                        <span>シーリング材</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox10">
                                        <input type="checkbox" id="checkbox10">
                                        <span>現場用添加剤</span>
                                    </label>
                                </span>
                            </div><!-- / c-form2__grcheckbox -->

                        </div><!-- / c-form2__row -->

                        <div class="c-form2__row">
                            <div class="c-form2__label">樹脂</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox21">
                                        <input type="checkbox" id="checkbox21">
                                        <span>アクリル</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox22">
                                        <input type="checkbox" id="checkbox22">
                                        <span>ウレタン</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox23">
                                        <input type="checkbox" id="checkbox23">
                                        <span>シリコン</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox24">
                                        <input type="checkbox" id="checkbox24">
                                        <span>ラジカル制御剤</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox25">
                                        <input type="checkbox" id="checkbox25">
                                        <span>フッ素</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox26">
                                        <input type="checkbox" id="checkbox26">
                                        <span>無機系</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox27">
                                        <input type="checkbox" id="checkbox27">
                                        <span>エポキシ</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox28">
                                        <input type="checkbox" id="checkbox28">
                                        <span>アルキド</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox29">
                                        <input type="checkbox" id="checkbox29">
                                        <span>フェノール</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb c-form2__cb--dbline">
                                    <label for="checkbox210">
                                        <input type="checkbox" id="checkbox210">
                                        <span>シラン系、セメント系、<br class="pc-only">消石灰系</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox211">
                                        <input type="checkbox" id="checkbox211">
                                        <span>その他</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                </span>
                            </div><!-- / c-form2__grcheckbox -->

                        </div><!-- / c-form2__row -->

                        <div class="c-form2__row">
                            <div class="c-form2__label">水性/溶剤</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox31">
                                        <input type="checkbox" id="checkbox31">
                                        <span>水性系</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb is-disable">
                                    <label for="checkbox32">
                                        <input type="checkbox" id="checkbox32" disable>
                                        <span>弱溶剤系</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox33">
                                        <input type="checkbox" id="checkbox33">
                                        <span>強溶剤系</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                </span>
                            </div><!-- / c-form2__grcheckbox -->

                        </div><!-- / c-form2__row -->

                        <div class="c-form2__row">
                            <div class="c-form2__label">1液/2液</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox41">
                                        <input type="checkbox" id="checkbox41">
                                        <span>1液</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox42">
                                        <input type="checkbox" id="checkbox42">
                                        <span>2液</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox43">
                                        <input type="checkbox" id="checkbox43">
                                        <span>その他</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                </span>
                            </div><!-- / c-form2__grcheckbox -->

                        </div><!-- / c-form2__row -->

                        <div class="c-form2__rowadd js-c-form2__rowadd non-extend">
                            <p class="c-form2__rowadd__text js-open-form2-row pc-only">詳細条件を開く</p>
                            <p class="c-form2__rowadd__text js-open-form2-row sp-only">条件を変更する</p>
                            <div class="c-form2__rowadd__after"></div>
                        </div><!-- / c-form2__rowadd -->

                    </div>
                    <div class="c-form2__btn">
                        <button>絞り込む</button>
                    </div>
                </form>
            </div><!-- / c-form2__body -->

        </div>
    </div>

    <div class="c-dev-title2">c-form2 c-form2--shorten</div>
    <div class="c-form2 c-form2--shorten">
        <div class="l-cont">
            <div class="c-form2__header">
                <h3 class="c-form2__title1">
                    <span class="c-form2__title1__jap">条件で絞り込む</span>
                    <span class="c-form2__title1__eng">Filter</span>
                </h3>

                <h4 class="c-form2__title2">該当件数<span>40</span>件</h4>
            </div><!-- / c-form2__header -->

            <div class="c-form2__body">
                <form action="" class="c-form2__form">
                    <div class="c-form2__form__inner">
                        <div class="c-form2__btnclose js-c-form2--close"><span class="c-form2__btnclose__text">詳細条件を閉じる</span></div>

                        <div class="c-form2__row">
                            <div class="c-form2__label">カテゴリー</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox1">
                                        <input type="checkbox" id="checkbox1">
                                        <span>上塗り塗料</span>
                                    </label>
                                </span>

                                <span class="c-form2__cb">
                                    <label for="checkbox2">
                                        <input type="checkbox" id="checkbox2">
                                        <span>クリヤー</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox3">
                                        <input type="checkbox" id="checkbox3">
                                        <span>プラサフ</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox4">
                                        <input type="checkbox" id="checkbox4">
                                        <span>パテ</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox5">
                                        <input type="checkbox" id="checkbox5">
                                        <span>プライマー</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox6">
                                        <input type="checkbox" id="checkbox6">
                                        <span>補助剤その他</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox7">
                                        <input type="checkbox" id="checkbox7">
                                        <span>調色関連商品</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox8">
                                        <input type="checkbox" id="checkbox8">
                                        <span>塗装関連商品</span>
                                    </label>
                                </span>
                            </div><!-- / c-form2__grcheckbox -->

                        </div><!-- / c-form2__row -->

                        <div class="c-form2__row">
                            <div class="c-form2__label">硬化剤比率</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox21">
                                        <input type="checkbox" id="checkbox21">
                                        <span>2：1</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox22">
                                        <input type="checkbox" id="checkbox22">
                                        <span>3：1</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox23">
                                        <input type="checkbox" id="checkbox23">
                                        <span>4：1</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox24">
                                        <input type="checkbox" id="checkbox24">
                                        <span>5：1</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox25">
                                        <input type="checkbox" id="checkbox25">
                                        <span>8：1</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox26">
                                        <input type="checkbox" id="checkbox26">
                                        <span>10：1</span>
                                    </label>
                                </span>
                            </div><!-- / c-form2__grcheckbox -->

                        </div><!-- / c-form2__row -->

                        <div class="c-form2__row">
                            <div class="c-form2__label">1液/2液</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox31">
                                        <input type="checkbox" id="checkbox31" checked>
                                        <span>1液</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox32">
                                        <input type="checkbox" id="checkbox32">
                                        <span>2液</span>
                                    </label>
                                </span>
                            </div><!-- / c-form2__grcheckbox -->

                        </div><!-- / c-form2__row -->

                        <div class="c-form2__row">
                            <div class="c-form2__label">特徴</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox41">
                                        <input type="checkbox" id="checkbox41">
                                        <span>特化則対象外</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox42">
                                        <input type="checkbox" id="checkbox42">
                                        <span>PRTR法届出対象外</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox43">
                                        <input type="checkbox" id="checkbox43">
                                        <span>低VOC</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox41">
                                        <input type="checkbox" id="checkbox41">
                                        <span>艶消し</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox42">
                                        <input type="checkbox" id="checkbox42">
                                        <span>耐スリ傷</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox43">
                                        <input type="checkbox" id="checkbox43">
                                        <span>架装向け</span>
                                    </label>
                                </span>
                            </div><!-- / c-form2__grcheckbox -->

                        </div><!-- / c-form2__row -->

                        <div class="c-form2__rowadd">
                            <p class="c-form2__rowadd__text js-c-form2-expend">詳細条件を開く</p>
                        </div><!-- / c-form2__rowadd -->

                    </div>
                    <div class="c-form2__btn">
                        <button>絞り込む</button>
                    </div>
                </form>
            </div><!-- / c-form2__body -->

        </div>
    </div><!-- / c-form2 c-form2--shorten -->
    
    <div class="c-dev-title2">c-form2 c-form2--style1</div>
    <div class="c-form2 c-form2--style1">
        <div class="l-cont">
            <div class="c-form2__header">
                <h4 class="c-title2 c-title2__style3">条件で絞り込む</h4>
                <h4 class="c-form2__title2">該当件数<span class=c-num>40</span>件</h4>
            </div><!-- / c-form2__header -->

            <div class="c-form2__body">
                <form action>
                    <div class="c-form2">
                        <div class="c-form2__row">
                            <div class="c-form2__label">規格名</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox101">
                                        <input type="checkbox" id="checkbox101">
                                        <span>日本道路協会（塩害対策指針）（昭和59年2月）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox102">
                                        <input type="checkbox" id="checkbox102">
                                        <span>日本道路協会（便覧）（平成26年3月）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox103">
                                        <input type="checkbox" id="checkbox103">
                                        <span>NEXCO（東日本・中日本・西日本）高速道路㈱（令和1年7月）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox104">
                                        <input type="checkbox" id="checkbox104">
                                        <span>首都高速道路㈱（剥落）（平成26年8月）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox105">
                                        <input type="checkbox" id="checkbox105">
                                        <span>首都高速道路㈱（SDK）（平成29年8月）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox106">
                                        <input type="checkbox" id="checkbox106">
                                        <span>首都高速道路㈱（SDK)（2019年7月）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox107">
                                        <input type="checkbox" id="checkbox107">
                                        <span>名古屋高速道路公社（NES)（平成22年1月）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox108">
                                        <input type="checkbox" id="checkbox108">
                                        <span>阪神高速道路㈱（HDK)（平成29年及び平成30年）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox109">
                                        <input type="checkbox" id="checkbox109">
                                        <span>福岡北九州高速道路公社（FKD）（平成25年及び平成27年）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox110">
                                        <input type="checkbox" id="checkbox110">
                                        <span>本州四国連絡高速道路㈱（HBS)（令和元年10月）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox111">
                                        <input type="checkbox" id="checkbox111">
                                        <span>鉄道総合技術研究所（SPS)（2013年12月）</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox112">
                                        <input type="checkbox" id="checkbox112">
                                        <span>国土交通省（機械工事塗装要領（案）・同解説）（平成22年4月）</span>
                                    </label>
                                </span>
                            </div><!-- / c-form2__grcheckbox -->
                        </div>
                        <div class="c-form2__row">
                            <div class="c-form2__label">塗装区分</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox113">
                                        <input type="checkbox" id="checkbox113">
                                        <span>新設</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox14">
                                        <input type="checkbox" id="checkbox114">
                                        <span>塗替</span>
                                    </label>
                                </span>
                            </div><!-- / c-form2__grcheckbox -->
                        </div>

                        <div class="c-form2__row">
                            <div class="c-form2__label">被塗物</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox115">
                                        <input type="checkbox" id="checkbox115">
                                        <span>鉄</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox116">
                                        <input type="checkbox" id="checkbox116">
                                        <span>亜鉛めっき</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox117">
                                        <input type="checkbox" id="checkbox117">
                                        <span>溶射</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox118">
                                        <input type="checkbox" id="checkbox118">
                                        <span>耐候性鋼材</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox119">
                                        <input type="checkbox" id="checkbox119">
                                        <span>コンクリート</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox120">
                                        <input type="checkbox" id="checkbox120">
                                        <span>その他</span>
                                    </label>
                                </span>
                            </div><!-- / c-form2__grcheckbox -->
                        </div>

                        <div class="c-form2__row">
                            <div class="c-form2__label">塗装箇所</div>
                            <div class="c-form2__grcheckbox">
                                <span class="c-form2__cb">
                                    <label for="checkbox121">
                                        <input type="checkbox" id="checkbox121">
                                        <span>外面</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox121">
                                        <input type="checkbox" id="checkbox121">
                                        <span>内面</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox122">
                                        <input type="checkbox" id="checkbox122">
                                        <span>継手部</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox123">
                                        <input type="checkbox" id="checkbox123">
                                        <span>溶接部</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox124">
                                        <input type="checkbox" id="checkbox124">
                                        <span>桁端部</span>
                                    </label>
                                </span>
                                <span class="c-form2__cb">
                                    <label for="checkbox125">
                                        <input type="checkbox" id="checkbox125">
                                        <span>その他</span>
                                    </label>
                                </span>
                            </div><!-- / c-form2__grcheckbox -->
                        </div>

                        <div class="c-form2__btn">
                            <button>絞り込む</button>
                        </div>
                    </div>
                </form>
            </div><!-- / c-form2__body -->

        </div>
    </div><!-- / c-form2 c-form2--style1 -->

    
    <div class="c-dev-title2">c-form3</div>
    <div class="l-cont2">
        <div class="c-form3">
            <form action="">
                <dl>
                    <dt>お名前<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <div class="c-form3__input">
                            <input type="text" placeholder="例）山田 太郎">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>よみがな<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__input__text1">全角ひらがなで入力してください</p>
                        <div class="c-form3__input">
                            <input type="text" placeholder="例）やまだ たろう">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>会社名</dt>
                    <dd>
                        <div class="c-form3__input">
                            <input type="text" placeholder="例）日本ペイント株式会社">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>部署名</dt>
                    <dd>
                        <div class="c-form3__input">
                            <input type="text" placeholder="例）東京営業所">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>業種<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <div class="c-form3__select">
                            <select>
                                <option value="" selected>業種をお選びください</option>
                                <option value="1">ゼネコン・工務店</option>
                                　<option value="2">ゼネコン（設計）</option>
                                　<option value="3">設計事務所</option>
                                　<option value="4">リフォーム</option>
                                　<option value="5">塗装業</option>
                                　<option value="6">塗料販売</option>
                                　<option value="7">営繕</option>
                                　<option value="8">自動車補修・鈑金</option>
                                　<option value="9">防水業</option>
                                　<option value="10">企業（メーカー）</option>
                                　<option value="11">企業（商社、他）</option>
                                　<option value="12">官公庁・公共団体</option>
                                　<option value="13">個人</option>
                                　<option value="14">その他</option>
                            </select>
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>eメール<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__input__text1">半角英数字で入力してください</p>
                        <div class="c-form3__input c-form3__input--large">
                            <input type="text" placeholder="例）taro@nipponpaint.co.jp">
                        </div>
                        <p class="c-form3__input__text2">※アドレスに誤りがあると返信ができません。<br class="sp-only">この場合は受信確認メールも届きませんのでご注意ください。</p>
                    </dd>
                </dl>
                <dl>
                    <dt>郵便番号<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__input__text1">半角数字で入力してください。</p>
                        <p class="c-form3__input__text1">郵便番号を入力すると自動で住所が反映されます。</p>
                        <div class="c-form3__input c-form3__input--short">
                            <input type="text" placeholder="例）012-3456">
                        </div>
                        <p class="c-form3__input__text2">※海外のお客様は、000-0000 と入力してください。</p>
                    </dd>
                </dl>
                <dl>
                    <dt>ご住所<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <div class="c-form3__select">
                            <select>
                                <option value="" selected>都道府県をお選びください</option>
                                <option value="1">北海道</option>
                                <option value="2">青森県</option>
                                　<option value="3">岩手県</option>
                                　<option value="4">宮城県</option>
                                　<option value="5">秋田県</option>
                                　<option value="6">山形県</option>
                                　<option value="7">福島県</option>
                                　<option value="8">茨城県</option>
                                　<option value="9">栃木県</option>
                                　<option value="10">群馬県</option>
                                　<option value="11">埼玉県</option>
                                　<option value="12">千葉県</option>
                                　<option value="13">東京都</option>
                                　<option value="14">神奈川県</option>
                                　<option value="15">新潟県</option>
                                　<option value="16">富山県</option>
                                　<option value="17">石川県</option>
                                　<option value="18">福井県</option>
                                　<option value="19">山梨県</option>
                                　<option value="20">長野県</option>
                                　<option value="21">岐阜県</option>
                                　<option value="22">静岡県</option>
                                　<option value="23">愛知県</option>
                                　<option value="24">三重県</option>
                                　<option value="25">滋賀県</option>
                                　<option value="26">京都府</option>
                                　<option value="27">大阪府</option>
                                　<option value="28">兵庫県</option>
                                　<option value="29">奈良県</option>
                                　<option value="30">和歌山県</option>
                                　<option value="31">鳥取県</option>
                                　<option value="32">島根県</option>
                                　<option value="33">岡山県</option>
                                　<option value="34">広島県</option>
                                　<option value="35">山口県</option>
                                　<option value="36">徳島県</option>
                                　<option value="37">香川県</option>
                                　<option value="38">愛媛県</option>
                                　<option value="39">高知県</option>
                                　<option value="40">福岡県</option>
                                　<option value="41">佐賀県</option>
                                　<option value="42">長崎県</option>
                                　<option value="43">熊本県</option>
                                　<option value="44">大分県</option>
                                　<option value="45">宮崎県</option>
                                　<option value="46">鹿児島県</option>
                                　<option value="47">沖縄県</option>
                            </select>
                        </div>
                        <p class="c-form3__input__text1">市区町村・番地を入力してください</p>
                        <div class="c-form3__input c-form3__input--large">
                            <input type="text" placeholder="例）大阪市北区大淀北2-1-2">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>お電話<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__input__text1">半角数字で入力してください</p>
                        <div class="c-form3__input">
                            <input type="text" placeholder="例）012-3456-7890">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>お問い合わせ内容<span class="c-form3__label">必須</span></dt>
                    <dd class="c-form3__grcheckbox">
                        <div class="c-form3__checkbox">
                            <span class="c-form3__checkbox__item">
                                <label for="form3_cb1"><input name="form3_rd1" id="form3_cb1" type="radio"><span class="c-form3__checkbox__text">カタログのご請求（1種類に付き1部となります）</span>
                                </label>
                            </span>
                            <span class="c-form3__checkbox__item">
                                <label for="form3_cb2"><input name="form3_rd1" id="form3_cb2" type="radio"><span class="c-form3__checkbox__text">商品について</span>
                                </label>
                            </span>
                            <span class="c-form3__checkbox__item">
                                <label for="form3_cb3"><input name="form3_rd1" id="form3_cb3" type="radio"><span class="c-form3__checkbox__text">その他</span>
                                </label>
                            </span>
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>具体的な内容<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <div class="c-form3__textarea">
                            <textarea placeholder="お問い合わせ内容をご記入ください"></textarea>
                        </div>
                    </dd>
                </dl>

                <div class="c-form3__btn">
                    <button class="is-active"><span>確認する</span></button>
                    <div class="c-form3__img">
                        <img src="/images/common/form_img.svg">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="c-dev-title2">c-form3 c-form3--error</div>
    <div class="l-cont2">
        <div class="c-form3 c-form3--error">
            <form action="">
                <dl>
                    <dt>お名前<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__error is-active">名前を入力してください</p>
                        <div class="c-form3__input is-error">
                            <input type="text" placeholder="例）山田 太郎">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>よみがな<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__input__text1 is-error">全角ひらがなで入力してください</p>
                        <div class="c-form3__input is-error">
                            <input type="text" placeholder="例）やまだ たろう">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>会社名</dt>
                    <dd>
                        <div class="c-form3__input">
                            <input type="text" placeholder="例）日本ペイント株式会社">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>部署名</dt>
                    <dd>
                        <div class="c-form3__input">
                            <input type="text" placeholder="例）東京営業所">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>業種<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__error is-active">業種を選択してください</p>
                        <div class="c-form3__select is-error">
                            <select>
                                <option value="" selected>業種をお選びください</option>
                                <option value="1">ゼネコン・工務店</option>
                                　<option value="2">ゼネコン（設計）</option>
                                　<option value="3">設計事務所</option>
                                　<option value="4">リフォーム</option>
                                　<option value="5">塗装業</option>
                                　<option value="6">塗料販売</option>
                                　<option value="7">営繕</option>
                                　<option value="8">自動車補修・鈑金</option>
                                　<option value="9">防水業</option>
                                　<option value="10">企業（メーカー）</option>
                                　<option value="11">企業（商社、他）</option>
                                　<option value="12">官公庁・公共団体</option>
                                　<option value="13">個人</option>
                                　<option value="14">その他</option>
                            </select>
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>eメール<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__input__text1 is-error">半角英数字で入力してください</p>
                        <div class="c-form3__input c-form3__input--large is-error">
                            <input type="text" placeholder="例）taro@nipponpaint.co.jp">
                        </div>
                        <p class="c-form3__input__text2">※アドレスに誤りがあると返信ができません。<br class="sp-only">この場合は受信確認メールも届きませんのでご注意ください。</p>
                    </dd>
                </dl>
                <dl>
                    <dt>郵便番号<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__input__text1 is-error">半角数字で入力してください。</p>
                        <p class="c-form3__input__text1">郵便番号を入力すると自動で住所が反映されます。</p>
                        <div class="c-form3__input c-form3__input--short is-error">
                            <input type="text" placeholder="例）012-3456">
                        </div>
                        <p class="c-form3__input__text2">※海外のお客様は、000-0000 と入力してください。</p>
                    </dd>
                </dl>
                <dl>
                    <dt>ご住所<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__error is-active">都道府県を選択してください。</p>
                        <div class="c-form3__select is-error">
                            <select>
                                <option value="" selected>都道府県をお選びください</option>
                                <option value="1">北海道</option>
                                　<option value="2">青森県</option>
                                　<option value="3">岩手県</option>
                                　<option value="4">宮城県</option>
                                　<option value="5">秋田県</option>
                                　<option value="6">山形県</option>
                                　<option value="7">福島県</option>
                                　<option value="8">茨城県</option>
                                　<option value="9">栃木県</option>
                                　<option value="10">群馬県</option>
                                　<option value="11">埼玉県</option>
                                　<option value="12">千葉県</option>
                                　<option value="13">東京都</option>
                                　<option value="14">神奈川県</option>
                                　<option value="15">新潟県</option>
                                　<option value="16">富山県</option>
                                　<option value="17">石川県</option>
                                　<option value="18">福井県</option>
                                　<option value="19">山梨県</option>
                                　<option value="20">長野県</option>
                                　<option value="21">岐阜県</option>
                                　<option value="22">静岡県</option>
                                　<option value="23">愛知県</option>
                                　<option value="24">三重県</option>
                                　<option value="25">滋賀県</option>
                                　<option value="26">京都府</option>
                                　<option value="27">大阪府</option>
                                　<option value="28">兵庫県</option>
                                　<option value="29">奈良県</option>
                                　<option value="30">和歌山県</option>
                                　<option value="31">鳥取県</option>
                                　<option value="32">島根県</option>
                                　<option value="33">岡山県</option>
                                　<option value="34">広島県</option>
                                　<option value="35">山口県</option>
                                　<option value="36">徳島県</option>
                                　<option value="37">香川県</option>
                                　<option value="38">愛媛県</option>
                                　<option value="39">高知県</option>
                                　<option value="40">福岡県</option>
                                　<option value="41">佐賀県</option>
                                　<option value="42">長崎県</option>
                                　<option value="43">熊本県</option>
                                　<option value="44">大分県</option>
                                　<option value="45">宮崎県</option>
                                　<option value="46">鹿児島県</option>
                                　<option value="47">沖縄県</option>
                            </select>
                        </div>
                        <p class="c-form3__input__text1 is-error">市区町村・番地を入力してください</p>
                        <div class="c-form3__input c-form3__input--large is-error">
                            <input type="text" placeholder="例）大阪市北区大淀北2-1-2">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>お電話<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__input__text1 is-error">半角数字で入力してください</p>
                        <div class="c-form3__input is-error">
                            <input type="text" placeholder="例）012-3456-7890">
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>お問い合わせ内容<span class="c-form3__label">必須</span></dt>
                    <dd class="c-form3__grcheckbox">
                        <p class="c-form3__error is-active">選択してください</p>
                        <div class="c-form3__checkbox">
                            <span class="c-form3__checkbox__item">
                                <label for="form3_cb4"><input name="form3_rd2" id="form3_cb4" type="radio"><span class="c-form3__checkbox__text">カタログのご請求（1種類に付き1部となります）</span>
                                </label>
                            </span>
                            <span class="c-form3__checkbox__item">
                                <label for="form3_cb5"><input name="form3_rd2" id="form3_cb5" type="radio"><span class="c-form3__checkbox__text">商品について</span>
                                </label>
                            </span>
                            <span class="c-form3__checkbox__item">
                                <label for="form3_cb6"><input name="form3_rd2" id="form3_cb6" type="radio"><span class="c-form3__checkbox__text">その他</span>
                                </label>
                            </span>
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>具体的な内容<span class="c-form3__label">必須</span></dt>
                    <dd>
                        <p class="c-form3__error is-active">入力してください</p>
                        <div class="c-form3__textarea is-error">
                            <textarea placeholder="お問い合わせ内容をご記入ください"></textarea>
                        </div>
                    </dd>
                </dl>

                <div class="c-form3__btn">
                    <button><span>確認する</span></button>
                    <div class="c-form3__img">
                        <img src="/images/common/form_img.svg">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="c-dev-title2">c-form4</div>
    <div class="l-cont2">
        <div class="c-form4">
            <h3 class="c-title2 c-title2__style3">よろしければ、<br class="sp-only">アンケートにご協力ください。</h3>
            <h4 class="c-form4__txt1">塗料に関する情報をどのような方法で入手されますか？（複数回答可）</h4>
            <h5 class="c-form4__txt2"><span>01.</span>専門誌</h5>
            <ul class="c-form4__checkbox">
                <li><input type="checkbox" id="magazine1" name="magazine" value="積算資料（ポケット版）"><label for="magazine1">積算資料（ポケット版）</label></li>
                <li><input type="checkbox" id="magazine2" name="magazine" value="建設物価"><label for="magazine2">建設物価</label></li>
                <li><input type="checkbox" id="magazine3" name="magazine" value="積算資料"><label for="magazine3">積算資料</label></li>
                <li><input type="checkbox" id="magazine4" name="magazine" value="日経アーキテクチュア"><label for="magazine4">日経アーキテクチュア</label></li>
                <li><input type="checkbox" id="magazine5" name="magazine" value="近代建築"><label for="magazine5">近代建築</label></li>
                <li><input type="checkbox" id="magazine6" name="magazine" value="建築仕上技術"><label for="magazine6">建築仕上技術</label></li>
                <li>
                    <input type="checkbox" id="magazine7" name="magazine" value="その他"><label for="magazine7">その他</label>
                    <input type="text" placeholder="その他を選択した方はこちらにご記入ください">
                </li>
            </ul>
            <h5 class="c-form4__txt2"><span>02.</span>ホームページ</h5>
            <ul class="c-form4__checkbox">
                <li><input type="checkbox" id="home1" name="home" value="塗料メーカーのホームページ"><label for="home1">塗料メーカーのホームページ</label></li>
                <li><input type="checkbox" id="home2" name="home" value="アーキマップ"><label for="home2">アーキマップ</label></li>
                <li><input type="checkbox" id="home3" name="home" value="建材ナビ"><label for="home3">建材ナビ</label></li>
                <li><input type="checkbox" id="home4" name="home" value="dbnet"><label for="home4">dbnet</label></li>
                <li><input type="checkbox" id="home5" name="home" value="建設MIL"><label for="home5">建設MIL</label></li>
                <li><input type="checkbox" id="home6" name="home" value="けんせつPLAZA"><label for="home6">けんせつPLAZA</label></li>
                <li><input type="checkbox" id="home7" name="home" value="建設Navi"><label for="home7">建設Navi</label></li>
                <li><input type="checkbox" id="home8" name="home" value="KISS"><label for="home8">KISS</label></li>
                <li><input type="checkbox" id="home9" name="home" value="建設工業調査会"><label for="home9">建設工業調査会</label></li>
                <li>
                    <input type="checkbox" id="home10" name="home" value="その他"><label for="home10">その他</label>
                    <input type="text" placeholder="その他を選択した方はこちらにご記入ください">
                </li>
            </ul>
            <h5 class="c-form4__txt2"><span>03.</span>上記以外の方法</h5>
            <ul class="c-form4__checkbox">
                <li><input type="checkbox" id="other1" name="other" value="お取引業者様からのご紹介"><label for="other1">お取引業者様からのご紹介</label></li>
                <li><input type="checkbox" id="other2" name="other" value="アーキマップ"><label for="other2">アーキマップ</label></li>
                <li>
                    <input type="checkbox" id="other3" name="other" value="その他"><label for="other3">その他</label>
                    <input type="text" placeholder="その他を選択した方はこちらにご記入ください">
                </li>
            </ul>
            <h4 class="c-form4__txt1">お客さまの携わる主な工事内容を教えてください。（複数回答可）</h4>
            <ul class="c-form4__checkbox">
                <li><input type="checkbox" id="content1" name="content" value="新築"><label for="content1">新築</label></li>
                <li><input type="checkbox" id="content2" name="content" value="改修"><label for="content2">改修</label></li>
                <li><input type="checkbox" id="content3" name="content" value="戸建住宅"><label for="content3">戸建住宅</label></li>
                <li><input type="checkbox" id="content4" name="content" value="分譲マンション"><label for="content4">分譲マンション</label></li>
                <li><input type="checkbox" id="content5" name="content" value="賃貸住宅"><label for="content5">賃貸住宅</label></li>
                <li><input type="checkbox" id="content6" name="content" value="オフィスビル／商業施設"><label for="content6">オフィスビル／商業施設</label></li>
                <li><input type="checkbox" id="content7" name="content" value="工場／倉庫"><label for="content7">工場／倉庫</label></li>
                <li>
                    <input type="checkbox" id="content8" name="content" value="その他"><label for="content8">その他</label>
                    <input type="text" placeholder="その他を選択した方はこちらにご記入ください">
                </li>
            </ul>
        </div>
    </div>

    <div class="c-dev-title1">title</div>
    <div class="c-dev-title2">c-title1</div>
    <div class="l-cont">
        <x-title1>
            <x-slot name="class">c-title1</x-slot>
            <x-slot name="text_eng">Product</x-slot>
            <x-slot name="text_jap">塗料を探す</x-slot>
        </x-title1>
    </div>

    <div class="c-dev-title2">c-title2</div>
    <div class="l-cont">
        <x-title2>
            <x-slot name="title2_text">建築用塗料に関する<br class="sp-only">よくあるご質問</x-slot>
        </x-title2>
    </div>

    <div class="c-dev-title2">c-title2 c-title2--white</div>
    <div class="l-cont">
        <x-title2>
            <x-slot name="title2_text">建築用塗料に関する<br class="sp-only">よくあるご質問</x-slot>
            <x-slot name="title2_class">c-title2--white</x-slot>
        </x-title2>
    </div>

    <div class="c-dev-title2">c-title2 c-title2--center</div>
    <div class="l-cont">
        <x-title2>
            <x-slot name="title2_text">建築用塗料に関する<br class="sp-only">よくあるご質問</x-slot>
            <x-slot name="title2_class">c-title2--center</x-slot>
        </x-title2>

        <br>
        <br>
        <h2 class="c-title2 c-title2--center">タイカリットの認可内容<span class="c-title2__sub">（認定書ダウンロード）</span></h2>
    </div>

    <div class="c-dev-title2">c-title2 c-title2--small</div>
    <div class="l-cont">
        <x-title2>
            <x-slot name="title2_text">建築用塗料に関する<br class="sp-only">よくあるご質問</x-slot>
            <x-slot name="title2_class">c-title2--small</x-slot>
        </x-title2>
    </div>

    <div class="c-dev-title2">c-title2 c-title2__style1</div>
    <div class="l-cont">
        <x-title2>
            <x-slot name="title2_class">c-title2__style1</x-slot>
            <x-slot name="title2_text">仕上がりサンプル</x-slot>
        </x-title2>
    </div>

    <div class="c-dev-title2">c-title2 c-title2__style2</div>
    <div class="l-cont">
        <x-title2>
            <x-slot name="title2_class">c-title2__style2</x-slot>
            <x-slot name="title2_text">外塗り用上塗り塗材<span>／ 建築用塗料</span></x-slot>
        </x-title2>

        <x-title2>
            <x-slot name="title2_class">c-title2__style2</x-slot>
            <x-slot name="title2_text">建築用塗料 ア行</x-slot>
        </x-title2>
    </div>

    <div class="c-dev-title2">c-title2 c-title2__style2line</div>
    <div class="l-cont">
        <x-title2>
            <x-slot name="title2_class">c-title2__style2line</x-slot>
            <x-slot name="title2_text">耐火塗料の優れた特長<span>／ 重防食用塗料</span></x-slot>
        </x-title2>
    </div>

    <div class="c-dev-title2">c-title2 c-title2__style3</div>
    <div class="l-cont">
        <x-title2>
            <x-slot name="title2_class">c-title2__style3</x-slot>
            <x-slot name="title2_text">合成樹脂エマルシヨンペイント</x-slot>
        </x-title2>
    </div>

    <div class="c-dev-title2">c-title2 c-title2__style4</div>
    <div class="l-cont">
        <x-title2>
            <x-slot name="title2_class">c-title2__style4</x-slot>
            <x-slot name="title2_text">塗料の基礎知識</x-slot>
        </x-title2>
    </div>

    <div class="c-dev-title2">c-title2 c-title2__style5</div>
    <div class="l-cont">
        <x-title2>
            <x-slot name="title2_class">c-title2__style5</x-slot>
            <x-slot name="title2_text">ROUGH 模様のご提案（9パターン）</x-slot>
        </x-title2>
    </div>

    <div class="c-dev-title2">c-title3</div>
    <div class="l-cont">
        <x-title3>
            <x-slot name="title3_text">塗料の基本</x-slot>
        </x-title3>
    </div>

    <div class="c-dev-title2">c-title3 c-title3--center</div>
    <div class="l-cont">
        <x-title3>
            <x-slot name="title3_text">塗料の基本</x-slot>
            <x-slot name="title3_class">c-title3--center</x-slot>
        </x-title3>
    </div>

    <div class="c-dev-title2">c-title3 c-title3--center c-title3--white</div>
    <div class="l-cont">
        <x-title3>
            <x-slot name="title3_text">塗料の基本</x-slot>
            <x-slot name="title3_class">c-title3--center c-title3--white</x-slot>
        </x-title3>
    </div>

    <div class="c-dev-title2">c-title3 c-title3__style1</div>
    <div class="l-cont">
        <x-title3>
            <x-slot name="title3_text">塗料の3大機能</x-slot>
            <x-slot name="title3_class">c-title3__style1</x-slot>
        </x-title3>
    </div>

    <div class="c-dev-title2">c-title3 c-title3__style2</div>
    <div class="l-cont">
        <h2 class="c-title3 c-title3__style2">塗料の特別な機能の例</h2>
    </div>

    <div class="c-dev-title2">c-title3 c-title3__style3</div>
    <div class="l-cont">
        <x-title3>
            <x-slot name="title3_text">みなさまへのお知らせ</x-slot>
            <x-slot name="title3_class">c-title3__style3</x-slot>
        </x-title3>
    </div>

    <div class="c-dev-title2">c-title3 c-title3__style4</div>
    <div class="l-cont">
        <x-title3>
            <x-slot name="title3_text">いい仕事を創る双方向情報誌！<br>今すぐ役立つ情報盛りだくさんで、絶賛発行中！</x-slot>
            <x-slot name="title3_class">c-title3__style4</x-slot>
        </x-title3>
    </div>

    <div class="c-dev-title2">c-title4</div>
    <div class="l-cont">
        <x-title4>
            <x-slot name="title4_text">塗料は世の中のさまざまな物に使われている</x-slot>
        </x-title4>
    </div>

    <div class="c-dev-title2">c-title4__sub</div>
    <div class="l-cont">
        <h1 class="c-title4">用語が入ります<span class="c-title4__sub">読み：よみがなが入ります</span></h1>
    </div>

    <div class="c-dev-title2">c-title4 c-title4__style1</div>
    <div class="l-cont">
        <h3 class="c-title4 c-title4__style1">塗装対象物の保護</h3>
    </div>

    <div class="c-dev-title2">c-title5</div>
    <div class="l-cont">
        <x-title5>
            <x-slot name="title5_text">戸建て塗り替えの必要性h1</x-slot>
        </x-title5>
    </div>

    <div class="c-dev-title2">c-title6</div>
    <div class="l-cont">
        <x-title6>
            <x-slot name="title6_text">見出しが入りますこの文章はダミーですh4</x-slot>
        </x-title6>
    </div>

    <div class="c-dev-title2">c-title6 c-title6__style1</div>
    <div class="l-cont">
        <x-title6>
            <x-slot name="title6_text">見出しが入りますこの文章はダミーですh4</x-slot>
            <x-slot name="title6_class">c-title6__style1</x-slot>
        </x-title6>
    </div>

    <div class="c-dev-title2">c-title6 c-title6__style2</div>
    <div class="l-cont">
        <x-title6>
            <x-slot name="title6_text">“{検索KW},{検索KW},{検索KW}”で該当するページがありませんでした。</x-slot>
            <x-slot name="title6_class">c-title6__style2</x-slot>
        </x-title6>
    </div>

    <div class="c-dev-title2">c-title6 c-title6__style3</div>
    <div class="l-cont">
        <x-title6>
            <x-slot name="title6_text">見出しが入りますこの文章はダミーですh4</x-slot>
            <x-slot name="title6_class">c-title6__style3</x-slot>
        </x-title6>
    </div>

    <div class="c-dev-title2">c-title7</div>
    <div class="l-cont">
        <x-title7>
            <x-slot name="title7_text">見出しが入りますこの文章はダミーですh2</x-slot>
        </x-title7>
    </div>

    <div class="c-dev-title2">c-title8</div>
    <div class="l-cont">
        <x-title8>
            <x-slot name="title8_text">見出しが入りますこの文章はダミーですh3</x-slot>
        </x-title8>
    </div>

    <div class="c-dev-title2">c-title8 c-title8__style1</div>
    <div class="l-cont">
        <x-title8>
            <x-slot name="title8_text">見出しが入りますこの文章はダミーですh3</x-slot>
            <x-slot name="title8_class">c-title8__style1</x-slot>
        </x-title8>
    </div>

    <div class="c-dev-title2">c-title9</div>
    <h2 class="c-title9">
        <span class="c-title9__text">タフガードQ-R工法カタログお申し込みフォーム</span>
    </h2>

    <div class="c-dev-title1">btn</div>
    <div class="c-dev-title2">c-btn1</div>
    <div class="l-cont">
        <x-btn>
            <x-slot name="class">c-btn1</x-slot>
            <x-slot name="text">view all</x-slot>
        </x-btn>
    </div>

    <div class="c-dev-title2">c-btn2</div>
    <div class="l-cont">
        <x-btn2>
            <x-slot name="btn2_text">よくあるご質問を見る</x-slot>
        </x-btn2>
    </div>

    <div class="c-dev-title2">c-btn2 c-btn2__style4</div>
    <div class="l-cont">
        <x-btn2>
            <x-slot name="btn2_text">製品情報TOPページ</x-slot>
            <x-slot name="btn2_class">c-btn2__style4</x-slot>
        </x-btn2>
    </div>

    <div class="c-dev-title2">c-btn2 c-btn2__border</div>
    <div class="l-cont">
        <x-btn2>
            <x-slot name="btn2_text">詳しく見る</x-slot>
            <x-slot name="btn2_class">c-btn2__border</x-slot>
        </x-btn2>
    </div>

    <div class="c-dev-title2">c-btn2 c-btn2__style1</div>
    <div class="l-cont">
        <x-btn2>
            <x-slot name="btn2_class">c-btn2__style1</x-slot>
            <x-slot name="btn2_text">防火材料等証明書</x-slot>
        </x-btn2>
    </div>

    <div class="c-dev-title2">c-btn2 c-btn2__style2 c-btn2__download</div>
    <div class="l-cont">
        <x-btn2>
            <x-slot name="btn2_class">c-btn2__style2 c-btn2__download</x-slot>
            <x-slot name="btn2_text">一括ダウンロードする（831KB）</x-slot>
        </x-btn2>
    </div>

    <div class="c-dev-title2">c-btn2 c-btn2__style2 c-btn2__tag</div>
    <div class="l-cont">
        <x-btn2>
            <x-slot name="btn2_class">c-btn2__style2 c-btn2__tag</x-slot>
            <x-slot name="btn2_text">色見本帳を申し込む</x-slot>
        </x-btn2>
    </div>

    <div class="c-dev-title2">c-btn2 c-btn2__style6</div>
    <div class="l-cont">
        <x-btn2>
            <x-slot name="btn2_class">c-btn2__style6</x-slot>
            <x-slot name="btn2_text">お問い合わせ窓口を見る</x-slot>
        </x-btn2>
    </div>

    <div class="c-dev-title2">c-btn2 c-btn2__style3 c-btn2__tag</div>
    <div class="l-cont">
        <x-btn2>
            <x-slot name="btn2_class">c-btn2__style3 c-btn2__tag</x-slot>
            <x-slot name="btn2_text">色見本帳を申し込む</x-slot>
        </x-btn2>
    </div>

    <div class="c-dev-title2">c-btn2 c-btn2__style3 c-btn2__tag3</div>
    <div class="l-cont">
        <x-btn2>
            <x-slot name="btn2_class">c-btn2__style3 c-btn2__tag3</x-slot>
            <x-slot name="btn2_text">ダウンロードする</x-slot>
        </x-btn2>
    </div>

    <div class="c-dev-title2">c-btn2 c-btn2__style5</div>
    <div class="l-cont">
        <x-btn2>
            <x-slot name="btn2_class">c-btn2__style5</x-slot>
            <x-slot name="btn2_text">ログインする</x-slot>
        </x-btn2>
    </div>

    <div class="c-dev-title2">c-btn3 c-btn3--blue</div>
    <div class="l-cont">
        <x-btn3>
            <x-slot name="btn3_text">前へ</x-slot>
            <x-slot name="btn3_class">c-btn3--blue</x-slot>
        </x-btn3>
    </div>

    <div class="c-dev-title2">c-btn3 c-btn3--red</div>
    <div class="l-cont">
        <x-btn3>
            <x-slot name="btn3_text">次へ</x-slot>
            <x-slot name="btn3_class">c-btn3--red</x-slot>
        </x-btn3>
    </div>

    <div class="c-dev-title2">c-btnpdf</div>
    <div class="l-cont">
        <x-btnpdf>
            <x-slot name="btnpdf_link"></x-slot>
            <x-slot name="btnpdf_text">研修会パンフレット</x-slot>
        </x-btnpdf>
    </div>

    <div class="c-dev-title1">list</div>
    <div class="c-dev-title2">c-list c-list1</div>
    <x-list>
        <x-slot name="class">c-list1</x-slot>
        <x-slot name="title_jap">塗料を探す</x-slot>
        <x-slot name="title_eng">Product</x-slot>
        <x-slot name="list_text">日本ペイントは住宅やビル、マンションなどの建築物・橋梁・プラント・タンクなどの大型構造物用塗料や、自動車の補修塗装向け塗料の開発・製造および販売を展開しています。</x-slot>
    </x-list>

    <div class="c-dev-title2">c-list c-list2</div>
    <x-list>
        <x-slot name="class">c-list2</x-slot>
        <x-slot name="title_jap">製品特集</x-slot>
        <x-slot name="title_eng">Feature</x-slot>
    </x-list>

    <div class="c-dev-title2">c-list c-list3</div>
    <x-list>
        <x-slot name="class">c-list3</x-slot>
        <x-slot name="title_jap">ニッペラボ</x-slot>
        <x-slot name="title_eng">Labo</x-slot>
        <x-slot name="list_text">塗料の選びに役立つ基礎知識やノウハウをご紹介する「ニッペラボ」。塗料選びに役立つコンテンツです。</x-slot>
    </x-list>

    <div class="c-dev-title2">c-list c-list4</div>
    <x-list>
        <x-slot name="class">c-list4</x-slot>
        <x-slot name="title_eng">Topics</x-slot>
        <x-slot name="title_jap">トピックス</x-slot>
    </x-list>

    <div class="c-dev-title2">c-list5</div>
    <div class="l-cont">
        <x-list5></x-list5>
    </div>

    <div class="c-dev-title2">c-list6</div>
    <div class="l-cont">
        <x-list6></x-list6>
    </div>

    <div class="c-dev-title2">c-list6__box c-list6__box--fwidth</div>
    <div class="l-cont">
        <ul class="c-list6__box c-list6__box--fwidth">
            <li class="c-list6__item arrow">
                <a href="#" class="c-list6__txt">防火材料等証明書</a>
            </li>
            <li class="c-list6__item arrow">
                <a href="#" class="c-list6__txt">ホルムアルデヒド放散等級の<br class="pc-only">証明書</a>
            </li>
            <li class="c-list6__item arrow">
                <a href="#" class="c-list6__txt">公共建築工事標準仕様書<br class="pc-only">ダウンロード</a>
            </li>
        </ul>
    </div>

    <div class="c-dev-title2">c-list6__box c-list6__box--style1 c-list6__box--fwidth</div>
    <div class="l-cont2">
        <ul class="c-list6__box c-list6__box--style1 c-list6__box--fwidth">
            <li class="c-list6__item">
                <a href="#" target="_blank" class="c-list6__txt">東京研修センター 申込書</a>
            </li>
            <li class="c-list6__item">
                <a href="#" target="_blank" class="c-list6__txt">大阪研修センター 申込書</a>
            </li>
            <li class="c-list6__item">
                <a href="#" target="_blank" class="c-list6__txt">福岡研修センター 申込書</a>
            </li>
        </ul>
    </div>

    <div class="c-dev-title2">c-list6 c-list6--col4</div>
    <div class="l-cont">
        <div class="c-list6 c-list6--col4">
            <ul class="c-list6__box">
                <li class="c-list6__item">
                    <a href="#" target="_blank" class="c-list6__txt">JIS規格一覧表・塗装略号一覧表</a>
                </li>
                <li class="c-list6__item">
                    <a href="#" target="_blank" class="c-list6__txt">さび止め色相表</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">カタログ一覧</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">耐火認定</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">技術資料（塗膜異常、技術解説資料）</a>
                </li>
                <li class="c-list6__item">
                    <a href="#" target="_blank" class="c-list6__txt">積算資料</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="c-dev-title2">c-list6 c-list6--col5</div>
    <div class="l-cont">
        <div class="c-list6 c-list6--col5">
            <ul class="c-list6__box">
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">前処理塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">油性・フタル酸系一般さび止め塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">特殊さび止め塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">エポキシ系さび止め塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">フタル酸(アルキド)樹脂塗料(中・上塗り)</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">下・上兼用塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">M.I.O塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">フェノール樹脂塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">塩化ゴム系塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">変性エポキシ樹脂塗料(下塗り)</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">エポキシ樹脂塗料(下・中・上塗り)</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">コールタールフリー塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">ウレタン樹脂塗料(中・上塗り)</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">ふっ素樹脂塗料(中・上塗り)</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">ガラスフレーク塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">屋根用塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">海水導入管用防汚塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">耐熱塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">シンナー</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">橋梁用塗料(防食便覧など)</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">コンクリート防食システム</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">落書き・張り紙防止塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">水性防食塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">耐火塗料</a>
                </li>
                <li class="c-list6__item arrow">
                    <a href="#" class="c-list6__txt">鉄塔用塗料</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="c-dev-title2">c-list7</div>
    <div class="l-cont">
        <x-list7></x-list7>
    </div>
    <div class="c-dev-title2">c-list7 c-list7__full</div>
    <div class="l-cont">
        <x-list7full></x-list7full>
    </div>

    <div class="c-dev-title2">c-list8</div>
    <div class="l-cont">
        <x-list8></x-list8>
    </div>

    <div class="c-dev-title2">c-list9</div>
    <div class="l-cont">
        <x-list9></x-list9>
    </div>

    <div class="c-dev-title2">c-list9 c-list9__style1</div>
    <ul class="c-list9 c-list9__style1">
        <li class="c-list9__item"><a href="">
                <img src="/images/products/building/img1.jpg" alt="カタログを見る">
                <p class="c-list9__item__text">カタログを見る</p>
            </a></li>
        <li class="c-list9__item"><a href="">
                <img src="/images/products/building/noimg.jpg" alt="説明書を見る">
                <p class="c-list9__item__text">説明書を見る</p>
            </a></li>
        <li class="c-list9__item"><a href="">
                <img src="/images/products/building/noimg.jpg" alt="シリーズカタログを見る">
                <p class="c-list9__item__text">シリーズカタログを見る</p>
            </a></li>
        <li class="c-list9__item"><a href="">
                <img src="/images/products/building/noimg.jpg" alt="施工要領書を見る">
                <p class="c-list9__item__text">施工要領書を見る</p>
            </a></li>
        <li class="c-list9__item"><a href="">
                <img src="/images/products/building/noimg.jpg" alt="色見本を見る">
                <p class="c-list9__item__text">色見本を見る</p>
            </a></li>
    </ul>

    <div class="c-dev-title2">c-list9 c-list9__style2</div>
    <ul class="c-list9 c-list9__style2">
        <li class="c-list9__item">
            <div class="c-list9__item__inner">
                <img src="/images/products/building/img2.jpg" alt="ヘッド押さえ模様">
                <p class="c-list9__item__text">ヘッド押さえ模様</p>
            </div>
        </li>
        <li class="c-list9__item">
            <div class="c-list9__item__inner">
                <img src="/images/products/building/img3.jpg" alt="凹凸模様">
                <p class="c-list9__item__text">凹凸模様</p>
            </div>
        </li>
        <li class="c-list9__item">
            <div class="c-list9__item__inner">
                <img src="/images/products/building/img4.jpg" alt="小柄凹凸模様">
                <p class="c-list9__item__text">小柄凹凸模様</p>
            </div>
        </li>
        <li class="c-list9__item">
            <div class="c-list9__item__inner">
                <img src="/images/products/building/img5.jpg" alt="ゆず肌状模様">
                <p class="c-list9__item__text">ゆず肌状模様</p>
            </div>
        </li>
    </ul>

    <div class="c-dev-title2">c-list9 c-list9__style3</div>
    <div class="l-cont">
        <ul class="c-list9 c-list9__style3">
            <li class="c-list9__item">
                <div class="c-list9__item__inner">
                    <img src="/images/products/building/img1.jpg">
                </div>
            </li>
            <li class="c-list9__item">
                <div class="c-list9__item__inner">
                    <img src="/images/products/building/noimg.jpg">
                </div>
            </li>
            <li class="c-list9__item">
                <div class="c-list9__item__inner">
                    <img src="/images/products/building/noimg.jpg">
                </div>
            </li>
            <li class="c-list9__item">
                <div class="c-list9__item__inner">
                    <img src="/images/products/building/noimg.jpg">
                </div>
            </li>
            <li class="c-list9__item">
                <div class="c-list9__item__inner">
                    <img src="/images/products/building/noimg.jpg">
                </div>
            </li>
        </ul>
    </div>

    <div class="c-dev-title2">c-list9 c-list9__style4</div>
    <div class="l-cont">
        <ul class="c-list9 c-list9__style4">
            <li class="c-list9__item">
                <p>東京研修センター</p>
                <img src="/images/products/automotive/nax_img1.jpg" alt="東京研修センター">
            </li>
            <li class="c-list9__item">
                <p>大阪研修センター</p>
                <img src="/images/products/automotive/nax_img2.jpg" alt="大阪研修センター">
            </li>
            <li class="c-list9__item">
                <p>九州研修センター</p>
                <img src="/images/products/automotive/nax_img3.jpg" alt="九州研修センター">
            </li>
        </ul>
    </div>

    <div class="c-dev-title2">c-list10</div>
    <div class="l-cont">
        <x-list10></x-list10>
    </div>

    <div class="c-dev-title2">c-list10 c-list10__style1</div>
    <div class="l-cont">
        <ul class="c-list10 c-list10__style1">
            <li class="c-list10__item">
                <a class="c-list10__inner" href="/">
                    <div class="c-list10__img">
                        <img src="/images/common/list10_style1_img1.jpg" alt="トップメッセージ" class="pc-only">
                        <img src="/images/common/list10_style1_img1_sp.jpg" alt="トップメッセージ" class="sp-only">
                    </div>
                    <span class="c-list10__text">トップメッセージ</span>
                </a>
            </li>
            <li class="c-list10__item">
                <a class="c-list10__inner" href="/">
                    <div class="c-list10__img">
                        <img src="/images/common/list10_style1_img2.jpg" alt="会社概要" class="pc-only">
                        <img src="/images/common/list10_style1_img2_sp.jpg" alt="会社概要" class="sp-only">
                    </div>
                    <span class="c-list10__text">会社概要</span>
                </a>
            </li>
            <li class="c-list10__item">
                <a class="c-list10__inner" href="/">
                    <div class="c-list10__img">
                        <img src="/images/common/list10_style1_img3.jpg" alt="拠点情報" class="pc-only">
                        <img src="/images/common/list10_style1_img3_sp.jpg" alt="拠点情報" class="sp-only">
                    </div>
                    <span class="c-list10__text">拠点情報</span>
                </a>
            </li>
            <li class="c-list10__item">
                <a class="c-list10__inner" href="/">
                    <div class="c-list10__img">
                        <img src="/images/common/list10_style1_img4.jpg" alt="採用情報" class="pc-only">
                        <img src="/images/common/list10_style1_img4_sp.jpg" alt="採用情報" class="sp-only">
                    </div>
                    <span class="c-list10__text">採用情報</span>
                </a>
            </li>
            <li class="c-list10__item">
                <a class="c-list10__inner" href="/">
                    <div class="c-list10__img">
                        <img src="/images/common/list10_style1_img5.jpg" alt="CSR活動" class="pc-only">
                        <img src="/images/common/list10_style1_img5_sp.jpg" alt="CSR活動" class="sp-only">
                    </div>
                    <span class="c-list10__text">CSR活動</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="c-dev-title2">c-list10 c-list10--col2</div>
    <div class="l-cont">
        <ul class="c-list10 c-list10--col2">
            <li class="c-list10__item">
                <a class="c-list10__inner" href="/">
                    <div class="c-list10__img">
                        <img src="/images/products/large/img_03.jpg" alt="建築用塗料" class="pc-only">
                        <img src="/images/products/large/img_03_sp.jpg" alt="建築用塗料" class="sp-only">
                    </div>
                    <span class="c-list10__text">製品を探す</span>
                </a>
            </li>
            <li class="c-list10__item">
                <a class="c-list10__inner" href="/">
                    <div class="c-list10__img">
                        <img src="/images/products/large/img_04.jpg" alt="重防食用塗料" class="pc-only">
                        <img src="/images/products/large/img_04_sp.jpg" alt="重防食用塗料" class="sp-only">
                    </div>
                    <span class="c-list10__text">仕様を探す</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="c-dev-title2">c-list11</div>
    <div class="l-cont">
        <x-list11></x-list11>
    </div>

    <div class="c-dev-title2">c-list12</div>
    <div class="l-cont">
        <x-list12></x-list12>

        <br>
        <br>
        <br>

        <ul class="c-list12">
            <li class="c-list12__item">キーワードに誤字・脱字リストスタイルが入ります。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。がないか確認してください。</li>
            <li class="c-list12__item">リストスタイルが入ります。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</li>
            <li class="c-list12__item">リストスタイルが入ります。<a href="#">アンカーリンク</a> <a href="#" target="_blank" class="extend">別タブで開くアンカーリンク</a></li>
        </ul>
    </div>

    <div class="c-dev-title2">c-list12 c-list12--blue</div>
    <div class="l-cont">
        <ul class="c-list12 c-list12--blue">
            <li class="c-list12__item">リストスタイルが入りますこの文章はダミーです予めご了承ください</li>
            <li class="c-list12__item">リストスタイルが入ります<br>リストスタイルが入りますこの文章はダミーです予めご了承ください</li>
            <li class="c-list12__item">リストスタイル。<a href="#">アンカーリンク</a>。<a href="#" target="_blank" class="extend">別タブで開くアンカーリンク</a></li>
        </ul>
    </div>

    <div class="c-dev-title2">c-list13</div>
    <div class="l-cont">
        <x-list13></x-list13>
    </div>

    <div class="c-dev-title2">c-list14</div>
    <div class="l-cont">
        <x-list14></x-list14>
    </div>

    <div class="c-dev-title2">c-list14 c-list14--style2</div>
    <div class="l-cont">
        <div class="c-list14 c-list14--style2">
            <ul class="c-list14__box">
                <li class="c-list14__item">
                    <a href="#" class="c-list14__txt">タグ名が入ります</a>
                </li>
                <li class="c-list14__item">
                    <a href="#" class="c-list14__txt">タグ名が入ります</a>
                </li>
                <li class="c-list14__item">
                    <a href="#" class="c-list14__txt">タグ名が入ります</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="c-dev-title2">c-list15</div>
    <div class="l-cont">
        <x-list15></x-list15>
    </div>

    <div class="c-dev-title2">c-list16</div>
    <x-list16></x-list16>

    <div class="c-dev-title2">c-list17</div>
    <div class="l-cont2">
        <x-list17></x-list17>
    </div>

    <div class="c-dev-title2">c-list18</div>
    <div class="l-cont2">
        <x-list18></x-list18>
    </div>

    <div class="c-dev-title2">c-list18 c-list18--style1</div>
    <div class="l-cont2">
        <ul class="c-list18 c-list18--style1">
            <li class="c-list18__item">
                <h3 class="c-title2 c-title2__style5"><span>1. </span>素地調整工程</h3>
                <p class="c-text1">コンクリート表面調整を目的としたケレン作業完了後、タフガードEWフィラーをこてで塗工します。欠損、段差や鉄筋腐食部などへは事前に復旧処置が必要です。</p>
                <figure class="c-list18__img">
                    <img src="/images/products/special/img_01.jpg" alt="">
                </figure>
            </li>
            <li class="c-list18__item">
                <h3 class="c-title2 c-title2__style5"><span>2. </span>プライマー工程</h3>
                <p class="c-text1">付着性を確保することを目的としてタフガードR-Wプライマーをフィラー施工後16時間以上14日以内に、はけ・ローラーなどで塗装します。</p>
                <figure class="c-list18__img">
                    <img src="/images/products/special/img_02.jpg" alt="">
                </figure>
            </li>
            <li class="c-list18__item">
                <h3 class="c-title2 c-title2__style5"><span>3. </span>中塗り工程</h3>
                <p class="c-text1">タフガードQ-Rを、プライマー施工後2時間以上5日以内にこて・へらなどを併用し、スケや膜厚のバラツキがでないように塗工します。</p>
                <figure class="c-list18__img">
                    <img src="/images/products/special/img_03.jpg" alt="">
                </figure>
            </li>
            <li class="c-list18__item">
                <h3 class="c-title2 c-title2__style5"><span>4. </span>上塗り工程</h3>
                <p class="c-text1">タフガードUD上塗を、均一に塗布し仕上げ塗装をします。タフガードウレタンシンナーで希釈し、中塗り施工後2時間以上3日以内にローラー・はけなどで塗装します。</p>
                <figure class="c-list18__img">
                    <img src="/images/products/special/img_04.jpg" alt="">
                </figure>
            </li>
            <li class="c-list18__item">
                <h3 class="c-title2 c-title2__style5"><span>5. </span>完了</h3>
                <figure class="c-list18__img">
                    <img src="/images/products/special/img_05.jpg" alt="" class="pc-only">
                    <img src="/images/products/special/img_05_sp.jpg" alt="" class="sp-only">
                </figure>
            </li>
        </ul>
    </div>

    <div class="c-dev-title2">c-list19</div>
    <div class="l-cont2">
        <x-list19></x-list19>
    </div>

    <div class="c-dev-title2">c-list20</div>
    <x-list20></x-list20>

    <div class="c-dev-title2">c-list21</div>
    <div class="l-cont2">
        <x-list21></x-list21>
    </div>

    <div class="c-dev-title2">c-boxlist c-boxlist1</div>
    <div class="l-cont">
        <ul class="c-boxlist c-boxlist1">
            <li class="c-boxlist1__item"><a href="">
                    <div class="c-boxlist__head"><span>塗料の成分</span></div>
                    <p class="c-boxlist__text">塗料の成分である顔料、樹脂、添加剤、溶媒の役割や種類について説明しています。</p>
                </a></li><!-- / c-boxlist1__item__item -->
            <li class="c-boxlist1__item"><a href="">
                    <div class="c-boxlist__head"><span>塗料から塗膜になるまで</span></div>
                    <p class="c-boxlist__text">塗料の塗膜成分と非塗膜成分について説明しています。</p>
                </a></li><!-- / c-boxlist1__item__item -->
            <li class="c-boxlist1__item"><a href="">
                    <div class="c-boxlist__head"><span>塗膜の劣化</span></div>
                    <p class="c-boxlist__text">塗膜が劣化する原因や、劣化したときに起こる現象について説明しています。</p>
                </a></li><!-- / c-boxlist1__item__item -->
        </ul><!-- / c-boxlist c-boxlist1 -->
    </div>

    <div class="c-dev-title2">c-boxlist c-boxlist1 c-boxlist1--style2</div>
    <div class="l-cont">
        <ul class="c-boxlist c-boxlist1  c-boxlist1--style2">
            <li class="c-boxlist1__item">
                <a href="">
                    <div class="c-boxlist__head"><span>1液形（塗料）</span></div>
                    <p class="c-boxlist__text">本文文頭24文字が入りますダミーですダミーですダ…</p>
                </a>
            </li>
            <li class="c-boxlist1__item">
                <a href="">
                    <div class="c-boxlist__head"><span>2液形（塗料）</span></div>
                    <p class="c-boxlist__text">本文文頭24文字が入りますダミーですダミーですダ…</p>
                </a>
            </li>
            <li class="c-boxlist1__item">
                <a href="">
                    <div class="c-boxlist__head"><span>（電気）亜鉛めっき</span></div>
                    <p class="c-boxlist__text">本文文頭24文字が入りますダミーですダミーですダ…</p>
                </a>
            </li>
            <li class="c-boxlist1__item">
                <a href="">
                    <div class="c-boxlist__head"><span>用語が入りますこの文章はダミーです予めご了承ください</span></div>
                    <p class="c-boxlist__text">本文文頭24文字が入りますダミーですダミーですダ…</p>
                </a>
            </li>
            <li class="c-boxlist1__item">
                <a href="">
                    <div class="c-boxlist__head"><span>用語が入りますこの文章はダミーです</span></div>
                    <p class="c-boxlist__text">本文文頭24文字が入りますダミーですダミーですダ…</p>
                </a>
            </li>
            <li class="c-boxlist1__item">
                <a href="">
                    <div class="c-boxlist__head"><span>用語が入りますこの文章はダミーです</span></div>
                    <p class="c-boxlist__text">本文文頭24文字が入りますダミーですダミーですダ…</p>
                </a>
            </li>
        </ul>
    </div>

    <div class="c-dev-title2">c-boxlist c-boxlist2</div>
    <div class="l-cont">
        <ul class="c-boxlist c-boxlist2">
            <li class="c-boxlist2__item"><a href="">
                    <div class="c-boxlist__head"><span>樹脂タイプ別の分類</span></div>
                    <p class="c-boxlist__text">説明が入りますこの文章はダミーです予めご了承ください。(30文字程度)</p>
                </a></li><!-- / c-boxlist2__item__item -->

            <li class="c-boxlist2__item"><a href="">
                    <div class="c-boxlist__head"><span>塗装工程別の分類</span></div>
                    <p class="c-boxlist__text">説明が入りますこの文章はダミーです予めご了承ください。(30文字程度)</p>
                </a></li><!-- / c-boxlist2__item__item -->

            <li class="c-boxlist2__item"><a href="">
                    <div class="c-boxlist__head"><span>希釈剤別の分類</span></div>
                    <p class="c-boxlist__text">説明が入りますこの文章はダミーです予めご了承ください。(30文字程度)</p>
                </a></li><!-- / c-boxlist2__item__item -->

            <li class="c-boxlist2__item"><a href="">
                    <div class="c-boxlist__head"><span>1液形・2液形による分類</span></div>
                    <p class="c-boxlist__text">説明が入りますこの文章はダミーです予めご了承ください。(30文字程度)</p>
                </a></li><!-- / c-boxlist2__item__item -->
        </ul><!-- / c-boxlist c-boxlist2 -->
    </div>

    <div class="c-dev-title2">c-boxlist c-boxlist3</div>
    <div class="l-cont">
        <ul class="c-boxlist c-boxlist3">
            <li class="c-boxlist3__item"><a href="">
                    <div class="c-boxlist__head"><span>樹脂タイプ別の分類</span></div>
                    <p class="c-boxlist__text">説明が入りますこの文章はダミーです予めご了承ください。(30文字程度)</p>
                </a></li><!-- / c-boxlist3__item__item -->

            <li class="c-boxlist3__item"><a href="">
                    <div class="c-boxlist__head"><span>塗装の道具と模様</span></div>
                    <p class="c-boxlist__text">説明が入りますこの文章はダミーです予めご了承ください。(30文字程度)</p>
                </a></li><!-- / c-boxlist3__item__item -->

            <li class="c-boxlist3__item"><a href="">
                    <div class="c-boxlist__head"><span>塗装失敗の原因</span></div>
                    <p class="c-boxlist__text">説明が入りますこの文章はダミーです予めご了承ください。(30文字程度)</p>
                </a></li><!-- / c-boxlist3__item__item -->

        </ul><!-- / c-boxlist c-boxlist3 -->
    </div>

    <div class="c-dev-title2">c-boxlist4</div>
    <div class="l-cont">
        <div class="c-boxlist4">
            <div class="c-boxlist4__item">
                <img src="/images/products/automotive/img1.jpg" alt="">
                <x-title2>
                    <x-slot name="title2_text">製品カタログ</x-slot>
                    <x-slot name="title2_class">c-title2--center c-title2--small</x-slot>
                </x-title2>
                <p class="c-text1">ベース、クリヤー、プラサフ、パテといったカテゴリーのnax主要製品カタログを閲覧、ダウンロードいただくことができます。</p>
                <a href="#" class="c-btn2">詳細を見る</a>
            </div>
            <div class="c-boxlist4__item">
                <img src="/images/products/automotive/img2.jpg" alt="">
                <x-title2>
                    <x-slot name="title2_text">naxウェブVIF</x-slot>
                    <x-slot name="title2_class">c-title2--center c-title2--small</x-slot>
                </x-title2>
                <p class="c-text1">ウェブVIFでは調色配合データを検索できる「配合情報」と車種・色番号・形式などからバンパー色やフッ素・耐スリ傷性向上クリヤーの有無を検索確認できる「くるま調べ」により、仕事に役立つ情報をタイムリーに入手できます。</p>
                <p class="c-text2 c-text2--comment">※ご利用いただくには、ユーザー登録が必要となります。当社塗料をお買い上げの販売店へお申し込み下さい。</p>
                <a href="#" class="c-btn2 c-btn2__style5">ログインする</a>
            </div>
            <div class="c-boxlist4__item">
                <img src="/images/products/automotive/img3.jpg" alt="">
                <x-title2>
                    <x-slot name="title2_text">nax自動車補修塗装<br>研修会</x-slot>
                    <x-slot name="title2_class">c-title2--center c-title2--small</x-slot>
                </x-title2>
                <p class="c-text1">日本ペイントでは現場にマッチした実践的な実技研修を開催しています。７種類のコースから目的に合ったものを受講していただけます。</p>
                <a href="#" class="c-btn2">詳細を見る</a>
            </div>
        </div>
    </div>

    <div class="c-dev-title2">c-boxlist5</div>
    <x-boxlist5></x-boxlist5>

    <div class="c-dev-title1">other</div>
    <div class="c-dev-title2">c-link</div>
    <div class="l-cont">
        <x-link>
            <x-slot name="link_text">アンカーリンク</x-slot>
        </x-link>
    </div>

    <div class="c-dev-title2">c-link c-link--red</div>
    <div class="l-cont">
        <x-link>
            <x-slot name="link_class">c-link--red</x-slot>
            <x-slot name="link_text">アンカーリンク</x-slot>
        </x-link>
    </div>

    <div class="c-dev-title2">c-link c-link--pdf</div>
    <div class="l-cont">
        <x-link>
            <x-slot name="link_class">c-link--pdf</x-slot>
            <x-slot name="link_text">pdfリンク</x-slot>
        </x-link>
    </div>

    <div class="c-dev-title2">c-link c-link--share</div>
    <div class="l-cont">
        <x-link>
            <x-slot name="link_class">c-link--share</x-slot>
            <x-slot name="link_text">別タブで開くアンカーリンク</x-slot>
        </x-link>
    </div>

    <div class="c-dev-title2">c-link c-link--shareRed</div>
    <div class="l-cont">
        <x-link>
            <x-slot name="link_class">c-link--shareRed</x-slot>
            <x-slot name="link_text">別タブで開くアンカーリンク</x-slot>
        </x-link>
    </div>

    <div class="c-dev-title2">c-initials</div>
    <div class="l-cont">
        <x-initials></x-initials>
    </div>

    <div class="c-dev-title2">c-initials c-initials--style2</div>
    <div class="l-cont">
        <x-initials2></x-initials2>
    </div>

    <div class="c-dev-title2">c-initials c-initials--style2--red</div>
    <div class="l-cont">
        <div class="c-initials c-initials--style2 c-initials--style2--red is-active">
            <div class="c-initials__btn sp-only js-c-initials__btn is-active"></div>
            <h3 class="c-initials__title">
                <span class="c-initials__title__jap">50音順で<br class="pc-only">絞り込む</span>
                <span class="c-initials__title__eng">Initials</span>
            </h3>
            <div class="c-initials__inner">
                <ul class="c-initials__block1">
                    <li class="c-initials__item is-active"><a>ア</a></li>
                    <li class="c-initials__item"><a>カ</a></li>
                    <li class="c-initials__item"><a>サ</a></li>
                    <li class="c-initials__item"><a>タ</a></li>
                    <li class="c-initials__item"><a>ナ</a></li>
                    <li class="c-initials__item"><a>ハ</a></li>
                    <li class="c-initials__item"><a>マ</a></li>
                    <li class="c-initials__item"><a>ヤ</a></li>
                    <li class="c-initials__item"><a>ラ</a></li>
                    <li class="c-initials__item"><a>ワ</a></li>
                </ul>
                <ul class="c-initials__block1">
                    <li class="c-initials__item"><a>0</a></li>
                    <li class="c-initials__item"><a>1</a></li>
                    <li class="c-initials__item"><a>2</a></li>
                    <li class="c-initials__item"><a>3</a></li>
                    <li class="c-initials__item"><a>4</a></li>
                    <li class="c-initials__item"><a>5</a></li>
                    <li class="c-initials__item"><a>6</a></li>
                    <li class="c-initials__item"><a>7</a></li>
                    <li class="c-initials__item"><a>8</a></li>
                    <li class="c-initials__item"><a>9</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="c-dev-title2">c-initials c-initials--style3</div>
    <div class="l-cont">
        <x-initials3></x-initials3>
    </div>

    <div class="c-dev-title2">c-initials c-initials--style4</div>
    <div class="l-cont">
        <x-initials4></x-initials4>
    </div>

    <div class="c-dev-title2">c-block1 select_list1</div>
    <div class="l-cont">
        <x-block1>
            <x-slot name="select_list">1</x-slot>
            <x-slot name="placeholder">製品名・仕様名・キーワードを入力してください</x-slot>
        </x-block1>
    </div>

    <div class="c-dev-title2">c-block1 select_list2</div>
    <div class="l-cont">
        <x-block1>
            <x-slot name="select_list">2</x-slot>
        </x-block1>
    </div>

    <div class="c-dev-title2">c-block1 c-block1--style1</div>
    <div class="l-cont">
        <div class="c-block1 c-block1--style1">
            <div class="c-block1__form">
                <div class="c-form1">
                    <h2 class="c-form1__text">
                        <span class="c-form1__text1">製品・仕様<br class="pc-only">を探す</span>
                        <span class="c-form1__text2">Search</span>
                    </h2><!-- / c-form1__text -->

                    <form class="c-form1__form">
                        <div class="c-form1__select">
                            <select>
                                <option value="0">すべて</option>
                                <option value="0">建築用塗料</option>
                                <option value="1" selected>重防食用塗料（製品）</option>
                                <option value="2">重防食用塗料（仕様）</option>
                                <option value="3">自動車補修用塗料</option>
                            </select>
                        </div>

                        <div class="c-form1__input">
                            <input type="text" placeholder="製品・仕様を探すプレースホルダーのテキスト">
                        </div>

                        <button class="c-form1__btn"></button>
                    </form><!-- / c-form1__form -->

                </div>
            </div>

            <div class="c-initials c-initials--style4 is-active">
                <div class="c-initials__btn sp-only js-c-initials__btn is-active"></div>
                <h3 class="c-initials__title">
                    <span class="c-initials__title__jap">製品を50音で探す</span>
                    <span class="c-initials__title__eng">Initials</span>
                </h3>
                <div class="c-initials__inner">
                    <ul class="c-initials__block1">
                        <li class="c-initials__item"><a>ア</a></li>
                        <li class="c-initials__item"><a>カ</a></li>
                        <li class="c-initials__item"><a>サ</a></li>
                        <li class="c-initials__item"><a>タ</a></li>
                        <li class="c-initials__item"><a>ナ</a></li>
                        <li class="c-initials__item"><a>ハ</a></li>
                        <li class="c-initials__item"><a>マ</a></li>
                        <li class="c-initials__item"><a>ヤ</a></li>
                        <li class="c-initials__item"><a>ラ</a></li>
                        <li class="c-initials__item"><a>ワ</a></li>

                        <li class="c-initials__item last"><a>0-9</a></li>
                    </ul>
                </div>

            </div><!-- / c-initials -->
        </div><!-- / c-block1 c-block1--style1 -->
    </div>

    <div class="c-dev-title2">c-block1 c-block1--style2</div>
    <div class="l-cont">
        <div class="c-block1 c-block1--style2">
            <div class="c-block1__form">
                <div class="c-form1 c-form1--style2">
                    <h2 class="c-form1__text">
                        <span class="c-form1__text1">用語検索</span>
                        <span class="c-form1__text2">Search</span>
                    </h2><!-- / c-form1__text -->

                    <form class="c-form1__form">
                        <div class="c-form1__input">
                            <input type="text" placeholder="キーワードを入力して下さい">
                        </div>

                        <button class="c-form1__btn"></button>
                    </form><!-- / c-form1__form -->
                </div>
            </div>
            <div class="c-initials c-initials--style2 is-active">
                <div class="c-initials__btn sp-only js-c-initials__btn is-active"></div>
                <h3 class="c-initials__title">
                    <span class="c-initials__title__jap">50音順で<br class="pc-only">絞り込む</span>
                    <span class="c-initials__title__eng">Initials</span>
                </h3>
                <div class="c-initials__inner">
                    <ul class="c-initials__block1">
                        <li class="c-initials__item"><a>ア</a></li>
                        <li class="c-initials__item"><a>カ</a></li>
                        <li class="c-initials__item"><a>サ</a></li>
                        <li class="c-initials__item"><a>タ</a></li>
                        <li class="c-initials__item"><a>ナ</a></li>
                        <li class="c-initials__item"><a>ハ</a></li>
                        <li class="c-initials__item"><a>マ</a></li>
                        <li class="c-initials__item"><a>ヤ</a></li>
                        <li class="c-initials__item"><a>ラ</a></li>
                        <li class="c-initials__item"><a>ワ</a></li>
                    </ul>
                    <ul class="c-initials__block1">
                        <li class="c-initials__item"><a>0</a></li>
                        <li class="c-initials__item"><a>1</a></li>
                        <li class="c-initials__item"><a>2</a></li>
                        <li class="c-initials__item"><a>3</a></li>
                        <li class="c-initials__item"><a>4</a></li>
                        <li class="c-initials__item"><a>5</a></li>
                        <li class="c-initials__item"><a>6</a></li>
                        <li class="c-initials__item"><a>7</a></li>
                        <li class="c-initials__item"><a>8</a></li>
                        <li class="c-initials__item"><a>9</a></li>
                    </ul>
                </div>
            </div><!-- / c-initials -->
            <div class="c-list14">
                <p class="c-list14__heading">
                    <span class="c-list14__main">タグで<br class="pc-only">絞り込む</span>
                    <span class="c-list14__sub">Tag</span>
                </p>
                <ul class="c-list14__box">
                    <li class="c-list14__item">
                        <a href="#" class="c-list14__txt">タグ名が入ります</a>
                    </li>
                    <li class="c-list14__item">
                        <a href="#" class="c-list14__txt">タグ名が入ります</a>
                    </li>
                    <li class="c-list14__item">
                        <a href="#" class="c-list14__txt">タグ名が入ります</a>
                    </li>
                    <li class="c-list14__item">
                        <a href="#" class="c-list14__txt">タグ名が入ります</a>
                    </li>
                    <li class="c-list14__item">
                        <a href="#" class="c-list14__txt">タグ名が入ります</a>
                    </li>
                    <li class="c-list14__item">
                        <a href="#" class="c-list14__txt">タグ名が入ります</a>
                    </li>
                    <li class="c-list14__item">
                        <a href="#" class="c-list14__txt">タグ名が入ります</a>
                    </li>
                    <li class="c-list14__item">
                        <a href="#" class="c-list14__txt">タグ名が入ります</a>
                    </li>
                    <li class="c-list14__item">
                        <a href="#" class="c-list14__txt">タグ名が入ります</a>
                    </li>
                    <li class="c-list14__item">
                        <a href="#" class="c-list14__txt">タグ名が入ります</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="c-dev-title2">c-block2</div>
    <div class="l-cont">
        <x-block2></x-block2>
    </div>

    <div class="c-dev-title2">c-block2 c-block2__style1</div>
    <div class="l-cont">
        <div class="c-block2 c-block2__style1">
            <div class="c-block2__header">
                <p class="c-block2__header__text">“{検索KW},{検索KW},{検索KW}”の検索結果は{X}件です。</p>
                <div class="c-block2__header__right">
                    <p class="c-block2__header__label">表示件数</p>
                    <div class="c-block2__header__select">
                        <select name="" id="">
                            <option value="10">10件</option>
                            <option value="20">20件</option>
                            <option value="30">30件</option>
                            <option value="50">50件</option>
                        </select>
                    </div>
                </div>
            </div><!-- / c-block2__header -->

            <div class="c-block2__body">
                <div class="c-block2__top">
                    <div class="c-block2__top__content">
                        <h3 class="c-block2__top__title">
                            <span class="c-block2__top__tag">建築用塗料</span>
                            <span class="c-block2__top__tag">製品情報</span>
                            <a class="c-block2__top__titletext" data-kw="製品名が入ります"><span>製品名が入りますこの文章はダミーです予めご了承ください</span></a>
                        </h3>
                        <p class="c-block2__top__text" data-kw="製品ディスクリプション">製品ディスクリプションが入りますこの文章はダミーです。予めご了承下さい。製品ディスクリプションが入りますこの文章はダミーです。予めご了承下さい。製品ディスクリプションが入ります。</p>
                        <div class="c-block2__grtag">
                            <div class="c-block2__grtag__title">規格：</div>
                            <ul class="c-block2__grlabel">
                                <li class="c-block2__grlabel__label" data-kw="規格名が入ります">規格名が入りますこの文章はダミーです</li>
                                <li class="c-block2__grlabel__label">規格名が入ります</li>
                            </ul>
                        </div>
                    </div>
                    <div class="c-block2__top__img">
                        <img src="./images/common/noimg.jpg" alt="製品の詳細を見る">
                    </div>
                </div><!-- / c-block2__top -->

            </div><!-- / c-block2__body -->

        </div><!-- / c-block2 c-block2__style1 -->

    </div>

    <div class="c-dev-title2">c-block2 c-block2--full</div>
    <div class="l-cont">
        <div class="c-block2 c-block2--full">
            <div class="c-block2__body">
                <div class="c-block2__top">
                    <div class="c-block2__top__content">
                        <h3 class="c-block2__top__title">
                            <span class="c-block2__top__tag">塗料系統が入ります</span>
                            <span class="c-block2__top__tag">塗料系統が入ります</span>
                            <span class="c-block2__top__tag">塗料系統が入ります</span>
                            <span class="c-block2__top__text2">{コンクリート塗装}規格番号：{XXXXX-X}</span>
                            <a href="#" class="c-block2__top__titletext" data-kw="製品名が入りますこの文"><span>製品名が入りますこの文章はダミーです予めご了承ください</span></a>
                            <span class="c-block2__top__titlesub">{一般名称が入りますこの文章はダミーです予めご了承ください。ダミーで}</span>
                        </h3>
                        <p class="c-block2__top__text" data-kw="製品ディスクリプション">製品ディスクリプションが入りますこの文章はダミーです。予めご了承下さい。製品ディスクリプションが入りますこの文章はダミーです。予めご了承下さい。製品ディスクリプションが入ります。</p>
                    </div>
                </div><!-- / c-block2__top -->

                <div class="c-block2__bottom">
                    <h4 class="c-block2__bottom__title">製品使用説明書、製品カタログ</h4>
                    <ul class="c-block2__bottom__list">
                        <li class="c-block2__bottom__item">
                            <a href="#" target="_blank">製品使用説明書</a>
                        </li>
                    </ul>
                </div><!-- / c-block2__bottom -->
            </div><!-- / c-block2__body -->
        </div>
    </div>

    <div class="c-dev-title2">c-block3</div>
    <x-block3></x-block3>

    <div class="c-dev-title2">c-block4</div>
    <div class="l-cont2">
        <x-block4></x-block4>
    </div>

    <div class="c-dev-title2">c-mainimg</div>
    <x-mainimg>
        <x-slot name="title_jap">建築用塗料</x-slot>
        <x-slot name="title_eng">Paint For Construction</x-slot>
        <x-slot name="text">リード文が入りますこの文章はダミーです。予めご了承ください。リード文が入りますこの文章はダミーです。予めご了承ください。リード文が入りますこの文章はダミーです。予めご了承ください。（100文字程度）</x-slot>
    </x-mainimg>

    <div class="c-dev-title2">c-mainimg c-mainimg--small</div>
    <x-mainimg>
        <x-slot name="title_jap">トピックス</x-slot>
        <x-slot name="title_eng">News</x-slot>
        <x-slot name="mainimg_class">c-mainimg--small</x-slot>
    </x-mainimg>

    <div class="c-dev-title2">c-mainimg c-mainimg--large</div>
    <section class="c-mainimg c-mainimg--large">
        <div class="l-cont">
            <h1 class="c-mainimg__title">
                <span class="c-mainimg__title__jap">みなさまへのお知らせ</span>
                <span class="c-mainimg__title__eng">Information</span>
            </h1>
            <p class="c-mainimg__text">日本ペイント株式会社からの大切なお知らせです</p>
        </div>
    </section>

    <div class="c-dev-title2">c-mainimg2</div>
    <x-mainimg2>
        <x-slot name="title_jap1">公共建築工事標準仕様書<br class="sp-only">ダウンロード</x-slot>
        <x-slot name="title_jap2">／ 建築用塗料</x-slot>
        <x-slot name="text">公共建築工事標準仕様書ダウンロードについて説明が入ります。この文章はダミーです。予めご了承下さい。公共建築工事標準仕様書ダウンロードについて説明が入ります。この文章はダミーです。予めご了承下さい。公共建築工事標準仕様書ダウンロードについて説明が入ります。この文章はダミーです。予めご了承下</x-slot>
    </x-mainimg2>

    <div class="c-dev-title2">c-mainimg3</div>
    <x-mainimg3></x-mainimg3>

    <div class="c-dev-title2">c-mainimg4</div>
    <x-mainimg4>
        <x-slot name="mainimg4_src">/images/common/icon_mainimg4.svg</x-slot>
        <x-slot name="mainimg4_title">塗料の基礎知識</x-slot>
        <x-slot name="mainimg4_text">塗料・塗装に関する基礎知識をまとめています。塗料の機能や成分、分類別の特徴など塗料の基本を知り、塗装の工程や道具など塗料を使用するときに必要な知識を確認することができます。</x-slot>
    </x-mainimg4>

    <div class="c-dev-title2">c-mainimg5</div>
    <x-mainimg5>
        <x-slot name="title">建築用塗料</x-slot>
        <x-slot name="text">リード文が入りますこの文章はダミーです。予めご了承ください。リード文が入りますこの文章はダミーです。予めご了承ください。リード文が入りますこの文章はダミーです。予めご了承ください。（100文字程度）</x-slot>
    </x-mainimg5>

    <div class="c-dev-title2">c-mainimg7</div>
    <x-mainimg7></x-mainimg7>

    <div class="c-dev-title2">c-cvimg1</div>
    <div class="l-cont">
        <div class="c-cvimg1">
            <x-title2>
                <x-slot name="title2_text">naxE-CUBE WB <br class="sp-only">水性システム</x-slot>
                <x-slot name="title2_class">c-title2--center c-title2--small c-title2--white</x-slot>
            </x-title2>

            <p class="c-text1 c-text1--center c-text1--white">新型クリヤー、プラサフの完成により、さらなる進化を遂げた「nax E-CUBE WB 水性システム」。<br class="pc-only">
                塗料にとどまらず、作業の効率化や品質向上につながる周辺商品をトータルラインナップし、<br class="pc-only">
                これからの時代の自動車補修業界に貢献するシステムとしてご提案します。</p>

            <div class="u-center">
                <x-btn2>
                    <x-slot name="btn2_text">詳細を見る</x-slot>
                </x-btn2>
            </div>
        </div>
    </div>

    <div class="c-dev-title2">c-contact</div>
    <div class="l-cont2">
        <x-contact></x-contact>
    </div>

    <div class="c-dev-title2">c-contact2</div>
    <div class="l-cont2">
        <x-contact2></x-contact2>
    </div>

    <div class="c-dev-title2">c-map</div>
    <div class="l-cont">
        <x-map></x-map>
    </div>

    <div class="c-dev-title2">c-map c-map--col2</div>
    <div class="l-cont">
        <div class="c-map c-map--col2">
            <x-title2>
                <x-slot name="title2_text">支店</x-slot>
                <x-slot name="title2_class">c-title2--small</x-slot>
            </x-title2>
            <ul class="c-map__list">
                <li class="c-map__item">
                    <div class="c-map__info">
                        <x-title2>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                            <x-slot name="title2_text">北海道支店</x-slot>
                        </x-title2>
                        <p class="c-map__txt">〒061-1274<br>北海道北広島市大曲工業団地6-3-8</p>
                        <p class="c-map__phone">
                            <span>TEL <a href="tel:+011-370-3101">011-370-3101</a></span>
                            <span>FAX <a href="tel:+011-370-3122">011-370-3122</a></span>
                        </p>
                    </div>
                    <div class="c-map__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2919.909918485428!2d141.4738630157067!3d42.95910270505166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f74d596f94104c3%3A0x9e3eef770d4dd639!2z5pel5pys44CB44CSMDYxLTEyNzQg5YyX5rW36YGT5YyX5bqD5bO25biC5aSn5puy5bel5qWt5Zuj5Zyw77yW5LiB55uu77yT4oiS77yY!5e0!3m2!1sja!2s!4v1602051647701!5m2!1sja!2s"></iframe>
                    </div>
                </li>
                <li class="c-map__item">
                    <div class="c-map__info">
                        <x-title2>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                            <x-slot name="title2_text">東北支店</x-slot>
                        </x-title2>
                        <p class="c-map__txt">〒983-0034<br>宮城県仙台市宮城野区扇町5-10-8</p>
                        <p class="c-map__phone">
                            <span>TEL <a href="tel:+011-370-3101">011-370-3101</a></span>
                            <span>FAX <a href="tel:+011-370-3122">011-370-3122</a></span>
                        </p>
                    </div>
                    <div class="c-map__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3132.411846151434!2d140.95040681560297!3d38.26994489128791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f8988802cc4ffdb%3A0x663c505910bb1ae7!2z5pel5pys44CB44CSOTgzLTAwMzQg5a6u5Z-O55yM5LuZ5Y-w5biC5a6u5Z-O6YeO5Yy65omH55S677yV5LiB55uu77yR77yQ4oiS77yY!5e0!3m2!1sja!2s!4v1602051682028!5m2!1sja!2s"></iframe>
                    </div>
                </li>
                <li class="c-map__item">
                    <div class="c-map__info">
                        <x-title2>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                            <x-slot name="title2_text">関東支店</x-slot>
                        </x-title2>
                        <p class="c-map__txt">〒140-8677<br>東京都品川区南品川4-7-16</p>
                        <p class="c-map__phone">
                            <span>TEL <a href="tel:+03-5479-3614">03-5479-3614</a></span>
                            <span>FAX <a href="tel:+03-3472-5525">03-3472-5525</a></span>
                        </p>
                    </div>
                    <div class="c-map__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3243.534158451429!2d139.73542321554967!3d35.61455604123256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188a64053ccbd9%3A0x5eb76edae74dd2a7!2z5pel5pys44Oa44Kk44Oz44OIIOadseS6rOS6i-alreaJgA!5e0!3m2!1sja!2s!4v1602052728267!5m2!1sja!2s"></iframe>
                    </div>
                </li>
                <li class="c-map__item">
                    <div class="c-map__info">
                        <x-title2>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                            <x-slot name="title2_text">北関東信越支店</x-slot>
                        </x-title2>
                        <p class="c-map__txt">〒140-8677<br>東京都品川区南品川4-7-16</p>
                        <p class="c-map__phone">
                            <span>TEL <a href="tel:+03-5479-3614">03-5479-3614</a></span>
                            <span>FAX <a href="tel:+03-3472-5525">03-3472-5525</a></span>
                        </p>
                    </div>
                    <div class="c-map__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3243.534158451429!2d139.73542321554967!3d35.61455604123256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188a64053ccbd9%3A0x5eb76edae74dd2a7!2z5pel5pys44Oa44Kk44Oz44OIIOadseS6rOS6i-alreaJgA!5e0!3m2!1sja!2s!4v1602052819685!5m2!1sja!2s"></iframe>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="c-dev-title2">c-map c-map--col3</div>
    <div class="l-cont">
        <div class="c-map c-map--col3">
            <x-title2>
                <x-slot name="title2_text">営業所</x-slot>
                <x-slot name="title2_class">c-title2--small</x-slot>
            </x-title2>
            <ul class="c-map__list">
                <li class="c-map__item">
                    <div class="c-map__info">
                        <x-title2>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                            <x-slot name="title2_text">札幌営業所</x-slot>
                        </x-title2>
                        <p class="c-map__txt">〒061-1274<br>北海道北広島市大曲工業団地6-3-8</p>
                        <p class="c-map__phone">
                            <span>TEL <a href="tel:+011-370-3101">011-370-3101</a></span>
                            <span>FAX <a href="tel:+011-370-3122">011-370-3122</a></span>
                        </p>
                    </div>
                    <div class="c-map__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2919.909918485428!2d141.4738630157067!3d42.95910270505166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f74d596f94104c3%3A0x9e3eef770d4dd639!2z5pel5pys44CB44CSMDYxLTEyNzQg5YyX5rW36YGT5YyX5bqD5bO25biC5aSn5puy5bel5qWt5Zuj5Zyw77yW5LiB55uu77yT4oiS77yY!5e0!3m2!1sja!2s!4v1602054131186!5m2!1sja!2s"></iframe>
                    </div>
                </li>
                <li class="c-map__item">
                    <div class="c-map__info">
                        <x-title2>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                            <x-slot name="title2_text">仙台営業所</x-slot>
                        </x-title2>
                        <p class="c-map__txt">〒983-0034<br>宮城県仙台市宮城野区扇町5-10-8</p>
                        <p class="c-map__phone">
                            <span>TEL <a href="tel:+022-232-6711">022-232-6711</a></span>
                            <span>FAX <a href="tel:+022-232-6719">022-232-6719</a></span>
                        </p>
                    </div>
                    <div class="c-map__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3132.411846151434!2d140.95040681560297!3d38.26994489128791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f8988802cc4ffdb%3A0x663c505910bb1ae7!2z5pel5pys44CB44CSOTgzLTAwMzQg5a6u5Z-O55yM5LuZ5Y-w5biC5a6u5Z-O6YeO5Yy65omH55S677yV5LiB55uu77yR77yQ4oiS77yY!5e0!3m2!1sja!2s!4v1602054219830!5m2!1sja!2s"></iframe>
                    </div>
                </li>
                <li class="c-map__item">
                    <div class="c-map__info">
                        <x-title2>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                            <x-slot name="title2_text">福島営業所</x-slot>
                        </x-title2>
                        <p class="c-map__txt">〒963-8875<br>福島県郡山市池ノ台20-1 金田第5ビル エクシード館203</p>
                        <p class="c-map__phone">
                            <span>TEL <a href="tel:+024-935-1530">024-935-1530</a></span>
                            <span>FAX <a href="tel:+024-932-8835">024-932-8835</a></span>
                        </p>
                    </div>
                    <div class="c-map__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3169.8491939358096!2d140.36708621558478!3d37.39339854178169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60206c9873e8c6b1%3A0xf3389409f3cfcc5f!2z5pel5pys44CB44CSOTYzLTg4NzUg56aP5bO255yM6YOh5bGx5biC5rGg44OO5Y-w77yS77yQ4oiS77yRIOmHkeeUsOesrDXjg5Pjg6vjgqjjgq_jgrfjg7zjg4nppKg!5e0!3m2!1sja!2s!4v1602054297172!5m2!1sja!2s"></iframe>
                    </div>
                </li>
                <li class="c-map__item">
                    <div class="c-map__info">
                        <x-title2>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                            <x-slot name="title2_text">盛岡営業所</x-slot>
                        </x-title2>
                        <p class="c-map__txt">〒020-0874<br>岩手県盛岡市南大通3-9-46 央翔ビル 3ＦＡ</p>
                        <p class="c-map__phone">
                            <span>TEL <a href="tel:+050-3033-8806">050-3033-8806</a></span>
                            <span>FAX <a href="tel:+019-653-5255">019-653-5255</a></span>
                        </p>
                    </div>
                    <div class="c-map__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3070.069152284506!2d141.15072451563327!3d39.693149107249695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f859d8125b547b5%3A0x471fd54c764c5b88!2z5pel5pys44CB44CSMDIwLTA4NzQg5bKp5omL55yM55ub5bKh5biC5Y2X5aSn6YCa77yT5LiB55uu77yZ4oiS77yU77yWIOWkrue_lOODk-ODqyAz77ym77yh!5e0!3m2!1sja!2s!4v1602054479387!5m2!1sja!2s"></iframe>
                    </div>
                </li>
                <li class="c-map__item">
                    <div class="c-map__info">
                        <x-title2>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                            <x-slot name="title2_text">埼玉営業所</x-slot>
                        </x-title2>
                        <p class="c-map__txt">〒349-0204<br>埼玉県白岡市篠津字立野887-6</p>
                        <p class="c-map__phone">
                            <span>TEL <a href="tel:+0480-92-4390">0480-92-4390</a></span>
                            <span>FAX <a href="tel:+0480-92-4447">0480-92-4447</a></span>
                        </p>
                    </div>
                    <div class="c-map__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d959.2393081784008!2d139.64625522273295!3d36.032902222846985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018c9f2b8b8c897%3A0x886634eed2355650!2z5pel5pys44Oa44Kk44Oz44OI5qCq5byP5Lya56S-!5e0!3m2!1sja!2s!4v1602054710060!5m2!1sja!2s"></iframe>
                    </div>
                </li>
                <li class="c-map__item">
                    <div class="c-map__info">
                        <x-title2>
                            <x-slot name="title2_class">c-title2__style3</x-slot>
                            <x-slot name="title2_text">千葉営業所</x-slot>
                        </x-title2>
                        <p class="c-map__txt">〒260-0044<br>千葉県千葉市中央区松波2-13-21 オフィス・松波2F</p>
                        <p class="c-map__phone">
                            <span>TEL <a href="tel:+ 043-290-6601">043-290-6601</a></span>
                            <span>FAX <a href="tel:+043-290-6602">043-290-6602</a></span>
                        </p>
                    </div>
                    <div class="c-map__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3243.3057404800675!2d140.1053703155497!3d35.62018854092423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6022849899df4c41%3A0x3a6f948f99b123a!2z5pel5pys44CB44CSMjYwLTAwNDQg5Y2D6JGJ55yM5Y2D6JGJ5biC5Lit5aSu5Yy65p2-5rOi77yS5LiB55uu77yR77yT4oiS77yS77yQIOOCquODleOCo-OCueadvuazoiAyRg!5e0!3m2!1sja!2s!4v1602054796939!5m2!1sja!2s"></iframe>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="c-dev-title2">c-blocklist</div>
    <x-blocklist></x-blocklist>

    <div class="c-dev-title1">img</div>
    <div class="c-dev-title2">c-singleImg</div>
    <div class="l-cont">
        <div class="c-singleImg">
            <img src="/images/products/large/img_02.jpg" alt="">
        </div>
    </div>

    <div class="c-dev-title2">c-imgtext</div>
    <div class="l-cont">
        <div class="c-imgtext">
            <h3 class="c-imgtext__text">自動車に対する塗装</h3>
            <div class="c-imgtext__img">
                <img src="/images/common/c-imgtext.jpg" alt="自動車に対する塗装">
            </div>
        </div><!-- / c-imgtext -->
    </div>

    <div class="c-dev-title2">c-imgtext2</div>
    <div class="l-cont">
        <div class="c-imgtext2">
            <h2 class="c-title2 c-title2--small">色見本帳セットに<br class="sp-only">ついて</h2>
            <figure class="c-imgtext2__img">
                <img src="/images/products/large/img_01.jpg" alt="">
            </figure>
            <div class="c-imgtext2__info">
                <p class="c-imgtext2__txt">本見本帳セットには当社の最新の製品やこれまで長年にわたってご愛顧頂いている製品の見本帳とカタログが同梱されています。すっきりとしたデザインで、カラーチップは大きく見やすくなっておりますので、色相をご検討の際にご利用ください。</p>
                <a href="#" class="c-btn2 c-btn2__style3 c-btn2__tag">色見本帳を申し込む</a>
            </div>
        </div>
    </div>

    <div class="l-cont">
        <div class="c-imgtext2 c-imgtext2__style1">
            <div class="c-imgtext2__content">
                <h2 class="c-title2 c-title2--small">ペイントかわら版<br class="sp-only">お申し込み</h2>
                <p class="c-imgtext2__txt">「ペイントかわら版」は塗装の知識や工事のヒント、業界の市場動向など、プロの仕事にすぐに役立つ情報盛りだくさんでご好評いただいています。また、本誌はお役立ち情報などの一方向の情報発信だけでなく、読者の方々からの貴重なご意見や現場リポートなどを通じ、みなさまの声を業界に向けて再発信できるような双方向情報誌としての紙面づくりを心がけています。</p>
                <a href="#" class="c-btn2 c-btn2__style3 c-btn2__tag">詳細を見る</a>
            </div>

            <figure class="c-imgtext2__img">
                <img src="/images/common/imgtext2_img2.jpg" alt="ペイントかわら版お申し込み">
                <p class="c-imgtext2__imgtext">ダミー</p>
            </figure>
        </div>
    </div>

    <div class="c-dev-title2">c-imgtext3</div>
    <div class="l-cont">
        <div class="c-imgtext3">
            <div class="c-imgtext3__img">
                <img src="/images/common/c-imgtext.jpg" alt="自動車に対する塗装">
            </div>
            <h3 class="c-imgtext3__text">自動車に対する塗装</h3>
        </div><!-- / c-imgtext3 -->
    </div>

    <div class="c-dev-title2">c-imgtext4</div>
    <div class="l-cont">
        <ul class="c-imgtext4">
            <li>
                <img src="/images/products/large/results_img01.jpg" alt="平成18年1月" />
                <p class="c-imgtext4__txt">平成18年1月</p>
            </li>
            <li>
                <img src="/images/products/large/results_img02.jpg" alt="平成18年2月" />
                <p class="c-imgtext4__txt">平成18年2月</p>
            </li>
            <li>
                <img src="/images/products/large/results_img03.jpg" alt="平成19年10月" />
                <p class="c-imgtext4__txt">平成19年10月</p>
            </li>
            <li>
                <img src="/images/products/large/results_img04.jpg" alt="平成21年3月" />
                <p class="c-imgtext4__txt">平成21年3月</p>
            </li>
        </ul><!-- / c-imgtext4 -->
    </div>

    <div class="c-dev-title2">c-img</div>
    <x-img></x-img>


    <div class="c-dev-title2">c-anchor</div>
    <div class="c-anchor">
        <div class="c-anchor__title">目次</div>
        <ul>
            <li class="c-anchor__item">
                <a href="">塗料は世の中のさまざまな物に使われている</a>
            </li>
            <li class="c-anchor__item">
                <a href="">塗料の3大機能</a>
                <ul class="c-anchor__grlink">
                    <li class="c-anchor__item">
                        <a href="">塗装対象物の保護</a>
                    </li>
                    <li class="c-anchor__item">
                        <a href="">塗装対象物への美観付与</a>
                    </li>
                    <li class="c-anchor__item">
                        <a href="">塗装対象物への特別な機能の付与</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="c-dev-title1">sidebar</div>
    <div class="c-dev-title2">c-side</div>
    <div class="l-cont">
        <x-side></x-side>
        <br>
        <br>
        <br>
        <div class="l-sidebar">
            <aside class="c-side">
                <div class="c-side__box">
                    <h4 class="c-side__title">塗料系統で探す</h4>
                    <ul class="c-side__list">
                        <li class="c-side__item">
                            <a href="">前処理塗料</a>
                        </li>
                        <li class="c-side__item">
                            <a href="">油性・フタル酸系一般さび止め塗料</a>
                        </li>
                        <li class="c-side__item">
                            <a href="">特殊さび止め塗料</a>
                        </li>
                        <li class="c-side__item">
                            <a href="">エポキシ系さび止め塗料</a>
                        </li>
                        <li class="c-side__item">
                            <a href="">フタル酸(アルキド)樹脂塗料(中・上塗り)</a>
                        </li>
                    </ul>
                    <div class="c-side__more">
                        <ul class="c-side__list">
                            <li class="c-side__item">
                                <a href="">鉄部用塗料</a>
                            </li>
                            <li class="c-side__item">
                                <a href="">床・路面用塗料</a>
                            </li>
                            <li class="c-side__item">
                                <a href="">屋上防水材</a>
                            </li>
                            <li class="c-side__item">
                                <a href="">シーリング材</a>
                            </li>
                            <li class="c-side__item">
                                <a href="">現場用添加剤</a>
                            </li>
                        </ul>
                        <div class="c-side__btn">
                            <span>もっと見る</span>
                        </div>
                    </div>
                </div>
                <div class="c-side__box">
                    <h4 class="c-side__title">製品規格から探す</h4>
                    <ul class="c-side__list">
                        <li class="c-side__item">
                            <a href="">日本道路協会（塩害対策指針）（昭和59年2月）</a>
                        </li>
                        <li class="c-side__item">
                            <a href="">日本道路協会（塩害対策指針）（昭和59年2月）</a>
                        </li>
                        <li class="c-side__item">
                            <a href="">NEXCO（東日本・中日本・西日本）高速道路㈱（令和1年7月）</a>
                        </li>
                        <li class="c-side__item">
                            <a href="">首都高速道路㈱（剥落）（平成26年8月）</a>
                        </li>
                        <li class="c-side__item">
                            <a href="">首都高速道路㈱（SDK）（平成29年8月）</a>
                        </li>
                    </ul>
                    <div class="c-side__more">
                        <ul class="c-side__list">
                            <li class="c-side__item">
                                <a href="">鉄部用塗料</a>
                            </li>
                            <li class="c-side__item">
                                <a href="">床・路面用塗料</a>
                            </li>
                            <li class="c-side__item">
                                <a href="">屋上防水材</a>
                            </li>
                            <li class="c-side__item">
                                <a href="">シーリング材</a>
                            </li>
                            <li class="c-side__item">
                                <a href="">現場用添加剤</a>
                            </li>
                        </ul>
                        <div class="c-side__btn">
                            <span>もっと見る</span>
                        </div>
                    </div>
                </div>

                <div class="c-banner">
                    <a href="#" class="c-banner__text"><span>耐火塗料の優れた特長</span></a>
                </div>
            </aside>
        </div>
    </div>

    <div class="c-dev-title2">c-side2</div>
    <div class="l-cont">
        <x-side2></x-side2>
    </div>

    <div class="c-dev-title2">c-side3</div>
    <div class="l-cont">
        <x-side3></x-side3>
    </div>

    <div class="c-dev-title2">c-banner</div>
    <div class="l-cont">
        <div class="l-sidebar">
            <aside class="c-side">
                <div class="c-banner">
                    <a href="#" class="c-banner__text"><span>耐火塗料の優れた特長</span></a>
                </div>
            </aside>
        </div>
    </div>

    <div class="c-dev-title1">navi</div>
    <div class="c-dev-title2">c-nav2</div>
    <x-pagenavi></x-pagenavi>

    <div class="c-dev-title2">c-nav3</div>
    <div class="l-cont2">
        <x-nav3></x-nav3>
    </div>

    <div class="c-dev-title2">c-nav3 c-nav3--col5</div>
    <div class="l-cont2">
        <ul class="c-nav3 c-nav3--col5">
            <li class="c-nav3__item is-active">
                <a href="#" class="c-nav3__txt">タフガードQ-R工法</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">概要・仕様</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">工程</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">施工実績</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">Beメッシュ工法</a>
            </li>
            <li class="c-nav3__item sp-only">
            </li>
        </ul>
    </div>

    <div class="c-dev-title2">c-nav3 c-nav3--col8</div>
    <div class="l-cont2">
        <ul class="c-nav3 c-nav3--col8">
            <li class="c-nav3__item is-active">
                <a href="#" class="c-nav3__txt">すべて</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">お知らせ</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">新製品</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">セミナー</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">イベント</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">CSR</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">キャンペーン</a>
            </li>
            <li class="c-nav3__item">
                <a href="#" class="c-nav3__txt">メンテナンス</a>
            </li>
        </ul><!-- / c-nav3 c-nav3--col8 -->
    </div>

    <div class="c-dev-title2">c-nav4</div>
    <div class="l-cont">
        <x-nav4></x-nav4>
    </div>

    <div class="c-dev-title2">c-nav5</div>
    <div class="l-cont">
        <x-nav5></x-nav5>
    </div>

    <div class="c-dev-title1">table</div>
    <div class="c-dev-title2">c-table</div>
    <div class="l-cont">
        <x-table></x-table>
    </div>

    <div class="c-dev-title2">c-table c-table--large</div>
    <div class="l-cont">
        <div class="c-table c-table--large">
            <div class="c-table__scroll sp-only">
                <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>{仕上げの種類}</th>
                        <th>5～10℃</th>
                        <th>23℃</th>
                        <th>30℃</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>指触乾燥</th>
                        <td>{40}分</td>
                        <td>{15}分</td>
                        <td>{10}分</td>
                    </tr>
                    <tr>
                        <th>指触乾燥</th>
                        <td>{40}分</td>
                        <td>{15}分</td>
                        <td>{10}分</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="c-dev-title2">c-table c-table__style1</div>
    <div class="l-cont">
        <div class="c-table c-table__style1">
            <table>
                <tr>
                    <td>戸建住宅</td>
                    <td>マンション</td>
                    <td>教育施設/病院</td>
                </tr>
                <tr>
                    <td><img src="/images/products/building/icon_dbround.svg" alt="dbround"></td>
                    <td><img src="/images/products/building/icon_round.svg" alt="round"></td>
                    <td><img src="/images/products/building/icon_triangle.svg" alt="triangle"></td>
                </tr>
                <tr>
                    <td>オフィス/商業施設/ホテル</td>
                    <td>工場/倉庫</td>
                    <td>鋼構造物</td>
                </tr>
                <tr>
                    <td><img src="/images/products/building/icon_multiply.svg" alt="multiply"></td>
                    <td><img src="/images/products/building/icon_minus.svg" alt="minus"></td>
                    <td><img src="/images/products/building/icon_dbround.svg" alt="dbround"></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="c-dev-title2">c-table c-table__style1 c-table--large</div>
    <div class="l-cont">
        <div class="c-table c-table__style1 c-table--large">
            <div class="c-table__scroll sp-only">
                <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
            </div>
            <table>
                <thead>
                    <tr>
                        <th><span class="sp-only">外壁</span></th>
                        <th>外壁</th>
                        <th>内壁</th>
                        <th>床</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>戸建住宅</th>
                        <td><img src="/images/products/building/icon_dbround.svg" alt="dbround"></td>
                        <td><img src="/images/products/building/icon_triangle.svg" alt="triangle"></td>
                        <td><img src="/images/products/building/icon_multiply.svg" alt="multiply"></td>
                    </tr>
                    <tr>
                        <th>マンション</th>
                        <td><img src="/images/products/building/icon_dbround.svg" alt="dbround"></td>
                        <td><img src="/images/products/building/icon_triangle.svg" alt="triangle"></td>
                        <td><img src="/images/products/building/icon_multiply.svg" alt="multiply"></td>
                    </tr>
                    <tr>
                        <th>教育施設/病院</th>
                        <td><img src="/images/products/building/icon_round.svg" alt="round"></td>
                        <td><img src="/images/products/building/icon_round.svg" alt="round"></td>
                        <td><img src="/images/products/building/icon_multiply.svg" alt="multiply"></td>
                    </tr>
                    <tr>
                        <th>オフィス/商業施設/ホテル</th>
                        <td><img src="/images/products/building/icon_round.svg" alt="round"></td>
                        <td><img src="/images/products/building/icon_round.svg" alt="round"></td>
                        <td><img src="/images/products/building/icon_multiply.svg" alt="multiply"></td>
                    </tr>
                    <tr>
                        <th>工場/倉庫</th>
                        <td><img src="/images/products/building/icon_dbround.svg" alt="dbround"></td>
                        <td><img src="/images/products/building/icon_round.svg" alt="round"></td>
                        <td><img src="/images/products/building/icon_multiply.svg" alt="multiply"></td>
                    </tr>
                    <tr>
                        <th>鋼構造物</th>
                        <td><img src="/images/products/building/icon_triangle.svg" alt="triangle"></td>
                        <td><img src="/images/products/building/icon_minus.svg" alt="minus"></td>
                        <td><img src="/images/products/building/icon_multiply.svg" alt="multiply"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="c-dev-title2">c-table c-table__style2</div>
    <div class="l-cont">
        <div class="c-table c-table__style2">
            <table>
                <tr>
                    <th>樹脂</th>
                    <td>アクリル、ウレタン、シリコン、ラジカル制御形、フッ素、無機系、エポキシ、アルキド、フェノール、シラン系・セメント系・消石灰系、そのほか</td>
                </tr>
                <tr>
                    <th>水性/溶剤</th>
                    <td>水性系、弱溶剤系、強溶剤系</td>
                </tr>
                <tr>
                    <th>１液/２液</th>
                    <td>１液、２液、その他</td>
                </tr>
                <tr>
                    <th>荷姿</th>
                    <td>{xx}kg</td>
                </tr>
                <tr>
                    <th>荷姿</th>
                    <td>{xx}kgセット<br>塗料剤：{xx}kg<br>硬化剤：{xx}kg</td>
                </tr>
                <tr>
                    <th>素材</th>
                    <td>モルタル、コンクリート、石膏ボード、押出成形セメント板、サイディングボード、磁器タイル、ブロック、PC板、けい酸カルシウム板、スレート、ALC、GRC、硬質塩ビ、塩ビゾル鋼板、木部、鉄、ステンレス、溶融亜鉛めっき、クロメート処理亜鉛めっき、アルミ、アルミアルマイト、FRP</td>
                </tr>
                <tr>
                    <th>JIS</th>
                    <td>JIS A 6916、JIS A 6021、JIS A 6909、JIS K 5492、JIS K 5516、JIS K 5551、JIS K 5552、JIS K 5553、JIS K 5572、JIS K 5582、JIS K 5621、JIS K 5658、JIS K 5659、JIS K 5660、JIS K 5663、JIS K 5665、JIS K 5668、JIS K 5669、JIS K 5670、JIS K 5674、JIS K 5675、JIS K 5970</td>
                </tr>
                <tr>
                    <th>機能</th>
                    <td>TVOC　１％未満、防火認定、防藻、防かび、抗菌、抗ウイルス、ホルムアルデヒド吸着、低臭、汚染除去性、ヤニ止め、弾性、省工程、厚膜、アスベスト飛散、高耐候性、遮熱、省エネ、低汚染、手垢汚れ、皮脂軟化、透湿性、節電塗料</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="c-dev-title2">c-table c-table__style2 c-table__confirm</div>
    <div class="l-cont2">
        <div class="c-table c-table__style2 c-table__confirm">
            <table>
                <tr>
                    <th>お名前</th>
                    <td>山田 太郎</td>
                </tr>
                <tr>
                    <th>よみがな</th>
                    <td>やまだ たろう</td>
                </tr>
                <tr>
                    <th>会社名</th>
                    <td>日本ペイント株式会社</td>
                </tr>
                <tr>
                    <th>部署名</th>
                    <td>東京営業所</td>
                </tr>
                <tr>
                    <th>業種</th>
                    <td>ゼネコン・工務店</td>
                </tr>
                <tr>
                    <th>eメール</th>
                    <td>taro@nipponpaint.co.jp</td>
                </tr>
                <tr>
                    <th>郵便番号</th>
                    <td>012-3456</td>
                </tr>
                <tr>
                    <th>ご住所</th>
                    <td>大阪府<br class="sp-only"><span class="sp-only">大阪市北区大淀北2-1-2</span></td>
                </tr>
                <tr>
                    <th>お電話</th>
                    <td>012-3456-7890</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>カタログのご請求（1種類に付き1部となります）</td>
                </tr>
                <tr>
                    <th>具体的な内容</th>
                    <td>お問い合わせ内容が入ります。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
                    </td>
                </tr>
                <tr>
                    <th>塗料に関する情報をどのような方法で入手されますか？（複数回答可）</th>
                    <td>
                        <p class="c-table__txt"><span>01.</span>専門誌</p>
                        近代建築、この文章はダミーです予めご了承ください
                        <p class="c-table__txt"><span>02.</span>ホームページ</p>
                        アーキマップ, 建材ナビ, dbnet, 建設MIL, けんせつPLAZA,建設Navi, KISS, 建設工業調査会、この文章はダミーです予めご了承ください
                        <p class="c-table__txt"><span>02.</span>上記以外の方法</p>
                        ご記入なし
                    </td>
                </tr>
            </table>
            <div class="c-grbtn-confirm">
                <a href="/" class="c-btn-confirm">内容を変更する</a>
                <a href="/" class="c-btn-confirm c-btn-confirm__style1">送信する</a>
                <div class="c-btn-confirm__img">
                    <img src="/images/common/form_img.svg">
                </div>
            </div>
        </div>
    </div>

    <div class="c-dev-title2">c-table c-table__style3</div>
    <div class="l-cont">
        <div class="c-table c-table__style3">
            <table>
                <thead>
                    <tr>
                        <th>テキストが入ります</th>
                        <th>テキストが入ります</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>テキストが入ります</td>
                        <td><a href="" class="c-link">テキストが入ります</a></td>
                    </tr>
                    <tr>
                        <td>テキストが入ります<br class="pc-only">テキストが入ります</td>
                        <td>テキストが入りますテキストが入りますテキストが入りますテキストが入ります</td>
                    </tr>
                    <tr>
                        <td>テキストが入ります</td>
                        <td><a href="" class="c-link c-link--share">別タブで開くアンカーリンク</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="c-table c-table__style3">
            <table>
                <tbody>
                    <tr>
                        <th>テキストが入ります</th>
                        <td>テキストが入ります</td>
                    </tr>
                    <tr>
                        <th>テキストが入ります</th>
                        <td><a href="" class="c-link">テキストが入ります</a></td>
                    </tr>
                    <tr>
                        <th>テキストが入ります<br>テキストが入ります</th>
                        <td>テキストが入りますテキストが入りますテキストが入りますテキストが入ります</td>
                    </tr>
                    <tr>
                        <th>テキストが入ります</th>
                        <td><a href="" class="c-link c-link--share">別タブで開くアンカーリンク</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="c-table c-table__style3">
            <table>
                <thead>
                    <tr>
                        <th>テキストが入ります</th>
                        <th>テキストが入ります</th>
                        <th>テキストが入ります</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>テキストが入ります</th>
                        <td><a href="" class="c-link">テキストが入ります</a></td>
                        <td>テキストが入ります</td>
                    </tr>
                    <tr>
                        <th>テキストが入ります<br>テキストが入ります</th>
                        <td>テキストが入ります<br>テキストが入ります</td>
                        <td>テキストが入ります<br>テキストが入ります</td>
                    </tr>
                    <tr>
                        <th>テキストが入ります<br>テキストが入ります</th>
                        <td><a href="" class="c-link c-link--share">別タブで開くアンカーリンク</a></td>
                        <td>テキストが入ります<br>テキストが入ります</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="c-dev-title2">c-table c-table__style3 c-table--large</div>
    <div class="l-cont">
        <div class="c-table c-table__style3 c-table--large">
            <div class="c-table__scroll sp-only">
                <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>テキストが入ります</th>
                        <th>テキストが入ります</th>
                        <th>テキストが入ります</th>
                        <th>テキストが入ります</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>テキストが入ります</td>
                        <td><a href="" class="c-link">テキストが入ります</a></td>
                        <td>テキストが入ります</td>
                        <td>テキストが入ります</td>
                    </tr>
                    <tr>
                        <td>テキストが入りますテキストが入ります</td>
                        <td>テキストが入りますテキストが入ります</td>
                        <td>テキストが入りますテキストが入ります</td>
                        <td>テキストが入りますテキストが入ります</td>
                    </tr>
                    <tr>
                        <td>テキストが入りますテキストが入ります</td>
                        <td><a href="" class="c-link c-link--share">別タブで開くアンカーリンク</a></td>
                        <td>テキストが入りますテキストが入ります</td>
                        <td>テキストが入りますテキストが入ります</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="c-table c-table__style3 c-table--large">
            <div class="c-table__scroll sp-only">
                <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>テキストが入ります</th>
                        <th>テキストが入ります</th>
                        <th>テキストが入ります</th>
                        <th>テキストが入ります</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>テキストが入ります</th>
                        <td><a href="" class="c-link">テキストが入ります</a></td>
                        <td>テキストが入ります</td>
                        <td>テキストが入ります</td>
                    </tr>
                    <tr>
                        <th>テキストが入りますテキストが入ります</th>
                        <td>テキストが入りますテキストが入ります</td>
                        <td>テキストが入りますテキストが入ります</td>
                        <td>テキストが入りますテキストが入ります</td>
                    </tr>
                    <tr>
                        <th>テキストが入りますテキストが入ります</th>
                        <td><a href="" class="c-link c-link--share">別タブで開くアンカーリンク</a></td>
                        <td>テキストが入りますテキストが入ります</td>
                        <td>テキストが入りますテキストが入ります</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="c-dev-title2">c-table__signal</div>
    <div class="c-table__signal">
        <p class="c-table__signal__item dbround">最適</p>
        <p class="c-table__signal__item round">適</p>
        <p class="c-table__signal__item triangle">可</p>
        <p class="c-table__signal__item multiply">不可</p>
    </div>

    <div class="c-dev-title2">c-table2</div>
    <div class="l-cont">
        <x-table2></x-table2>
    </div>

    <div class="c-dev-title2">c-table4 c-table--large</div>
    <div class="l-cont">
        <x-table4></x-table4>
    </div>

    <div class="c-dev-title2">c-table4 c-table4--style1 c-table--large</div>
    <div class="l-cont">
        <div class="c-table4 c-table4--style1 c-table--large">
            <div class="c-table__scroll sp-only">
                <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
            </div>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">塗装方法</th>
                        <th>1コート<br>希釈率（％）</th>
                        <th>1コート<br>使用量（kg/㎡/回）</th>
                        <th>2コート<br>希釈率（％）</th>
                        <th>2コート<br>使用量（kg/㎡/回）</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>{塗装方法が入ります}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>{塗装方法が入ります}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>{塗装方法が入ります}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>{塗装方法が入ります}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td>{塗装方法が入ります}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                        <td>{xx}〜{xx}</td>
                    </tr>
                </tbody>
            </table>
        </div><!-- / c-table4 c-table4--style1 -->
    </div>

    <div class="c-dev-title2">c-table4 c-table4--style2 c-table--large</div>
    <div class="l-cont">
        <div class="c-table4 c-table4--style2 c-table--large">
            <div class="c-table__scroll sp-only">
                <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
            </div>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">研修コース</th>
                        <th>対象者</th>
                        <th>内容詳細</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>塗装基礎</td>
                        <td>未経験者の方の体験コース</td>
                        <td>下地工程と上塗りブロック塗装を中心に、自動車補修塗装を学ぶコース</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>塗装専科初級</td>
                        <td>初めて塗装を経験される方、またそれに準ずる初級者</td>
                        <td>ソリッド色・メタリック色のブロック塗装・ぼかし塗装の作業を通して塗装の基礎を学ぶコース</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>塗装専科上級</td>
                        <td>2年以上の塗装経験者</td>
                        <td>2コート色・3コート色のブロック・ぼかし塗装作業を通して高度な塗装技術を学ぶコース</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>調色専科初級</td>
                        <td>初めて調色を経験される方、またそれに準ずる初級者</td>
                        <td>ソリッド色・メタリック色の調色研修。調色の基礎を学ぶコース</td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td>調色専科上級</td>
                        <td>2年以上の調色経験者</td>
                        <td>2コート色・3コート色の調色作業。難易度の高い調色技術を学ぶコース</td>
                    </tr>
                    <tr>
                        <th>6</th>
                        <td>nax E3 WB 導入コース</td>
                        <td>水性塗料 nax E3 WB を導入予定の方</td>
                        <td>次世代水性 nax E3 WB の基礎知識と塗装作業の習得</td>
                    </tr>
                </tbody>
            </table>
        </div><!-- / c-table4 c-table4--style2 c-table--large -->
    </div>

    <div class="c-dev-title2">c-table5 c-table--large</div>
    <div class="l-cont">
        <x-table5></x-table5>
    </div>

    <div class="c-dev-title1">text</div>
    <div class="c-dev-title2">c-text1</div>
    <div class="l-cont">
        <p class="c-text1">説明が入りますこの文章はダミーです予めご了承ください。説明が入りますこの文章はダミーです予めご了承ください。説明が入りますこの文章はダミーです予めご了承ください。</p>
    </div>

    <div class="c-dev-title2">c-text2</div>
    <div class="l-cont">
        <p class="c-text2">説明が入りますこの文章はダミーです予めご了承ください。説明が入りますこの文章はダミーです予めご了承ください。説明が入りますこの文章はダミーです予めご了承ください。</p>
    </div>

    <div class="c-dev-title2">c-text2 c-text2--comment</div>
    <div class="l-cont">
        <p class="c-text2 c-text2--comment">※説明が入りますこの文章はダミーです予めご了承ください。<br>説明が入りますこの文章はダミーです予めご了承ください。</p>
    </div>

    <div class="c-dev-title2">c-text3</div>
    <div class="l-cont">
        <p class="c-text3">説明が入りますこの文章はダミーです予めご了承ください。説明が入りますこの文章はダミー<a href="#">です予めご了承ください</a>。説明が入りますこの文章はダミーです予めご了承ください。</p>
    </div>

    <div class="c-dev-title2">c-text3 c-text3--center</div>
    <div class="l-cont">
        <p class="c-text3 c-text3--center">説明が入りますこの文章はダミーです予めご了承ください。説明が入りますこの文章はダミーです予めご了承ください。説明が入りますこの文章はダミーです予めご了承ください。</p>
    </div>

    <div class="c-dev-title2">c-text3 c-text3--center c-text3--white</div>
    <div class="l-cont">
        <p class="c-text3 c-text3--center c-text3--white">塗料は「樹脂タイプ」「塗装工程」「希釈剤」「1液形・2液形」で分類することができます。<br>4つの分類について、塗料の種類や特徴を説明します。</p>
    </div>

    <div class="c-dev-title2">c-text4</div>
    <div class="l-cont2">
        <x-text4></x-text4>
    </div>
    <div class="c-dev-title1">box</div>
    <div class="c-dev-title2">c-box1</div>
    <div class="l-cont">
        <x-box1></x-box1>
    </div>

    <div class="c-dev-title2">c-box2</div>
    <div class="l-cont">
        <x-box2></x-box2>
    </div>

    <div class="c-dev-title2">c-box3</div>
    <div class="l-cont">
        <x-box3></x-box3>
    </div>

    <div class="c-dev-title2">c-box4</div>
    <div class="l-cont">
        <x-box4></x-box4>
    </div>

    <div class="c-dev-title2">c-box5</div>
    <div class="l-cont">
        <x-box5></x-box5>
    </div>

    <div class="c-dev-title2">c-box6</div>
    <div class="l-cont">
        <x-box6></x-box6>
    </div>

    <div class="c-dev-title2">c-boximg</div>
    <div class="c-boximg">
        <img src="/images/common/c-boximg3.jpg" alt="日本建材産業協会からの優良景観材料推奨品の認定書">
        <p class="c-boximg__text">日本建材産業協会からの優良景観材料推奨品の認定書</p>
    </div>

    <div class="c-dev-title2">c-boximg c-boximg--style1</div>
    <a href="/images/common/c-boximg1.jpg" data-lightbox="image-3" target="_blank" class="c-boximg c-boximg--style1">
        <img src="/images/common/c-boximg1.jpg" alt="「標準塗装仕様書」を拡大して見る">
        <p class="c-boximg__text">「標準塗装仕様書」を拡大して見る</p>
    </a>

    <div class="c-dev-title2">c-boxlink</div>
    <div class="l-cont">
        <x-boxlink></x-boxlink>
    </div>

    <div class="c-dev-title2">c-boxerror</div>
    <div class="l-cont">
        <div class="c-boxerror">
            2020年10月以降の研修は下記の通り開催させていただきます。ご参加の際は新型コロナウイルス感染防止対策にご協力をお願いいたします。尚、感染の状況によっては再度中止・延期の可能性もございます。詳細は事務局までご連絡いただきますようお願いいたします。
        </div>
    </div>

    <div class="c-dev-title1">slide</div>
    <div class="c-dev-title2">c-slide2</div>
    <div class="l-cont">
        <x-slide2></x-slide2>
    </div>
    <div class="c-dev-title2">c-date</div>
    <div class="l-cont2">
        <div class="c-date">
            <ul class="c-date1">
                <li>CSR</li>
                <li>HAPPY PAINT PROJECT</li>
            </ul>
            <p class="c-date2">2020.06.09</p>
        </div>
    </div>
    <div class="c-dev-title2">c-txtnews</div>
    <div class="l-cont2">
        <div class="c-txtnews">
            <p>
                本文が入りますこの文章はダミーです予めご了承ください。
                <br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。
            </p>
            <div class="c-txtnews__left">
                <figure><img src="/images/news/img1.jpg" /></figure>
                <p>本文が入りますこの文章はダミーです予めご了承ください。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。</p>
            </div>
            <p>
                本文が入りますこの文章はダミーです予めご了承ください。
                <br>本文が入ります<a href="#">アンカーリンク</a>が入ります。この文章はダミーです<a class="icon1" href="#">別タブで開くアンカーリンク</a>が入ります。
            </p>
            <div class="c-txtnews__right">
                <figure><img src="/images/news/img1.jpg" /></figure>
                <p>
                    <a href="#" class="icon2">pdfリンク</a>が入りますの文章はダミーです予めご了承ください。本文が入りますこの文章はダミーです予めご了承ください。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。
                    <br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。
                </p>
            </div>
            <p>
                本文が入りますこの文章はダミーです予めご了承ください。
                <br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。
            </p>
            <div class="c-txtnews__center">
                <figure>
                    <img src="/images/news/img1.jpg" />
                    <figcaption>画像キャプションが入ります。この文章はダミーです予めご了承下さい。この文章はダミーです予めご了承下さい。</figcaption>
                </figure>
                <figure>
                    <img src="/images/news/img2.jpg" />
                    <figcaption>画像キャプションが入ります。この文章はダミーです予めご了承下さい。この文章はダミーです予めご了承下さい。</figcaption>
                </figure>
            </div>
        </div>
    </div>
</main>

<x-footer />