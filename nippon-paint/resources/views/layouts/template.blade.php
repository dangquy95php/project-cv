<!DOCTYPE html>
<html lang="ja" id="pagetop">
<head>
    @yield('head')
</head>
<body class="page-@yield('pageid')">
    <header class="l-header">
        <div class="l-header__wrap">
            <div class="l-header__left">
                <h1 class="l-header__logo">
                    <a href="/">
                        <img src="/img/common/icon/logo1.svg" alt="日本ペイント株式会社 Basic & New">
                    </a>
                </h1>
            </div>
            <div class="l-header__right">
                <div class="l-header1">
                    <ul class="l-header1__sns">
                        <li><a href="#"><img src="/img/common/icon/youtube.svg" alt=""></a></li>
                        <li><a href="#"><img src="/img/common/icon/facebook.svg" alt=""></a></li>
                    </ul>
                    <ul class="l-header1__nav">
                        <li><a href="#">日本ペイントホールディングス</a></li>
                        <li><a href="#">お問い合わせ</a></li>
                    </ul>
                </div>
                <div class="l-header2">
                    <ul class="l-header2__nav">
                        <li>
                            <p class="l-header2__ttl">製品情報</p>
                            <div class="c-nav1 is-current">
                                <div class="c-nav1__cont">
                                    <div class="c-nav1__left">
                                        <h2 class="c-nav1__ttl">製品情報</h2>
                                        <p class="c-nav1__txt">説明文が入りますこの文章はダミーです予めご了承ください。説明文が入りますこの文章はダミー（50文字程度）</p>
                                    </div>
                                    <div class="c-nav1__right">
                                        <h3 class="c-nav1__subTtl">製品を探す</h3>
                                        <div class="c-set_card1">
                                            <div class="c-card1">
                                                <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                                                <h4 class="c-card1__ttl">建築用塗料</h4>
                                            </div>
                                            <div class="c-card1">
                                                <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                                                <h4 class="c-card1__ttl">建築用塗料</h4>
                                            </div>
                                            <div class="c-card1">
                                                <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                                                <h4 class="c-card1__ttl">建築用塗料</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <p class="l-header2__ttl">ニッペラボ</p>
                            <div class="c-nav1">
                                <div class="c-nav1__cont">
                                    <div class="c-nav1__left"></div>
                                    <div class="c-nav1__right"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <p class="l-header2__ttl">お客様サポート</p>
                            <div class="c-nav1">
                                <div class="c-nav1__cont">
                                    <div class="c-nav1__left"></div>
                                    <div class="c-nav1__right"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <p class="l-header2__ttl">日本ペイントについて</p>
                            <div class="c-nav1">
                                <div class="c-nav1__cont">
                                    <div class="c-nav1__left"></div>
                                    <div class="c-nav1__right"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <p class="l-header2__ttl">採用情報</p>
                            <div class="c-nav1">
                                <div class="c-nav1__cont">
                                    <div class="c-nav1__left"></div>
                                    <div class="c-nav1__right"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="p-@yield('project')" >
        @yield('content')
    </div>
    <footer class="l-footer">
        <div class="l-footer1">
            <div class="l-footer1__row">
                <div class="l-footer1__sec">
                    <ul>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                    </ul>
                </div>
                <div class="l-footer1__sec">
                    <ul>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                    </ul>
                </div>
                <div class="l-footer1__sec">
                    <ul>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                        <li><a href="#">link</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="l-footer2">
            <div class="l-footer2__row">
                <div class="l-footer2__left">
                    <div class="l-footer2__logo">
                        <img src="/img/common/icon/logo2.svg" alt="日本ペイント株式会社">
                    </div>
                    <ul class="l-footer2__nav">
                        <li><a href="#">ご利用にあたって</a></li>
                        <li><a href="#">個人情報の取扱いについて</a></li>
                        <li><a href="#">サイトマップ</a></li>
                    </ul>
                    <ul class="l-footer2__sns">
                        <li><a href="#"><img src="/img/common/icon/youtube.svg" alt=""></a></li>
                        <li><a href="#"><img src="/img/common/icon/facebook.svg" alt=""></a></li>
                    </ul>
                </div>
                <div class="l-footer2__right">
                    <div class="l-footer2__copyright">
                        <small>Copyright © NIPPONPAINT Co., Ltd. All Rights Reserved.</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/js/front/function.js"></script>
</body>
</html>
