    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-header">
                    関連製品
                </div>
                <div class="card-body">
                    <?php $single_product = get_field('single_product'); ?>
                    <?php if ($single_product) :
                        foreach ($single_product as $product) :  setup_postdata($product); ?>
                            <h4><?php echo $product->post_title ?></h4>
                            <p><?php echo $product->post_content ?></p>
                            <hr>
                        <?php endforeach;
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>