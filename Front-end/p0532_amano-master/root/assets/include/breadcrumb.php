<?php //////////////////////////////////////
// for wordpress
/////////////////////////////////////////// 
?>

<?php if (!is_home() && !isset($pageid)) { ?>

    <div class="c-breadcrumb c-breadcrumb--blue">
        <ul class="c-breadcrumb__inner">

            <?php //////////////////////////////////////
            // 1個目
            /////////////////////////////////////////// 
            ?>
            <?php if (
                is_singular('news-topics') || is_post_type_archive("news-topics") || is_tax("news-topics_cat") || is_post_type_archive("product_faq")
                || is_post_type_archive("product_case") || is_singular('product_case') || is_singular('product_solutions')
            ) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/product">アマノ製品情報TOP</a>
                </li>
            <?php else : ?>
                <li class="c-breadcrumb__item">
                    <a href="/">HR改善ナビ</a>
                </li>
            <?php endif; ?>

            <?php //////////////////////////////////////
            // download
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("download")) : ?>
                <li class="c-breadcrumb__item">
                    <span>お役立ちダウンロードコンテンツ</span>
                </li>
            <?php elseif (is_singular('download')) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/download">お役立ちダウンロードコンテンツ </a>
                </li>
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>

            <?php //////////////////////////////////////
            // news-topics
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("news-topics")) : ?>
                <li class="c-breadcrumb__item">
                    <span> ニュース</span>
                </li>
            <?php elseif (is_tax('news-topics_cat')) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/news-topics">ニュース</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span><?php wp_title(""); ?></span>
                </li>
            <?php elseif (is_singular('news-topics')) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/news-topics"> ニュース </a>
                </li>
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>

            <?php //////////////////////////////////////
            // seminar
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("seminar")) : ?>
                <li class="c-breadcrumb__item">
                    <span>セミナー</span>
                </li>
            <?php elseif (is_singular('seminar')) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/seminar"> セミナー </a>
                </li>
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>

            <?php //////////////////////////////////////
            // glossary
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("glossary")) : ?>
                <li class="c-breadcrumb__item">
                    <span>人事・労務の注目用語</span>
                </li>
            <?php elseif (is_singular('glossary')) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/glossary">人事・労務の注目用語</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>

            <?php //////////////////////////////////////
            // hr_news
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("hr_news")) : ?>
                <li class="c-breadcrumb__item">
                    <span>HRNews</span>
                </li>
            <?php elseif (is_singular('hr_news')) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/hr_news">HRNews</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>

            <?php //////////////////////////////////////
            // gyomu_kaizen
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("gyomu_kaizen")) : ?>
                <li class="c-breadcrumb__item">
                    <span>業務改善ガイド</span>
                </li>
            <?php elseif (is_singular('gyomu_kaizen')) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/gyomu_kaizen">業務改善ガイド</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>

            <?php //////////////////////////////////////
            // faq_column
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("faq_column")) : ?>
                <li class="c-breadcrumb__item">
                    <span>人事・労務なんでもQ＆A</span>
                </li>
            <?php elseif (is_singular('faq_column')) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/faq_column">人事・労務なんでもQ＆A</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>

            <?php //////////////////////////////////////
            // tool_guide
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("tool_guide")) : ?>
                <li class="c-breadcrumb__item">
                    <span>人事・労務のツールガイド </span>
                </li>
            <?php elseif (is_singular('tool_guide')) : ?>
                <!-- <li class="c-breadcrumb__item">
                    <a href="/tool_guide">人事・労務のツールガイド</a>
                </li> -->
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>

            <?php //////////////////////////////////////
            // product_faq
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("product_faq")) : ?>
                <li class="c-breadcrumb__item">
                    <span>よくあるご質問 </span>
                </li>
            <?php elseif (is_singular('product_faq')) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/product_faq">よくあるご質問</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>


            <?php //////////////////////////////////////
            // product_case
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("product_case")) : ?>
                <li class="c-breadcrumb__item">
                    <span>導入事例</span>
                </li>
            <?php elseif (is_singular('product_case')) : ?>
                <li class="c-breadcrumb__item">
                    <a href="/product_case">導入事例</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>

            <?php if (is_tag()) : ?>
                <li class="c-breadcrumb__item">
                    <span><?php wp_title(""); ?></span>
                </li>
            <?php endif; ?>

            <?php //////////////////////////////////////
            // product_solutions
            /////////////////////////////////////////// 
            ?>
            <?php if (is_post_type_archive("product_solutions")) : ?>
            <?php elseif (is_singular('product_solutions')) : ?>
                <li class="c-breadcrumb__item">
                    <span><?php the_title(); ?></span>
                </li>
            <?php endif; ?>



        </ul>
    </div>

<?php } ?>

<?php //////////////////////////////////////
// for php
/////////////////////////////////////////// 
?>



<?php if (isset($pageid)) { ?>



    <div class="c-breadcrumb">
        <ul class="c-breadcrumb__inner">

            <?php //////////////////////////////////////
            // 1個目
            /////////////////////////////////////////// 
            ?>
            <?php if ($pageclass == "product") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product">アマノ製品情報TOP</a>
                </li>
            <?php } else { ?>
                <li class="c-breadcrumb__item">
                    <a href="/">HR改善ナビ</a>
                </li>
            <?php } ?>

            <?php //////////////////////////////////////
            // 2個目以降
            /////////////////////////////////////////// 
            ?>
            <?php if ($pageid == "customerSupport") { ?>
                <li class="c-breadcrumb__item">
                    <span>サポート</span>
                </li>
            <?php } elseif ($pageid == "strengths") { ?>
                <li class="c-breadcrumb__item">
                    <span>アマノの強み</span>
                </li>
            <?php } elseif ($pageid == "product-top") { ?>
                <li class="c-breadcrumb__item">
                    <span>「勤怠管理・労務管理」製品ラインナップ</span>
                </li>
            <?php } elseif ($pageid == "clouza") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>CLOUZA</span>
                </li>
            <?php } elseif ($pageid == "cyberxeed") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>CYBER XEED</span>
                </li>
            <?php } elseif ($pageid == "handsfree") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>ハンズフリー入退場管理／在場管理システム</span>
                </li>
            <?php } elseif ($pageid == "ic_card_authentication") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>IDカード認証方式</span>
                </li>
            <?php } elseif ($pageid == "ic-card") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>ICカード</span>
                </li>
            <?php } elseif ($pageid == "biometrics") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>生体認識方式</span>
                </li>
            <?php } elseif ($pageid == "real-time-monitoring") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>リアルタイム監視方式</span>
                </li>
            <?php } elseif ($pageid == "system-timeclock") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>簡易認証</span>
                </li>
            <?php } elseif ($pageid == "timecard") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>タイムカード方式</span>
                </li>
            <?php } elseif ($pageid == "timepronx") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>TimePro-NX</span>
                </li>
            <?php } elseif ($pageid == "timeproVG") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>TimePro-VG</span>
                </li>
            <?php } elseif ($pageid == "timeproVGzeem") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>TimePro-VG Powered by ZeeM</span>
                </li>
            <?php } elseif ($pageid == "VGCloud") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>VG-Cloud</span>
                </li>
            <?php } elseif ($pageid == "beep") { ?>
                <li class="c-breadcrumb__item">
                    <a href="/product/top/">「勤怠管理・労務管理」製品ラインナップ</a>
                </li>
                <li class="c-breadcrumb__item">
                    <span>e-AMANO シフト作成支援サービス</span>
                </li>
            <?php } ?>

        </ul>
    </div>

<?php } ?>