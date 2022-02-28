<?php
$single_image = get_field('single_lead_img');
if ($single_image) : ?>
    <figure class="c-imgSingle">
        <img src="<?php echo esc_url($single_image['url']); ?>" alt="">
    </figure>
<?php endif; ?>

<?php
$writer = get_field('writer_list');
if ($writer) { ?>
    <div class="c-box12">
        <div class="c-box12__inner">
            <figure class="c-box12__img">
                <?php $writer_image = get_field('writer_image', $writer->ID);
                if ($writer_image) { ?>
                    <img src="<?php echo $writer_image["sizes"]["img-170-170"]; ?>" alt="<?php echo get_the_title($writer->ID); ?>">
                <?php } else { ?>
                    <img src="/assets/image/common/default.png" alt="<?php echo get_the_title($writer->ID); ?>">
                <?php } ?>
            </figure>
            <div class="c-box12__title">
                <h3 class="c-box12__tit"><?php echo get_the_title($writer->ID); ?></h3>
                <p class="c-box12__sub"><?php echo get_field('writer_job', $writer->ID); ?></p>
            </div>
        </div>
        <div class="c-box12__txt"><?php echo get_field('writer_text', $writer->ID); ?></div>
    </div>
<?php } ?>

<?php if (get_field('single_lead')) { ?>
    <div class="c-text03"><?php the_field('single_lead'); ?></div>
<?php } ?>