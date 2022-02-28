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
            <ul class="c-singlelink">
            <?php $single_link_txt = false;
        endif; ?>
            <?php if (get_row_layout() != 'single_link_txt' &&  $single_link_txt == true) : ?>
            </ul>
        <?php $single_link_txt = false;
            endif; ?>


        <?php ////////////////////////////////////////////////////////
        // 大見出し
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_h2') : ?>
            <h2 class="c-title07" id="h2-<?php echo $h2 ?>"><?php the_sub_field('single_h2_text'); ?></h2>
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
            <h3 class="c-title06 c-title06--bg" id="h3-<?php echo $h3 ?>"><?php the_sub_field('single_h3_text'); ?></h3>
        <?php $h3++;
        endif; ?>

        <?php ////////////////////////////////////////////////////////
        // 小見出し
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_h4') : ?>
            <h4 class="c-title08"><?php the_sub_field('single_h4_text'); ?></h4>
        <?php endif; ?>

        <?php ////////////////////////////////////////////////////////
        // ★本文
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_contents') : ?>
            <div class="c-box4__txt"><?php the_sub_field('single_contents_text'); ?></div>
        <?php endif; ?>


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
                    <li class="c-singlelink__item"><a href="<?php echo $url; ?>" class="c-singlelink__txt"><?php echo $text; ?></a></li>
                <?php else : ?>
                    <li class="c-singlelink__item"><a href="<?php echo $url; ?>" class="c-singlelink__txt c-singlelink__blank" target="_blank" rel="noopener noreferrer"><?php echo $text; ?></a></li>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>


        <?php ////////////////////////////////////////////////////////
        // ★記事リンク（テキストのみ）
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_link_post') : ?>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card bg-light">
                        <div class="card-header">
                            記事リンク（テキストのみ）
                        </div>
                        <div class="card-body">
                            <?php $single_link_post = get_sub_field('single_link_post_obj');
                            if ($single_link_post) :
                                foreach ($single_link_post as $post) :  setup_postdata($post); ?>
                                    <h3 class="py-1"><?php echo $post->post_title ?></h3>
                                    <p><?php echo $post->post_content ?></p>
                                    <hr>
                                <?php endforeach;
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php ////////////////////////////////////////////////////////
        // ★記事リンク（サムネイルあり）
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_post_block') : ?>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card bg-light">
                        <div class="card-header">記事リンク（サムネイルあり）</div>
                        <div class="card-body">
                            <?php $single_post = get_sub_field('single_post_block_obj');
                            if ($single_post) :
                                foreach ($single_post as $post) :  setup_postdata($post); ?>
                                    <h3 class="py-1"><?php echo $post->post_title ?></h3>
                                    <p><?php echo $post->post_content ?></p>
                                    <hr>
                                <?php endforeach;
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php ////////////////////////////////////////////////////////
        // ★製品リンク
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_product_block') : ?>
            <?php $single_product = get_sub_field('single_product_block_obj');
            if ($single_product) :
                foreach ($single_product as $post) :  setup_postdata($post); ?>

                    <?php
                    $type = get_field("product_type");
                    $title = get_field("product_title");
                    $lead = get_field("product_lead");
                    $url = get_field("product_url");
                    $logo = get_field('product_logo');
                    $image = get_field('product_img');
                    ?>

                    <a href="<?php echo $url; ?>" class="c-box13">
                        <?php if ($type) : ?>
                            <div class="c-box13__tit"><?php echo $type ?></div>
                        <?php else : ?>
                            <div class="c-box13__tit">勤怠管理<br>システム</div>
                        <?php endif; ?>
                        <div class="c-box13__inner">
                            <img class="c-box13__img1" src="<?php echo $image['url']; ?>" alt="<?php echo $title ?>">
                            <img class="c-box13__img2" src="<?php echo $logo['url']; ?>" alt="<?php echo $title ?>">
                            <div class="c-box13__txt">
                                <p><?php echo $lead; ?></p>
                            </div>
                        </div>
                    </a>

                <?php endforeach;
                wp_reset_postdata(); ?>
            <?php endif; ?>

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

                <figure class="c-imgSingle">
                    <?php if ($single_caption) { ?>
                        <figcaption class="c-imgSingle__txt"><?php echo $single_caption; ?></figcaption>
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

                <div class="c-imgtext03">
                    <div class="c-imgtext03__txt">
                        <div class="c-imgtext03__text"><?php echo $single_image_text; ?></div>
                    </div>
                    <div class="c-imgtext03__img">
                        <img src="<?php echo esc_url($single_image['url']); ?>" alt="">
                    </div>
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
                <div class="c-box5">

                    <?php if ($type == "disc") { ?>
                        <ul class="c-singlelist">
                        <?php } else { ?>
                            <ol class="c-singlelist c-singlelist--num">
                            <?php } ?>

                            <?php while (have_rows('single_list_repeat')) : the_row(); ?>
                                <li class="c-singlelist__item"><?php the_sub_field('single_list_text'); ?></li>
                            <?php endwhile; ?>
                            <?php if ($type == "disc") { ?>
                        </ul>
                    <?php } else { ?>
                        </ol>
                    <?php } ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php ////////////////////////////////////////////////////////
        // 注釈
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_note') : ?>
            <?php if (get_sub_field('single_note_text')) { ?>
                <p class="c-singlenote"><?php the_sub_field('single_note_text'); ?></p>
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
                echo '<div class="c-table__wrap">';

                if (isset($col) && $col > 3) {
                    echo '<table class="c-table c-table--data">';
                } else {
                    echo '<table class="c-table">';
                }

                if (!empty($table['header'])) {
                    echo '<thead>';
                    echo '<tr>';
                    foreach ($table['header'] as $th) {
                        echo '<th>';
                        echo $th['c'];
                        echo '</th>';
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
                echo '</div>';
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
                <div class="c-box5">
                    <?php if ($title) { ?>
                        <h4 class="c-title08"><?php echo $title; ?></h4>
                    <?php } ?>
                    <div class="c-text03"><?php echo $text; ?></div>
                </div>
            <?php endif; ?>
        <?php endif; ?>



        <?php ////////////////////////////////////////////////////////
        // コラム
        //////////////////////////////////////////////////////////////  
        ?>
        <?php if (get_row_layout() == 'single_box_product') : ?>
            <div class="c-box33">
                <div class="c-box33__inner">
                    <div class="c-box33__content">
                        <div class="c-box33__text1"><?php echo get_sub_field('single_box_product_title1') ?></div>
                        <h3 class="c-box33__title"><?php echo get_sub_field('single_box_product_title2') ?></h3>
                        <div class="c-box33__text1 cl-01"><?php echo get_sub_field('single_box_product_text') ?></div>
                    </div>
                    <div class="c-box33__img">
                        <img src="<?php echo get_sub_field('single_box_product_image') ?>" alt="">
                    </div>
                </div>
                <div class="c-box33__btn">
                    <a href="<?php echo get_sub_field('single_box_product_url') ?>" target="_blank">詳細を見る</a>
                </div>
            </div>
        <?php endif; ?>




<?php
    endwhile;
endif; ?>