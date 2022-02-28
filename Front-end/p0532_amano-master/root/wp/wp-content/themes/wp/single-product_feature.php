<?php $pageid = "psolutions-detail"; ?>
<?php $pageclass="product";?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>

<main class="p-psolutionsDetail">
    <div class="c-breadcrumb">
        <ul class="c-breadcrumb__inner">
            <li class="c-breadcrumb__item"><a href="/product/">製品情報</a></li>
            <li class="c-breadcrumb__item"><a href="/product_solutions/">ソリューション</a></li>
            <li class="c-breadcrumb__item"><span><?php the_title(); ?></span></li>
        </ul>
    </div>
    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">課題別ソリューション</h2>
        </div>
    </div>

    <section class="p-psolutionsDetail1">
        <div class="l-container">
            <h2 class="c-title05"><?php the_title(); ?></h2>
             <!-- ========================================= -->
            <div class="c-tagtime">
                <?php $local_tags = get_the_terms($post->ID, 'product_feature_tag'); ?>
                <?php if ($local_tags) : ?>
                <div class="c-new__hastag">
                    <?php foreach ($local_tags as $tag) : ?>
                    <a class="c-new__txt" href="<?php echo get_tag_link($tag); ?>"># <?php echo $tag->name; ?></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <p class="c-datetime"><?php echo get_the_date('Y.m.d'); ?></p>
            </div>
            <!-- ========================================= -->
            <?php if ( get_field('single_lead_img') && get_field('single_lead')  ) : ?>
            <div class="p-psolutionsDetail1__content">
                <?php $image = get_field('single_lead_img'); ?>
                <div class="p-psolutionsDetail1__img">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="" >
                </div>
                <p class="p-psolutionsDetail1__text"><?php echo get_field('single_lead'); ?></p>
            </div>
            <?php endif; ?>
             <!-- ========================================= -->
             <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/checkExistsH2AndH3.php'); ?>
            <!-- ========================================= -->
            <div class="c-box4">
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/single_flexible_content.php'); ?>
            </div>
        </div>
    </section>
    <?php
    $featured_posts = get_field('single_postList_feature');
    if( $featured_posts ): ?>
    <section class="p-psolutionsDetail2 u-bg04">
        <div class="l-container">
            <div class="c-box34">
                <h3 class="c-title07">テレワークに関する課題解決のご提案</h3>
                <ul class="c-list54">
                    <?php foreach( $featured_posts as $post ): setup_postdata($post); ?>
                    <li class="c-list54__item">
                        <?php if ( get_field('product_feature_img') ) : $img = get_field('product_feature_img');?>
                        <figure class="c-list54__icon">
                            <img src="<?php echo $img['product_feature_img1']; ?>" alt="<?php the_title(); ?>" class="off">
                            <img src="<?php echo $img['product_feature_img2']; ?>" alt="<?php the_title(); ?>" class="on">
                        </figure>
                        <?php endif; ?>
                        <div class="c-list54__info">
                            <p class="c-list54__txt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                            <?php $local_tags = get_the_terms($post->ID, 'product_feature_tag'); ?>
                            <?php if ($local_tags) : ?>
                            <div class="c-list54__listtag">
                                <?php foreach ($local_tags as $tag) : ?>
                                <a class="c-list54__tag" href="<?php echo get_tag_link($tag); ?>"># <?php echo $tag->name; ?></a>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/contact.php'); ?>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>