<?php $pageid = "tayorou-seminar"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<main class="p-tayorou-seminar">
    <section class="c-breadcrumb2">
        <div class="l-container2">
            <ul class="c-breadcrumb2__inner">
                <li class="c-breadcrumb2__item"><a href="/">ホーム</a></li>
                <li class="c-breadcrumb2__item"><span>セミナー・イベント情報</span></li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-seminar1">
        <div class="l-container2">
            <div class="c-title23 purple">
                <div class="c-title23__inner">
                    <div class="c-title23__tit">
                        <img class="c-title23__tit__img" src="/assets/img/tayorou/seminar/icon.svg" alt="">
                        <h2 class="c-title23__tit__txt">セミナー・<br class="sp-only">イベント情報</h2>
                    </div>
                </div>
                <img class="c-title23__img" src="/assets/img/tayorou/seminar/illust-business03.svg" alt="">
            </div>

            <div class="p-tayorou-seminar1__content">
                <p class="p-tayorou-seminar__text">人事・労務のお仕事に役立つセミナーや勤怠管理システム導入相談会のご案内です。 社内の勉強会にもご利用いただけます。</p>
                <?php
                $today_time = current_time("g:i a");
                $today_date = current_time("Y/m/d");
                $seminar_recruiting = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'seminar',
                    'post_status' => 'publish',
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
                ));
                if ($seminar_recruiting->have_posts()) : ?>
                <ul class="c-list44">
                    <?php while ($seminar_recruiting->have_posts()) : $seminar_recruiting->the_post(); ?>
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
                            <img class="c-list44__img" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                            <img class="c-list44__img" src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
            <div class="p-tayorou-seminar1__content">
                <div class="c-title26 purple">過去に開催のセミナー・イベント</div>
                <p class="p-tayorou-seminar__text">過去に開催したイベント・セミナーのご紹介です。 下記セミナー・イベントは現在参加募集は行っておりませんので予めご了承ください。</p>
                <?php
                $seminar_recruited = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'seminar',
                    'post_status' => 'publish',
                    'meta_query' => array(
                        array(
                            'key'       => 'seminar_deadline',
                            'value'     =>  $today_date,
                            'type'      => 'DATE',
                            'compare'   => '<'
                        )
                    ),
                ));
                if ($seminar_recruited->have_posts()) : ?>
                <ul class="c-list44">
                    <?php while ($seminar_recruited->have_posts()) : $seminar_recruited->the_post(); ?>
                    <li class="c-list44__item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="c-list44__tag">終了しました</div>
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
                            <?php else : ?>
                            <img class="c-list44__img" src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>

        </div>
    </section>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/side02.php'); ?>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>