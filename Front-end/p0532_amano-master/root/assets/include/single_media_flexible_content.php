<?php ///////////////////////////////////////////////////////////////
// flexible content
///////////////////////////////////////////////////////////////////// 
$single_link_txt = false;

$single_block_btn = false;
if (get_field('solution_dl_title1')) {
    $single_block_btn = true;
}



if (have_rows('single_flexible_content')) : $h2 = 1;
    $h3 = 1;
    while (have_rows('single_flexible_content')) : the_row(); ?>

        <?php ////////////////////////////////////////////////////////
        // Always check before white
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_link_txt' &&  $single_link_txt == false) : ?>
            <ul class="c-box29__link">
            <?php $single_link_txt = false;
        endif; ?>
            <?php if (get_row_layout() != 'single_link_txt' &&  $single_link_txt == true) : ?>
            </ul>
        <?php $single_link_txt = false;
            endif; ?>


        <?php ////////////////////////////////////////////////////////
        // リンク
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_link_txt') : ?>
            <?php
            $single_link_txt = true;
            $text = get_sub_field('single_link_txt_text');
            $url = get_sub_field('single_link_txt_url');
            if ($url) : ?>
                <?php if (count(get_sub_field('single_link_txt_target')) == 0) : ?>
                    <li><a href="<?php echo $url; ?>"><?php echo $text; ?></a></li>
                <?php else : ?>
                    <li><a href="<?php echo $url; ?>" target="_blank" rel="noopener noreferrer"><?php echo $text; ?></a></li>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>


        <?php ////////////////////////////////////////////////////////
        // 大見出し
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_h2') : ?>
            <h2 class="c-box29__tit1" id="h2-<?php echo $h2 ?>"><?php the_sub_field('single_h2_text'); ?></h2>
        <?php $h2++;
        endif; ?>

        <?php ////////////////////////////////////////////////////////
        // ソリューション用　大見出し
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_title1') : ?>
            <h2 class="c-title07" id="h2-<?php echo $h2 ?>"><?php the_sub_field('single_title1_text'); ?></h2>
        <?php $h2++;
        endif; ?>

        <?php ////////////////////////////////////////////////////////
        // ソリューション用　これで解決
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_block1') : ?>
            <div class="c-box16__inner">
                <h5 class="c-box16__tit2"><span><?php the_sub_field('single_block1_title'); ?></span></h5>
                <div class="c-box16__txt"><?php the_sub_field('single_block1_text'); ?></div>
                <?php if ($single_block_btn) { ?>
                    <?php
                    $img = get_field('solution_dl_img');
                    if ($img) {
                        $img_url = esc_url($img['url']);
                    }
                    ?>
                    <a href="#doc" class="c-bnt11">
                        <figure class="c-bnt11__img"><img src="<?php echo $img_url; ?>" alt=""></figure>
                        <div class="c-bnt11__inner">
                            <p class="c-bnt11__txt">無料公開中！</p>
                            <p class="c-bnt11__tit">資料でもっと詳しく解説</p>
                        </div>
                    </a>
                <?php } ?>
            </div>
        <?php endif; ?>


        <?php ////////////////////////////////////////////////////////
        // 大見出し2
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_title2') : ?>
            <h2 class="c-title09"><span class="c-title09__main c-title09__small"><?php the_sub_field('single_title2_text'); ?></span></h2>
        <?php endif; ?>

        <?php ////////////////////////////////////////////////////////
        // 中見出し
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_h3') : ?>
            <h3 class="c-box29__tit2" id="h3-<?php echo $h3 ?>"><?php the_sub_field('single_h3_text'); ?></h3>
        <?php $h3++;
        endif; ?>

        <?php ////////////////////////////////////////////////////////
        // 小見出し
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_h4') : ?>
            <h4 class="c-box29__tit3"><?php the_sub_field('single_h4_text'); ?></h4>
        <?php endif; ?>

        <?php ////////////////////////////////////////////////////////
        // ★本文
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_contents') : ?>
            <div class="c-box29__txt"><?php the_sub_field('single_contents_text'); ?></div>
        <?php endif; ?>


        <?php ////////////////////////////////////////////////////////
        // 画像
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_img') : ?>

            <?php
            $single_image = get_sub_field('single_img_image');
            $single_caption = get_sub_field('single_img_caption');
            if ($single_image) : ?>

                <figure class="c-box29__img">
                    <?php if ($single_caption) { ?>
                        <figcaption><?php echo $single_caption; ?></figcaption>
                    <?php } ?>
                    <img src="<?php echo esc_url($single_image['url']); ?>" alt="<?php echo $single_caption; ?>">
                </figure>

            <?php endif; ?>
        <?php endif; ?>

        <?php ////////////////////////////////////////////////////////
        // 画像＋テキスト
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_imgTxt') : ?>
            <?php
            $single_image = get_sub_field('single_imgTxt_image');
            $single_image_text = get_sub_field('single_imgTxt_text');
            if ($single_image) : ?>

                <div class="c-box29__txtimg">
                    <img src="<?php echo esc_url($single_image['url']); ?>" alt="">
                    <div class="c-box29__txt"><?php echo $single_image_text; ?></div>
                </div>

            <?php endif; ?>
        <?php endif; ?>


        <?php ////////////////////////////////////////////////////////
        // リスト
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_list') : ?>
            <?php
            $type = get_sub_field("single_list_type");
            if (have_rows('single_list_repeat')) : ?>

                <?php if ($type == "disc") { ?>
                    <ul class="c-box29__list1"><?php } else { ?><ol class="c-box29__list2"><?php } ?>
                        <?php while (have_rows('single_list_repeat')) : the_row(); ?>
                            <li><?php the_sub_field('single_list_text'); ?></li>
                        <?php endwhile; ?>
                <?php if ($type == "disc") { ?></ul><?php } else { ?></ol><?php } ?>

            <?php endif; ?>
        <?php endif; ?>

        <?php ////////////////////////////////////////////////////////
        // リスト
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_box_list') : ?>
            <?php
            if (have_rows('single_box_list_content')) : ?>
                <div class="c-box29__block">
                    <ul class="c-box29__list1">
                        <?php while (have_rows('single_box_list_content')) : the_row(); ?>
                            <li><?php the_sub_field('single_box_list_text'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php ////////////////////////////////////////////////////////
        // 注釈
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_note') : ?>
            <?php if (get_sub_field('single_note_text')) { ?>
                <div class="c-box29__note"><?php the_sub_field('single_note_text'); ?></div>
            <?php } ?>
        <?php endif; ?>

        <?php ////////////////////////////////////////////////////////
        // 表
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_table') : ?>

            <?php
            $table = get_sub_field('single_table_table');

            if (isset($table['header']) && is_array($table['header'])) {
                $col = count($table['header']);
            } elseif (isset($table['body'][0]) && is_array($table['body'][0])) {
                $col = count($table['body'][0]);
            }

            if (!empty($table)) {
                if (isset($col) && $col > 3) {
                    echo '<table class="c-box29__table"';
                } else {
                    echo '<table class="c-box29__table">';
                }

                if (!empty($table['header'])) {
                    echo '<thead>';
                    echo '<tr>';
                    foreach ($table['header'] as $th) {
                        echo '<td>';
                        echo $th['c'];
                        echo '</td>';
                    }
                    echo '</tr>';
                    echo '</thead>';
                }
                echo '<tbody>';
                foreach ($table['body'] as $tr) {
                    echo '<tr>';
                    foreach ($tr as $td) {
                        echo '<td>';
                        echo $td['c'];
                        echo '</td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } ?>

        <?php endif; ?>


        <?php ////////////////////////////////////////////////////////
        // コラム
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_column') : ?>
            <?php
            $title = get_sub_field('single_column_title');
            $text = get_sub_field('single_column_text');
            if ($text) : ?>
                <div class="c-box29__block">
                    <?php if ($title) { ?>
                        <h4 class="c-box29__tit2"><?php echo $title; ?></h4>
                    <?php } ?>
                    <div class="c-box29__txt"><?php echo $text; ?></div>
                </div>
            <?php endif; ?>
        <?php endif; ?>


        <?php ////////////////////////////////////////////////////////
        // コラム
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_cpt_block') : ?>
        <?php $posts = get_sub_field('single_cpt_item'); ?>
        <?php if ( $posts ): ?>
            <div class="c-list49">
                <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                <div class="c-list49__item">
                    <a href="<?php the_permalink(); ?>" class="clearfix">
                        <div class="c-list49__img">
                            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '290x163'); ?>
                            <?php if($featured_img_url): ?>
                            <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                            <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <?php $post_type = get_post_type_object( get_post_type($post) );
                            $class="";
                            if($post_type->name == "faq_column"){ $class="c-list49__box--color2"; }
                            if($post_type->name == "download"){ $class="c-list49__box--color3"; }
                            if($post_type->name == "hr_news"){ $class="c-list49__box--color4"; }?>
                            <div class="c-list49__box <?php echo $class; ?>">
                                <div class="c-list49__category">
                                    <?php if($post_type->name == "download"): ?>
                                    コンテンツダウンロード<br>
                                    <?php else: ?>
                                    <?php echo $post_type->label; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="c-list49__time"><?php echo get_the_date('Y.m.d'); ?></div>
                            </div>
                        </div>
                        <div class="c-list49__content">
                            <div class="c-list49__tit"><?php the_title(); ?></div>
                            <?php if ( get_field('single_lead') ) : ?>
                            <div  class="c-list49__txt"><?php echo get_field('single_lead'); ?></div>
                            <?php endif; ?>
                        </div>
                        <?php if($post_type->name == "download"): ?><div class="c-btn12 c-btn12--down"><div class="c-btn12__txt"><span>ダウンロード</span></div></div><?php endif; ?>
                    </a>
                </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
        <?php endif; ?>


        <?php ////////////////////////////////////////////////////////
        // コラム
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_product_block') : ?>
        <?php $posts = get_sub_field('single_product_block_obj'); ?>
        <?php if ( $posts ): ?>
            <div class="c-list49">
                <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                <div class="c-list49__item">
                    <a href="<?php echo get_field('product_url'); ?>" class="clearfix" target="_blank">
                        <div class="c-list49__img">
                            <?php $featured_img_url = get_field('media_product_img'); ?>
                            <?php if($featured_img_url): ?>
                            <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                            <img src="/assets/img/tayorou/common/thumb-noimage.jpg" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                            <div class="c-list49__box c-list49__box--color2 pc-only">
                                <div class="c-list49__category">製品情報</div>
                                <div class="c-list49__time"><?php echo get_the_date('Y.m.d'); ?></div>
                            </div>
                        </div>
                        <div class="c-list49__content">
                            <div class="c-list49__tit"><?php echo get_field('media_product_title'); ?></div>
                            <div class="c-list49__txt"><?php echo get_field('media_product_text'); ?></div>
                        </div>
                        <div class="c-btn12 c-btn12--window">
                            <div class="c-btn12__txt"><span>詳細を見る</span></div>
                        </div>
                    </a>
                </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
        <?php endif; ?>


<?php
    endwhile;
endif; ?>