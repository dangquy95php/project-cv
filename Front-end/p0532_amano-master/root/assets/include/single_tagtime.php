<div class="c-tagtime">
    <?php $local_tags = get_the_terms($post->ID, $tagname); ?>
    <?php if ($local_tags) : ?>
        <div class="c-new__hastag">
            <?php foreach ($local_tags as $tag) : ?>
                <a href="<?php echo get_tag_link($tag); ?>" class="c-new__txt"># <?php echo $tag->name; ?></a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <p class="c-datetime"><?php the_time('Y.m.d'); ?></p>
</div>