<?php
$checkExistsH2AndH3 = get_field('single_flexible_content');
if ($checkExistsH2AndH3 && (count(array_column($checkExistsH2AndH3, 'single_h2_text')) > 0
    || count(array_column($checkExistsH2AndH3, 'single_h3_text')) > 0)) : ?>

    <?php if (have_rows('single_flexible_content')) : $h2 = 1;
        $h3 = 1; ?>

        <div class="c-box3">
            <h3 class="c-title06 u-center">目次</h3>
            <div class="c-box3__wrap">
                <?php while (have_rows('single_flexible_content')) : the_row(); ?>

                    <?php if (get_row_layout() == 'single_h2') : ?>
                        <p class="c-box3__ttl"><a href="#h2-<?php echo $h2 ?>"><?php echo $h2 ?>. <?php the_sub_field('single_h2_text'); ?></a></p>
                    <?php $h2++;
                    endif; ?>

                    <?php if (get_row_layout() == 'single_h3') : ?>
                        <a class="c-box3__txt" href="#h3-<?php echo $h3 ?>"><?php the_sub_field('single_h3_text'); ?></a>
                    <?php $h3++;
                    endif; ?>
                <?php endwhile; ?>

            </div>
        </div>

    <?php endif; ?>



<?php endif; ?>