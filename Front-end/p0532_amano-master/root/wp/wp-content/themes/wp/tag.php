<?php $pageid = "tayorou-tag"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<?php
    $tag = get_queried_object();
    $arg = array(
        'tag'              => $tag->slug,
        'order'            => 'DESC',
        'posts_per_page'   => -1,
    );
    $args = array(
        'post_type' => 'hr_news',
    );
    $args = array_merge($args, $arg);
    $hr_news = new WP_Query($args);

    $args1 = array(
        'post_type'  => 'gyomu_kaizen',
    );
    $args = array_merge($args1, $arg);
    $gyomu_kaizen = new WP_Query($args);

    $args2 = array(
        'post_type'  => 'faq_column',
    );
    $args2 = array_merge($args2, $arg);

    $faq_column = new WP_Query($args2);

    $args3 = array(
        'post_type'  => 'glossary',
    );
    $args3 = array_merge($args3, $arg);

    $glossary = new WP_Query($args3);

    $args4 = array(
        'post_type'  => 'download',
    );
    $args4 = array_merge($args4, $arg);
    $download = new WP_Query($args4);
    ?>






<main class="p-tayorou-tag">
    <section class="c-breadcrumb2">
        <div class="l-container2">
            <ul class="c-breadcrumb2__inner">
                <li class="c-breadcrumb2__item"><a href="/">ホーム</a></li>
                <li class="c-breadcrumb2__item"><span><?php echo $tag->name ?></span></li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-tag__wrap">
        <div class="l-container2">
            <div class="l-layout1">
                <div class="l-layout1__left">
                    <div class="c-title23">
                        <div class="c-title23__inner">
                            <div class="c-title23__tit">
                                <h2 class="c-title23__tit__txt"><?php echo $tag->name ?></h2>
                            </div>
                        </div>
                    </div>
                    <?php if ($gyomu_kaizen->have_posts()) : ?>
                    <section class="p-tayorou-tag__box gyomu">
                        <div class="c-title28">
                            <h2 class="c-title28__ttl">
                                <span class="c-title28__ttlmain"><span class="c-title28__icon"><img src="/assets/img/tayorou/common/icon-guide2.svg" alt=""></span>業務改善ガイド</span>
                                <span class="c-title28__ttlsub">効率化・ノウハウから<br class="sp-only">法律や助成金まで！</span>
                            </h2>
                            <figure class="c-title28__img">
                                <img src="/assets/img/tayorou/common/illust-category01.svg" alt="">
                            </figure>
                        </div>
                        <ul class="c-list46">
                            <?php while ($gyomu_kaizen->have_posts()) : $gyomu_kaizen->the_post(); ?>
                            <li class="c-list46__item">
                                <div class="c-list46__img">
                                    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                                    <?php if($featured_img_url): ?>
                                    <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                                    <?php else : ?>
                                    <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    <p class="c-list46__time"><span class="day"><?php echo get_the_date('Y.m.d'); ?></span></p>
                                </div>
                                <div class="c-list46__info">
                                    <h3 class="c-list46__tit"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php $local_tags = get_the_terms($post->ID, 'post_tag'); ?>
                                    <?php if ($local_tags) : ?>
                                    <div class="c-tag9">
                                        <?php $i = false ; foreach ($local_tags as $tag) : ?>
                                        <?php if($i == false) { $i = true; } else { echo ","; } ?>
                                        <a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name; ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </section>
                    <?php endif; ?>


                    <?php if ($hr_news->have_posts()) : ?>
                    <section class="p-tayorou-tag__box hrnews">
                        <div class="c-title28 green">
                            <h2 class="c-title28__ttl">
                                <span class="c-title28__ttlmain"><span class="c-title28__icon"><img src="/assets/img/tayorou/common/icon-news2.svg" alt=""></span>HR News</span>
                                <span class="c-title28__ttlsub">人事・労務の最前線を<br class="sp-only">コラムでお届け</span>
                            </h2>
                            <figure class="c-title28__img">
                                <img src="/assets/img/tayorou/common/illust-category02.svg" alt="">
                            </figure>
                        </div>
                        <ul class="c-list46">
                            <?php while ($hr_news->have_posts()) : $hr_news->the_post(); ?>
                            <li class="c-list46__item color2">
                                <div class="c-list46__img">
                                    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                                    <?php if($featured_img_url): ?>
                                    <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                                    <?php else : ?>
                                    <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    <p class="c-list46__time"><span class="day"><?php echo get_the_date('Y.m.d'); ?></span></p>
                                </div>
                                <div class="c-list46__info">
                                    <h3 class="c-list46__tit"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php $local_tags = get_the_terms($post->ID, 'post_tag'); ?>
                                    <?php if ($local_tags) : ?>
                                    <div class="c-tag9">
                                        <?php $i = false ; foreach ($local_tags as $tag) : ?>
                                        <?php if($i == false) { $i = true; } else { echo ","; } ?>
                                        <a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name; ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </section>
                    <?php endif; ?>

                    <?php if ($faq_column->have_posts()) : ?>
                    <section class="p-tayorou-tag__box faq">
                        <div class="c-title28 blue">
                            <h2 class="c-title28__ttl">
                                <span class="c-title28__ttlmain"><span class="c-title28__icon"><img src="/assets/img/tayorou/common/icon-faq2.svg" alt="なんでもQ"></span>なんでもQ&A</span>
                                <span class="c-title28__ttlsub">様々なお悩みを抱えるご担当者様の声にお答えします</span>
                            </h2>
                            <figure class="c-title28__img">
                                <img src="/assets/img/tayorou/common/illust-category03.svg" alt="様々なお悩みを抱えるご担当者様の声にお答えします">
                            </figure>
                        </div>
                        <ul class="c-list46">
                            <?php while ($faq_column->have_posts()) : $faq_column->the_post(); ?>
                            <li class="c-list46__item color3">
                                <div class="c-list46__img">
                                    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                                    <?php if($featured_img_url): ?>
                                    <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                                    <?php else : ?>
                                    <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                    <p class="c-list46__time"><span class="day"><?php echo get_the_date('Y.m.d'); ?></span></p>
                                </div>
                                <div class="c-list46__info">
                                    <h3 class="c-list46__tit"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php $local_tags = get_the_terms($post->ID, 'post_tag'); ?>
                                    <?php if ($local_tags) : ?>
                                    <div class="c-tag9">
                                        <?php $i = false ; foreach ($local_tags as $tag) : ?>
                                        <?php if($i == false) { $i = true; } else { echo ","; } ?>
                                        <a href="<?php echo get_tag_link($tag); ?>"><?php echo $tag->name; ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </section>
                    <?php endif; ?>

                    <?php if ($glossary->have_posts()) : ?>
                    <section class="p-tayorou-tag__box terms">
                        <div class="c-box32">
                            <div class="c-title28 gray">
                                <h2 class="c-title28__ttl">
                                    <span class="c-title28__ttlmain"><span class="c-title28__icon"><img src="/assets/img/tayorou/common/icon-word.svg" alt=""></span>注目用語</span>
                                    <span class="c-title28__ttlsub">スムーズなお仕事のために知っておきたい注目ワード</span>
                                </h2>
                            </div>
                            <div class="c-box32__info">
                                <ul class="c-list50">
                                    <?php while ($glossary->have_posts()) : $glossary->the_post(); ?>
                                    <li class="c-list50__item">
                                        <a href="<?php the_permalink(); ?>" class="c-list50__txt"><?php the_title(); ?></a>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <?php endif; ?>

                    <?php if ($download->have_posts()) : ?>
                    <section class="p-tayorou-tag__box download">
                        <div class="c-title28 green2">
                            <h2 class="c-title28__ttl">
                                <span class="c-title28__ttlmain"><span class="c-title28__icon"><img src="/assets/img/tayorou/common/icon-download2.svg" alt=""></span>お役立ちコンテンツ<br class="sp-only">ダウンロード</span>
                            </h2>
                        </div>
                        <ul class="c-list43">
                            <?php while ($download->have_posts()) : $download->the_post(); ?>
                            <li class="c-list43__item">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="c-list43__inner">
                                        <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                                        <?php if($url): ?>
                                        <img class="c-list43__img" src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
                                        <?php else : ?>
                                        <img class="c-list43__img" src="/assets/img/tayorou/common/780x500.jpg" alt="<?php the_title(); ?>">
                                        <?php endif; ?>
                                        <h3 class="c-list43__tit"><?php the_title(); ?></h3>
                                        <div class="c-list43__txt"><?php the_content(); ?></div>
                                    </div>
                                    <div class="c-btn12 c-btn12--down">
                                        <p class="c-btn12__txt"><span>ダウンロード</span></p>
                                    </div>
                                </a>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </section>
                    <?php endif; ?>
                </div>

                <div class="l-layout1__right">
                    <div class="c-side01">
                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/tag.php'); ?>
                        <div class="c-side01__inner2">
                            <h3 class="c-title25">
                                <span class="c-title25__jp">ピックアップ記事</span>
                                <span class="c-title25__en">PICK UP</span>
                            </h3>
                            <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/pickup.php'); ?>
                            <div class="c-btn12 c-btn12--logo sp-only">
                                <a href="/" class="c-btn12__txt">
                                    <span>ホームへ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/side02.php'); ?>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>