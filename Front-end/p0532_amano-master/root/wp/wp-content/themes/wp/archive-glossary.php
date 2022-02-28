<?php $pageid = "tayorou-glossary"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<main class="p-tayorou-glossary">
    <section class="c-breadcrumb2">
        <div class="l-container2">
            <ul class="c-breadcrumb2__inner">
                <li class="c-breadcrumb2__item"><a href="/">ホーム</a></li>
                <li class="c-breadcrumb2__item"><span>人事・労務の注目用語</span></li>
            </ul>
        </div>
    </section>
    <section class="p-tayorou-glossary1">
        <div class="l-container2">
            <div class="l-layout1">
                <div class="l-layout1__left">
                    <div class="c-title23 gray">
                        <div class="c-title23__inner">
                            <p class="c-title23__txt">スムーズなお仕事のために<br class="sp-only">知っておきたい</p>
                            <div class="c-title23__tit">
                                <img class="c-title23__tit__img" src="/assets/img/tayorou/glossary/icon.svg" alt="">
                                <h2 class="c-title23__tit__txt">人事・労務の<br class="sp-only">注目用語</h2>
                            </div>
                        </div>
                        <img class="c-title23__img" src="/assets/img/tayorou/glossary/illust-keyword.svg" alt="">
                    </div>
                    <div class="p-tayorou-glossary1__content1">
                        <div class="c-title26 gray">新着用語</div>
                        <?php
                        $args = array(
                            'posts_per_page' => 6,
                            'post_type' => 'glossary',
                        );
                        $query = new WP_Query( $args );
                        ?>
                        <?php if( $query->have_posts() ) : ?>
                        <div class="c-list42 is-style1">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="c-list42__item">
                                <div class="c-list42__content">
                                    <p class="c-list42__title"><?php the_title(); ?></p>
                                    <p class="c-list42__tit"><?php echo get_field('word_yomi'); ?></p>
                                </div>
                            </a>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                    <div class="p-tayorou-glossary1__content2">
                        <div class="c-box31">
                            <div class="c-box31__title">50音順から探す</div>
                            <div class="c-box31__list">
                                <a href="#a" class="c-box31__item">あ</a>
                                <a href="#ka" class="c-box31__item">か</a>
                                <a href="#sa" class="c-box31__item">さ</a>
                                <a href="#ta" class="c-box31__item">た</a>
                                <a href="#na" class="c-box31__item">な</a>
                                <a href="#ha" class="c-box31__item">は</a>
                                <a href="#ma" class="c-box31__item">ま</a>
                                <a href="#ya" class="c-box31__item">や</a>
                                <a href="#ra" class="c-box31__item">ら</a>
                                <a href="#wa" class="c-box31__item">わ</a>
                            </div>
                        </div>
                        <div id="a" class="p-tayorou-glossary1__item">
                            <div class="c-title27">
                                <div class="c-title27__tag">あ</div>から始まる用語
                            </div>
                            <?php echo do_shortcode('[glosary key="a"]'); ?>
                        </div>
                        <div id="ka" class="p-tayorou-glossary1__item">
                            <div class="c-title27">
                                <div class="c-title27__tag">か</div>から始まる用語
                            </div>
                            <?php echo do_shortcode('[glosary key="k"]'); ?>
                        </div>
                        <div id="sa" class="p-tayorou-glossary1__item">
                            <div class="c-title27">
                                <div class="c-title27__tag">さ</div>から始まる用語
                            </div>
                            <?php echo do_shortcode('[glosary key="s"]'); ?>
                        </div>
                        <div id="ta" class="p-tayorou-glossary1__item">
                            <div class="c-title27">
                                <div class="c-title27__tag">た</div>から始まる用語
                            </div>
                            <?php echo do_shortcode('[glosary key="t"]'); ?>
                        </div>
                        <div id="na" class="p-tayorou-glossary1__item">
                            <div class="c-title27">
                                <div class="c-title27__tag">な</div>から始まる用語
                            </div>
                            <?php echo do_shortcode('[glosary key="n"]'); ?>
                        </div>
                        <div id="ha" class="p-tayorou-glossary1__item">
                            <div class="c-title27">
                                <div class="c-title27__tag">は</div>から始まる用語
                            </div>
                            <?php echo do_shortcode('[glosary key="h"]'); ?>
                        </div>
                        <div id="ma" class="p-tayorou-glossary1__item">
                            <div class="c-title27">
                                <div class="c-title27__tag">ま</div>から始まる用語
                            </div>
                            <?php echo do_shortcode('[glosary key="m"]'); ?>
                        </div>
                        <div id="ya" class="p-tayorou-glossary1__item">
                            <div class="c-title27">
                                <div class="c-title27__tag">や</div>から始まる用語
                            </div>
                            <?php echo do_shortcode('[glosary key="y"]'); ?>
                        </div>
                        <div id="ra" class="p-tayorou-glossary1__item">
                            <div class="c-title27">
                                <div class="c-title27__tag">ら</div>から始まる用語
                            </div>
                            <?php echo do_shortcode('[glosary key="r"]'); ?>
                        </div>
                        <div id="wa" class="p-tayorou-glossary1__item">
                            <div class="c-title27">
                                <div class="c-title27__tag">わ</div>から始まる用語
                            </div>
                            <?php echo do_shortcode('[glosary key="w"]'); ?>
                        </div>
                    </div>
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
                                <a href="/" class="c-btn12__txt"><span>ホームへ</span></a>
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