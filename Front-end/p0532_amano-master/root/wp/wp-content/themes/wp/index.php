<?php $pageid = "tayorou-top"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<main class="p-tayorou-top">
    <section class="c-mv7">
        <div class="l-container2">
            <h1 class="c-mv7__tit">バックオフィスを応援する<br class="sp-only">「頼れる労務ONLINE」</h1>
            <figure class="c-mv7__img"><img src="/assets/img/tayorou/top/logo.svg" alt=""></figure>
            <div class="c-mv7__illust">
                <img src="/assets/img/tayorou/top/illust-business01.svg" alt="">
                <img src="/assets/img/tayorou/top/illust-business02.svg" alt="">
            </div>
        </div>
    </section>
    <section class="c-list39">
        <div class="l-container2">
            <div class="c-list39__content">
                <div class="c-list39__tit">注目のトピックス</div>
                <div class="c-list39__inner">
                    <div class="c-list39__category">
                        <?php
                         $terms = get_terms('post_tag');
                         foreach ($terms as $term) {
                             echo "<div><a href='" . get_term_link($term, 'post_tag') . "'>" . $term->name . "</a></div>";
                         }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-tayorou-top1">
        <div class="l-container2">
            <?php
            $args = array(
                'posts_per_page' => 1,
                'post_type' => 'news-topics',
                'post_status' => 'publish',
                'meta_query' => array(
                    'relation' => 'OR',
                    array(
                        'key' => 'display_on_top',
                        'value' => 'yes',
                        'compare' => 'LIKE'
                    )
                )
            );
            $query = new WP_Query( $args );
            ?>
            <?php if( $query->have_posts() ) : ?>
            <div class="c-news4">
                <div class="c-news4__tit">タヨロウからのお知らせ</div>
                <div class="c-news4__content">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <p class="c-news4__date"><?php echo get_the_date('Y.m.d'); ?></p>
                    <div class="c-news4__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            <div id="pickup" class="c-title21">
                <h2 class="c-title21__jp">ピックアップ記事</h2>
                <p class="c-title21__en">PICK UP</p>
            </div>

            <?php
            $featured_posts = get_field('pick_up' ,'option');
            if( $featured_posts ):  $flag = true; ?>
            <div class="c-box24">
                <?php foreach( $featured_posts as $post ):setup_postdata($post); ?>
                <?php if($flag == true) : $flag = false; ?>
                <div class="c-box24__item1">
                    <h3 class="c-box24__title1 pc-only"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php if ( get_field('single_lead') ) : ?>
                    <p class="c-box24__txt1 pc-only"><?php echo get_field('single_lead'); ?></p>
                    <?php endif; ?>
                    <div class="c-box24__head">
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '610x343'); ?>
                        <?php if($featured_img_url): ?>
                        <img class="c-box24__head__img" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                        <?php else : ?>
                        <img class="c-box24__head__img" src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <?php
                        $post_type = get_post_type_object( get_post_type($post) );
                        if($post_type->name == "gyomu_kaizen"){ $class=""; $cat = "業務改善ガイド"; }
                        if($post_type->name == "hr_news"){ $class=" c-box24__head__info--color2"; $cat = "HR News"; }
                        if($post_type->name == "faq_column"){ $class=" c-box24__head__info--color3"; $cat = "なんでもQ&A"; }
                        ?>
                        <div class="c-box24__head__info<?php echo $class; ?>">
                            <p class="c-box24__head__cat"><?php echo $cat; ?></p>
                            <p class="c-box24__head__date"><?php echo get_the_date('Y.m.d'); ?></p>
                        </div>
                    </div>
                    <h3 class="c-box24__title1 sp-only"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php if ( get_field('single_lead') ) : ?>
                    <p class="c-box24__txt1 sp-only"><?php echo get_field('single_lead'); ?></p>
                    <?php endif; ?>
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
                <?php endif; ?>
                <?php endforeach; ?>
                <div class="c-box24__right">
                    <?php foreach( $featured_posts as $post ):setup_postdata($post); ?>
                    <?php if($flag == false) : $flag = true; ?>
                    <?php elseif($flag = true): ?>
                    <div class="c-box24__item2">
                        <div class="c-box24__content">
                            <h3 class="c-box24__title2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php if ( get_field('single_lead') ) : ?>
                            <p class="c-box24__txt2"><?php echo get_field('single_lead'); ?></p>
                            <?php endif; ?>
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
                        <div class="c-box24__head">
                            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                            <?php if($featured_img_url): ?>
                            <img class="c-box24__head__img" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                            <img class="c-box24__head__img" src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <?php
                            $post_type = get_post_type_object( get_post_type($post) );
                            if($post_type->name == "gyomu_kaizen"){ $class="";  $cat = "業務改善ガイド"; }
                            if($post_type->name == "hr_news"){ $class=" c-box24__head__info--color2"; $cat = "HR News"; }
                            if($post_type->name == "faq_column"){ $class=" c-box24__head__info--color3"; $cat = "なんでもQ&A"; }
                            ?>
                            <div class="c-box24__head__info<?php echo $class; ?>">
                                <p class="c-box24__head__cat"><?php echo $cat; ?></p>
                                <p class="c-box24__head__date"><?php echo get_the_date('Y.m.d'); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
            wp_reset_postdata(); ?>
            <?php endif; ?>
            <div id="articles" class="c-title21">
                <h2 class="c-title21__jp">カテゴリ新着記事</h2>
                <p class="c-title21__en">NEW ARTICLES</p>
            </div>
            <ul class="c-list40">
                <li class="c-list40__item">
                    <div class="c-list40__heading">
                        <h3 class="c-list40__title">
                            <span class="icon"><img src="/assets/img/tayorou/common/icon-guide2.svg" alt=""></span>
                            <span>業務改善ガイド</span>
                        </h3>
                        <figure class="c-list40__imgsub">
                            <img src="/assets/img/tayorou/top/img05.svg" alt="">
                        </figure>
                    </div>
                    <?php
                    $args = array(
                        'posts_per_page' => 4,
                        'post_type' => 'gyomu_kaizen',
                        'post_status' => 'publish',
                    );
                    $query = new WP_Query( $args );
                    ?>
                    <?php if( $query->have_posts() ) : $flag1 = true; ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php if($flag1 == true) : $flag1 = false; ?>
                    <div class="c-list40__box">
                        <div class="c-list40__imgbox">
                            <figure class="c-list40__img">
                                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                                <?php if($featured_img_url): ?>
                                <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                                <?php else : ?>
                                <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </figure>
                            <div class="c-list40__timebox">
                                <span class="c-list40__time"><?php echo get_the_date('Y.m.d'); ?></span>
                            </div>
                        </div>
                        <div class="c-list40__info">
                            <a href="<?php the_permalink(); ?>" class="c-list40__txt"><?php the_title(); ?></a>
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
                    </div>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <div class="c-list40__extend">
                        <ul class="c-list41">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <?php if($flag1 == false) : $flag1 = true ?>
                            <?php elseif($flag1 == true): ?>
                            <li class="c-list41__item">
                                <div class="c-list41__info">
                                    <a href="<?php the_permalink(); ?>" class="c-list41__ttl"><?php the_title(); ?></a>
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
                                <div class="c-list41__imgbox">
                                    <figure class="c-list41__img">
                                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                                        <?php if($featured_img_url): ?>
                                        <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                                        <?php else : ?>
                                        <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                                        <?php endif; ?>
                                    </figure>
                                    <div class="c-list41__timebox">
                                        <span class="c-list41__time"><?php echo get_the_date('Y.m.d'); ?></span>
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                        <div class="c-btn12">
                            <a href="/gyomu_kaizen/" class="c-btn12__txt"><span>もっと見る</span></a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </li>
                <li class="c-list40__item">
                    <div class="c-list40__heading">
                        <h3 class="c-list40__title">
                            <span class="icon"><img src="/assets/img/tayorou/common/icon-news2.svg" alt=""></span>
                            <span>HR News</span>
                        </h3>
                        <figure class="c-list40__imgsub">
                            <img src="/assets/img/tayorou/top/img10.svg" alt="">
                        </figure>
                    </div>
                    <?php
                    $args = array(
                        'posts_per_page' => 4,
                        'post_type' => 'hr_news',
                        'post_status' => 'publish',
                    );
                    $query = new WP_Query( $args );
                    ?>
                    <?php if( $query->have_posts() ) : $flag1 = true; ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php if($flag1 == true) : $flag1 = false; ?>
                    <div class="c-list40__box">
                        <div class="c-list40__imgbox">
                            <figure class="c-list40__img">
                                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                                <?php if($featured_img_url): ?>
                                <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                                <?php else : ?>
                                <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </figure>
                            <div class="c-list40__timebox">
                                <span class="c-list40__time"><?php echo get_the_date('Y.m.d'); ?></span>
                            </div>
                        </div>
                        <div class="c-list40__info">
                            <a href="<?php the_permalink(); ?>" class="c-list40__txt"><?php the_title(); ?></a>
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
                    </div>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <div class="c-list40__extend">
                        <ul class="c-list41">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <?php if($flag1 == false) : $flag1 = true ?>
                            <?php elseif($flag1 == true): ?>
                            <li class="c-list41__item">
                                <div class="c-list41__info">
                                    <a href="<?php the_permalink(); ?>" class="c-list41__ttl"><?php the_title(); ?></a>
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
                                <div class="c-list41__imgbox">
                                    <figure class="c-list41__img">
                                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                                        <?php if($featured_img_url): ?>
                                        <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                                        <?php else : ?>
                                        <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                                        <?php endif; ?>
                                    </figure>
                                    <div class="c-list41__timebox">
                                        <span class="c-list41__time"><?php echo get_the_date('Y.m.d'); ?></span>
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                        <div class="c-btn12">
                            <a href="/hr_news/" class="c-btn12__txt"><span>もっと見る</span></a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </li>
                <li class="c-list40__item">
                    <div class="c-list40__heading">
                        <h3 class="c-list40__title">
                            <span class="icon"><img src="/assets/img/tayorou/common/icon-faq2.svg" alt=""></span>
                            <span>なんでもQ&A</span>
                        </h3>
                        <figure class="c-list40__imgsub">
                            <img src="/assets/img/tayorou/top/img15.svg" alt="">
                        </figure>
                    </div>
                    <?php
                    $args = array(
                        'posts_per_page' => 4,
                        'post_type' => 'faq_column',
                        'post_status' => 'publish',
                    );
                    $query = new WP_Query( $args );
                    ?>
                    <?php if( $query->have_posts() ) : $flag1 = true; ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php if($flag1 == true) : $flag1 = false; ?>
                    <div class="c-list40__box">
                        <div class="c-list40__imgbox">
                            <figure class="c-list40__img">
                                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '381x214'); ?>
                                <?php if($featured_img_url): ?>
                                <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                                <?php else : ?>
                                <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </figure>
                            <div class="c-list40__timebox">
                                <span class="c-list40__time"><?php echo get_the_date('Y.m.d'); ?></span>
                            </div>
                        </div>
                        <div class="c-list40__info">
                            <a href="<?php the_permalink(); ?>" class="c-list40__txt"><?php the_title(); ?></a>
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
                    </div>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <div class="c-list40__extend">
                        <ul class="c-list41">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <?php if($flag1 == false) : $flag1 = true ?>
                            <?php elseif($flag1 == true): ?>
                            <li class="c-list41__item">
                                <div class="c-list41__info">
                                    <a href="<?php the_permalink(); ?>" class="c-list41__ttl"><?php the_title(); ?></a>
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
                                <div class="c-list41__imgbox">
                                    <figure class="c-list41__img"><img src="/assets/img/tayorou/common/thumb-general_q-and-a.jpg" alt="<?php the_title(); ?>"></figure>
                                    <div class="c-list41__timebox">
                                        <span class="c-list41__time"><?php echo get_the_date('Y.m.d'); ?></span>
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                        <div class="c-btn12">
                            <a href="/faq_column/" class="c-btn12__txt"><span>もっと見る</span></a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-top2">
        <div class="l-container2">
            <div class="c-title21">
                <h2 class="c-title21__jp">新着用語解説</h2>
                <p class="c-title21__en">GLOSSARY</p>
            </div>
            <?php
                $args = array(
                    'post_type' => 'glossary',
                    'posts_per_page' => 9,
                );
                $query = new WP_Query( $args );
                ?>
            <?php if( $query->have_posts() ) : ?>
            <div class="c-list42">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="c-list42__item">
                    <p class="c-list42__title"><?php the_title(); ?></p>
                    <p class="c-list42__tit"><?php echo get_field('word_yomi'); ?></p>
                </a>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            <div class="c-btn12">
                <a href="/glossary/" class="c-btn12__txt"><span>もっと見る</span></a>
            </div>
        </div>
    </section>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/side02.php'); ?>
    <section class="p-tayorou-top4">
        <div class="l-container2">
            <div class="c-title21 c-title21--icon2">
                <h2 class="c-title21__jp">お役立ちコンテンツ<br class="sp-only">ダウンロード</h2>
                <p class="c-title21__en">DOWNLOAD</p>
            </div>
            <p class="p-tayorou-top4__txt">今日から現場で使える資料を無料配布しております。<br>弁護士・社労士監修コンテンツも多数ご用意しております。</p>
            <?php
            $args = array(
                'posts_per_page' => 6,
                'post_type' => 'download',
            );
            $query = new WP_Query( $args );
            ?>
            <?php if( $query->have_posts() ) : ?>
            <ul class="c-list43">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li class="c-list43__item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="c-list43__inner">
                            <?php $featured_img_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                            <?php if($featured_img_url): ?>
                            <img class="c-list43__img" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
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
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            <div class="c-btn12">
                <a href="/download/" class="c-btn12__txt"><span>もっと見る</span></a>
            </div>
        </div>
    </section>
    <?php
    $today_time = current_time("g:i a");
    $today_date = current_time("Y/m/d");
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'seminar',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key'       => 'seminar_date',
                'value'     =>  $today_date,
                'type'      => 'DATE',
                'compare'   => '>='
            ),
            array(
                'key'       => 'seminar_deadline',
                'value'     =>  $today_date,
                'type'      => 'DATE',
                'compare'   => '>='
            )
        ),
    );
    $query = new WP_Query( $args );
    ?>
    <?php if( $query->have_posts() ) : ?>
    <section class="p-tayorou-top5">
        <div class="l-container2">
            <div class="c-title21 c-title21--icon3">
                <h2 class="c-title21__jp">セミナー・<br class="sp-only">イベント情報のご案内</h2>
                <p class="c-title21__en">EVENT</p>
            </div>
            <p class="p-tayorou-top5__txt">
                人事・労務のお仕事に役立つセミナーや勤怠管理システム導入相談会のご案内です。
                <br>社内の勉強会にもご利用いただけます。
            </p>
            <ul class="c-list44">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li class="c-list44__item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="c-list44__box">
                            <h3 class="c-list44__tit"><?php the_title(); ?></h3>
                            <?php
                            $week = array("日", "月", "火", "水", "木", "金", "土");
                            $date = date_create('' . get_field('seminar_date') . '');
                            ?>
                            <p class="c-list44__txt1">開催日時：<?php echo date_format($date, 'Y/m/d') . "(" . $week[(int)date_format($date, 'w')] . ")"; ?> <?php echo get_field('seminar_time'); ?>～<?php echo get_field('seminar_time_end'); ?></p>
                            <p class="c-list44__txt2">開催場所：<?php echo get_field('seminar_address'); ?></p>
                            <p class="c-list44__bnt"><span>詳細はこちら</span></p>
                        </div>
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '610x343'); ?>
                        <?php if($featured_img_url): ?>
                        <img class="c-list44__img" src="<?php echo $featured_img_url; ?>" alt="">
                        <?php endif; ?>
                    </a>
                </li>
                <?php endwhile; ?>
            </ul>
            <div class="c-btn12">
                <a href="/seminar/" class="c-btn12__txt"><span>もっと見る</span></a>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    <section class="p-tayorou-top6">
        <div class="l-container2">
            <div class="c-title22">
                <img src="/assets/img/tayorou/common/logo-amano2.svg" alt="AMANO">
                <p class="c-title22__txt">製品のご紹介</p>
            </div>
            <h2 class="p-tayorou-top6__tit">勤怠管理・労務管理をはじめとしたHRテクノロジーについてはアマノにお任せください。</h2>
            <p class="p-tayorou-top6__txt">利用ユーザー約1,500万人、勤怠管理と向き合い90年。<br>アマノは国産第一号のタイムレコーダーを製造してから現在まで、時代の変化に合わせた勤怠管理システムを提供し続けてきたパイオニアです。</p>
            <p class="p-tayorou-top6__note"><span>※</span>利用ユーザー数はアマノシステム、クラウドサービス、タイムカードをご利用のユーザー数です。</p>
            <ul class="c-list45">
                <li class="c-list45__item">
                    <a target="_blank" href="/product/vg_cloud/">
                        <div class="c-list45__box">
                            <figure class="c-list45__logo"><img src="/assets/img/tayorou/top/logo1.svg" alt=""></figure>
                            <figure class="c-list45__img"><img src="/assets/img/tayorou/top/img21.png" alt=""></figure>
                            <h3 class="c-list45__tit">働き方改革とワークスタイル革新を支援する クラウド型勤怠管理システム</h3>
                            <p class="c-list45__txt">クラウドサービスとは思えない柔軟さで「働き方の多様化」を実現！ 複雑さを増す法改正、労働人口減少、コロナ禍による環境の変化など、様々な形態に変化していく働き方に柔軟に対応できる設定領域を兼ね備えています。</p>
                        </div>
                        <div class="c-btn12 c-btn12--window">
                            <p class="c-btn12__txt"><span>詳細を見る</span></p>
                        </div>
                    </a>
                </li>
                <li class="c-list45__item">
                    <a target="_blank" href="/product/timepro-vg/">
                        <div class="c-list45__box">
                            <figure class="c-list45__logo"><img src="/assets/img/tayorou/top/logo2.svg" alt=""></figure>
                            <figure class="c-list45__img"><img src="/assets/img/tayorou/top/img22.png" alt=""></figure>
                            <h3 class="c-list45__tit">90年の実績とノウハウを集結した中・大規模向けソリューション</h3>
                            <p class="c-list45__txt">
                                テレワークが普及する今、社員一人一人の勤務状況やコンディションの把握は困難で、新たな労務リスクも発生しています。新時代に適応した勤怠管理のノウハウを提供し、御社の働き方をサポートします。
                            </p>
                        </div>
                        <div class="c-btn12 c-btn12--window">
                            <p class="c-btn12__txt"><span>詳細を見る</span></p>
                        </div>
                    </a>
                </li>
                <li class="c-list45__item">
                    <a target="_blank" href="/product/timepro-nx/">
                        <div class="c-list45__box">
                            <figure class="c-list45__logo"><img src="/assets/img/tayorou/top/logo3.svg" alt=""></figure>
                            <figure class="c-list45__img"><img src="/assets/img/tayorou/top/img23.png" alt=""></figure>
                            <h3 class="c-list45__tit">就業・給与・人事・セキュリティをまとめて管理できる統合型人事労務パッケージ</h3>
                            <p class="c-list45__txt">
                                【IT補助金制度認定ツール】就業・給与・人事・セキュリティのデータがシームレスに連携できます。それぞれのシステムを単体で導入することも、組み合わせて導入することも可能です。※IT導入補助金は「就業」「給与」に適用可能
                            </p>
                        </div>
                        <div class="c-btn12 c-btn12--window">
                            <p class="c-btn12__txt"><span>詳細を見る</span></p>
                        </div>
                    </a>
                </li>
            </ul>
            <a href="/product/" target="_blank" class="c-box26">
                <div class="c-box26__inner">
                    <figure class="c-box26__img"><img src="/assets/img/tayorou/top/img24.png" alt=""></figure>
                    <p class="c-box26__txt">詳しくは<br class="sp-only">アマノ製品情報ページをご覧ください</p>
                </div>
            </a>
        </div>
    </section>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>