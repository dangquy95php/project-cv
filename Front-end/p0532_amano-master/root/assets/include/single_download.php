<div class="row mt-5">
    <div class="col-md-12 mb-4 block_item">
        <div class="card bg-light">
            <div class="card-header">
                <div class="block_title mx-auto">
                    おすすめのお役立ちコンテンツ
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    $single_download = get_field('single_download');
                    $count = 0;
                    if ($single_download) : ?>
                        <?php foreach ($single_download as $dowload) : $count++;
                            setup_postdata($dowload);
                            if($count <= 3) : ?>
                                <div class="col-md-4">
                                    <div class="block">
                                        <div class="image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php $post_thumbnail_id = get_post_thumbnail_id( $dowload->ID, 'full' );
                                                if(!empty($post_thumbnail_id)) {
                                                    $img_ar = wp_get_attachment_image_src( $post_thumbnail_id, 'full' ); ?>
                                                    <img class="w-100" src="<?php echo $img_ar[0];?>" />
                                                <?php } else { ?>
                                                    <img class="w-100" src="<?php echo get_template_directory_uri() ?>/assets/image/common/default.png" alt="">
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <h3 class="block_title mt-1 mb-3"><?php echo $dowload->post_title; ?></h3>
                                        <div class="btn w-100">
                                            <a class="py-4" href="<?php the_permalink(); ?>">詳細・ダウンロードはこちら</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>