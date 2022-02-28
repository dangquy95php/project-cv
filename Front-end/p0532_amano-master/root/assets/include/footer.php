<?php if($pageclass == "media" || $pageclass == "product") : ?>
<footer class="c-footer">
    <div class="l-container">
        <div class="c-footer1">
            <div class="c-footer1__nav">
                <ul class="c-footer1__nav__item">
                    <li><a href="/">お役立ち情報</a></li>
                    <li><a href="/hr_news">HR News</a></li>
                    <?php if ($userName == $userNameDisplayAll) { ?>
                    <li><a href="/tool_guide">人事・労務のツールガイド</a></li>
                    <?php } ?>
                    <li><a href="/gyomu_kaizen">業務改善ガイド</a></li>
                    <li><a href="/faq_column">人事・労務何でもQ＆A</a></li>
                    <li><a href="/glossary">人事・労務の用語集</a></li>
                    <li><a href="/seminar">セミナー・イベント</a></li>
                    <li><a href="/download">コンテンツダウンロード</a></li>
                </ul>
                <ul class="c-footer1__nav__item">
                    <li><a href="/product">製品情報</a></li>
                    <li><a href="/strengths/">アマノの強み</a></li>
                    <li><a href="/product/top/">製品を探す</a></li>
                    <?php if ($userName == $userNameDisplayAll) { ?>
                    <li><a href="#">ソリューション</a></li>
                    <?php } ?>
                    <li><a href="/product_case/">導入事例</a></li>
                    <li><a href="/product_faq">よくあるご質問</a></li>
                    <li><a href="/customer-support">サポート</a></li>
                    <li><a href="https://amano.inboundtools.com/1tisinquiry">お問い合わせ</a></li>
                    <li><a href="https://amano.inboundtools.com/1tisrequest">資料請求</a></li>
                    <li><a href="https://amano.inboundtools.com/1tisdemo">デモ依頼</a></li>
                </ul>
                <ul class="c-footer1__nav__item">
                    <li class="u-window"><a href="https://www.tis.amano.co.jp/atms/atms.html" target="_blank">保守契約者専用ページ</a></li>
                    <ul class="c-footer1__bannerList">
                        <li class="c-footer1__bannerItem">
                            <a href="https://shop.amano.co.jp/shop/" target="_blank">
                                <img src="/assets/img/common/banner_ft.png" alt="">
                            </a>
                        </li>
                        <li class="c-footer1__bannerItem">
                            <a href="https://www.facebook.com/amano.co.jp/" target="_blank">
                                <img src="/assets/img/common/fb_ft.png" alt="">
                            </a>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
        <div class="c-footer2">
            <div class="c-footer2__logo">
                <a href="/product/"><img src="/assets/img/common/logo2.svg" alt="AMANO 労務・人事担当者のソリューションサイト"></a>
                <a href="https://www.amano.co.jp/" target="_blank" class="c-footer2__bnt">アマノコーポレートサイト</a>
            </div>
            <div class="c-footer2__nav">
                <ul class="c-footer2__nav1">
                    <li><a href="https://www.amano.co.jp/privacy.html" target="_blank">個人情報保護方針</a></li>
                    <li><a href="https://www.amano.co.jp/corp/" target="_blank">会社概要</a></li>
                    <li><a href="https://www.amano.co.jp/guide.html" target="_blank">サイトご利用にあたって</a></li>
                </ul>
                <p class="c-footer2__copyright">© 2021 AMANO Corporation.</p>
            </div>
        </div>
    </div>
</footer>
<?php elseif($pageclass == "movie"): ?>
<footer class="c-footer">
    <div class="l-container">
        <div class="c-footer2">
            <div class="c-footer2__logo">
                <a href="/"><img src="/assets/img/common/logo2.svg" alt="AMANO 労務・人事担当者のソリューションサイト"></a>
                <a href="https://www.amano.co.jp/" target="_blank" class="c-footer2__bnt">アマノコーポレートサイト</a>
            </div>
            <div class="c-footer2__nav">
                <ul class="c-footer2__nav1">
                    <li><a href="https://www.amano.co.jp/privacy.html" target="_blank">個人情報保護方針</a></li>
                    <li><a href="https://www.amano.co.jp/corp/" target="_blank">会社概要</a></li>
                    <li><a href="https://www.amano.co.jp/guide.html" target="_blank">サイトご利用にあたって</a></li>
                </ul>
                <p class="c-footer2__copyright">© 2021 AMANO Corporation.</p>
            </div>
        </div>
    </div>
