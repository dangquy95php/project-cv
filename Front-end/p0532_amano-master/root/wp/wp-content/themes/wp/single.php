<?php get_header(); ?>

<?php the_title(); ?>
<?php the_time('Y.n.j'); ?>
<?php while (have_posts()){ the_post();the_content();} ?>

<?php get_footer(); ?>