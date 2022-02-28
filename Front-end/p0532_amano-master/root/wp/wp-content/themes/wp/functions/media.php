<?php
/* ===============================================================================
  メディア
=============================================================================== */

/*===================================
メディアサイズ
===================================*/
add_theme_support('post-thumbnails');
set_post_thumbnail_size(0, 0, true);
add_image_size('img-auto-250', "", 250, true);
add_image_size('img-500-auto', 500, "", true);
add_image_size('img-170-170', 170, 170, true);
add_image_size('img-402-96', 402, 96, true);
add_image_size('610x343', 610, 343, true);
add_image_size('290x163', 290, 163, true);
add_image_size('381x214', 381, 214, true);


/*
add_image_size('img100-50', 100, 50, true);
add_image_size('img200-200', 200, 200, true);
*/