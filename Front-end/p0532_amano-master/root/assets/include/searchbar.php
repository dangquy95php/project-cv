<aside class="c-aside">
    <div class="c-aside__content">
        <img class="c-aside__bnt" src="/assets/img/common/aside.svg" alt="テーマから探す" />
        <div class="c-aside__inner">
            <ul class="c-aside__nav">
                <?php
                if (function_exists('is_home')) {
                    $terms = get_terms('post_tag');
                    foreach ($terms as $term) {
                        echo "<li><a href='" . get_term_link($term, 'post_tag') . "'>" . $term->name . "</a></li>";
                    }
                } else {
                ?>
                    <li><a href="/tag/law/">法律</a></li>
                    <li><a href="/tag/joseikin/">助成金</a></li>
                    <li><a href="/tag/hatarakikata-kaikaku/">働き方改革</a></li>
                    <li><a href="/tag/make-efficient/">業務効率化</a></li>
                    <li><a href="/tag/kintai-kanri/">勤怠管理</a></li>
                    <li><a href="/tag/kyuyo/">給与計算</a></li>
                    <li><a href="/tag/nenmatsu-chousei/">年末調整</a></li>
                    <!-- <li><a href="/tag/roumu-kanri/">労務管理</a></li> -->
                    <li><a href="/tag/jinji-hyouka/">人事評価制度</a></li>
                    <li><a href="/tag/workflow/">申請・ワークフロー</a></li>
                    <li><a href="/tag/simulation/">診断</a></li>
                    <li><a href="/tag/contract/">契約書</a></li>
                    <li><a href="/tag/kyuugyou/">休業・休職</a></li>
                    <li><a href="/tag/rules/">就業規則</a></li>
                <?php } ?>
            </ul>
            <!-- <a href="seminar" class="c-aside__banner">
                <img src="/assets/img/common/banner1.jpg" alt="人事労務のお仕事に役立つセミナー開催中">
            </a>
            <a href="/product/top/#id01" class="c-aside__banner">
                <img src="/assets/img/common/banner2.png" alt="小～大規模向け勤怠管理システムを試してみませんか？ 訪問デモ受付中">
            </a> -->
            <ul class="c-aside__action">
                <li class="c-aside__btn btn1">
                    <a href="/seminar/">人事・労務の<br>改善セミナー</a>
                </li>
                <li class="c-aside__btn btn2">
                    <a href="/download/">お役立ち<br>コンテンツ<br>ダウンロード</a>
                </li>
                <li class="c-aside__btn btn3">
                    <a href="/product/">製品情報</a>
                </li>
            </ul>
        </div>
    </div>
</aside>