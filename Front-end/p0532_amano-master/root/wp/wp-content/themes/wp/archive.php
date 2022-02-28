<?php ///////////////////////////////////////////////////////
// Taxonomy
///////////////////////////////////////////////////////////// 
?>

<?php if (is_tax()) {

    if (is_tax("hr_news_tag")) {
        include('archive-hr_news.php');
    } else if (is_tax("gyomu_kaizen_tag")) {
        include('archive-gyomu_kaizen.php');
    } else if (is_tax("download_tag")) {
        include('archive-download.php');
    } else if (is_tax("faq_column_tag")) {
        include('archive-faq_column.php');
    } else if (is_tax("glossary_tag")) {
        include('archive-glossary.php');
    } else if (is_tax("seminar_tag")) {
        include('archive-seminar.php');
    } else if (is_tax("news-topics_cat")) {
        include('archive-news-topics.php');
    } else {
    }
} else { ?>
    <?php ///////////////////////////////////////////////////////
    // Other
    ///////////////////////////////////////////////////////////// 
    ?>

    <?php get_header(); ?>

    <?php get_footer(); ?>


<?php } ?>