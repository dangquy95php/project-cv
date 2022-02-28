<?php
$index = get_field('single_flexible_content');
if ($index && (count(array_column($index, 'single_title1_text')) > 0)) : ?>

    <?php if (have_rows('single_flexible_content')) : $h2 = 1; ?>
        <div class="c-list32">
            <?php while (have_rows('single_flexible_content')) : the_row(); ?>
                <?php
                if (get_row_layout() == 'single_title1') :

                    $title = get_sub_field('single_title1_text');
                    $title = str_replace("①", "", $title);
                    $title = str_replace("②", "", $title);
                    $title = str_replace("③", "", $title);
                    $title = str_replace("④", "", $title);
                    $title = str_replace("⑤", "", $title);
                    $title = str_replace("⑥", "", $title);
                    $title = str_replace("⑦", "", $title);
                    $title = str_replace("⑧", "", $title);
                    $title = str_replace("⑨", "", $title);
                    $title = str_replace("⑩", "", $title);

                    $img = get_sub_field('single_title1_img');
                    if ($img) {
                        $img_url = esc_url($img['sizes']['img-402-96']);
                    }

                ?>

                    <a href="#h2-<?php echo $h2 ?>" class="c-list32__item">
                        <img class="c-list32__img" src="<?php echo $img_url ?>" alt="">
                        <h3 class="c-list32__txt"><?php echo $title; ?></h3>
                        <img class="c-list32__bnt" src="/assets/img/product_solutions/bnt.svg" alt="">
                    </a>
                <?php $h2++;
                endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

<?php endif; ?>