</footer>
<?php elseif($pageclass == "tayorou"): ?>
<footer class="c-footer3">
    <div class="c-footer3__inner1">
        <div class="l-container2">
            <div class="c-footer3__content">
                <a class="c-footer3__logo1" href="/"><img src="/assets/img/tayorou/common/logo2.svg" alt="タヨロウ"></a>
                <ul class="c-footer3__nav">
                    <li><a href="/gyomu_kaizen/">業務改善ガイド</a></li>
                    <li><a href="/hr_news/">HR News</a></li>
                    <li><a href="/faq_column/">人事・労務なんでもQ&A</a></li>
                    <li><a href="/download/">コンテンツダウンロード</a></li>
                    <li><a href="/seminar/">セミナー・イベント</a></li>
                    <li><a href="/glossary/">人事・労務の注目用語</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="c-footer3__inner2">
        <div class="l-container2">
            <div class="c-footer3__content1">
                <div class="c-footer3__box">
                    <a class="c-footer3__logo2" href="/">
                        <img class="pc-only" src="/assets/img/tayorou/common/logo-amano.svg" alt="AMANO 人事・労務担当者のソリューションサイト">
                        <img class="sp-only" src="/assets/img/tayorou/common/logo-amano_sp.svg" alt="AMANO 人事・労務担当者のソリューションサイト">
                    </a>
                    <div class="c-footer3__box2">
                        <a target="_blank" href="https://www.amano.co.jp/?_ga=2.268803442.2098217160.1633666240-37515927.1633666240" class="c-footer3__bnt"><span>アマノコーポレートサイト</span></a>
                        <a target="_blank" href="/product/" class="c-footer3__bnt"><span>アマノの製品情報</span></a>
                    </div>
                    <div class="c-footer3__search">
                        <form action="//www.amano.co.jp/search.html" method="GET" id="cse-search-box">
                            <input type="hidden" name="charset" value="UTF-8">
                            <input type="text" name="q" maxlength="255" class="srch-text" placeholder="キーワード検索">
                            <input type="submit">
                        </form>
                    </div>
                </div>
                <div class="c-footer3__box">
                    <div class="c-footer3__txt"><a href="/product/">製品情報</a></div>
                    <div class="c-footer3__nav1">
                        <ul>
                            <li><a href="/product/">製品情報</a></li>
                            <li><a href="/strengths/">アマノの強み</a></li>
                            <li><a href="/product/top/">製品を探す</a></li>
                            <li><a href="/product_solutions/manufacturing/">ソリューション</a></li>
                            <li><a href="/product_case/">導入事例</a></li>
                            <li class="sp-only"><a href="/product_faq/">よくあるご質問</a></li>
                        </ul>
                        <ul>
                            <li class="pc-only"><a href="/product_faq/">よくあるご質問</a></li>
                            <li><a href="/customer-support/">サポート</a></li>
                            <li><a href="https://amano.inboundtools.com/1tisinquiry">お問い合わせ</a></li>
                            <li><a href="https://amano.inboundtools.com/1tisrequest">資料請求</a></li>
                            <li><a href="https://amano.inboundtools.com/1tisdemo">デモ依頼</a></li>
                        </ul>
                    </div>
                </div>
                <div class="c-footer3__box">
                    <div class="c-footer3__txt"><a href="https://www.tis.amano.co.jp/atms/atms.html" target="_blank">保守契約者専用ページ</a></div>
                    <div class="c-footer3__nav1">
                        <ul>
                            <li><a href="https://www.tis.amano.co.jp/atms/atms.html">ATMSログイン</a></li>
                            <li><a href="https://www.tis.amano.co.jp/atms/sitemanual.html">ご利用にあたって</a></li>
                        </ul>
                    </div>
                </div>
                <div class="c-footer3__box">
                    <ul class="c-footer3__banner">
                        <li><a href="https://shop.amano.co.jp/shop/" target="_blank"><img src="/assets/img/common/banner_ft.png" alt=""></a></li>
                        <li><a href="https://www.facebook.com/amano.co.jp/" target="_blank"><img src="/assets/img/common/fb_ft.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="c-footer3__content2">
                <ul class="c-footer3__nav2">
                    <li><a href="https://www.amano.co.jp/privacy.html" target="_blank">個人情報保護方針</a></li>
                    <li><a href="https://www.amano.co.jp/corp/" target="_blank">会社概要</a></li>
                    <li><a href="https://www.amano.co.jp/guide.html" target="_blank">サイトご利用にあたって</a></li>
                </ul>
                <p class="c-footer3__copyright">Copyright© AMANO Corporation All right reserved.</p>
            </div>
        </div>
    </div>
    <div class="c-footer3__gotop"><img src="/assets/img/tayorou/common/top.svg" alt=""></div>
</footer>
<?php else: ?>
<footer class="c-footer gray">
    <div class="c-footer__copyright">Copyright© 2021 Amano Corporation. All Rights Reserved.</div>
</footer>
<?php endif; ?>

</div>
<script src="/assets/js/jquery.matchHeight-min.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="/assets/js/jquery.dotdotdot.js"></script>
<script src="/assets/js/functions.min.js?ver.20210510"></script>

<?php if (function_exists('is_home')) {
    wp_footer();
}
?>

<!-- Yahooo!ユニバーサルタグ -->
<script type="text/javascript">
(function() {
    var tagjs = document.createElement("script");
    var s = document.getElementsByTagName("script")[0];
    tagjs.async = true;
    tagjs.src = "//s.yjtag.jp/tag.js#site=jWofIw2";
    s.parentNode.insertBefore(tagjs, s);
}());
</script>
<noscript>
    <iframe src="//b.yjtag.jp/iframe?c=jWofIw2" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>
<!--  End Yahooo!ユニバーサルタグ -->

</body>

</html>