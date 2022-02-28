<?php //if (!is_preview()) { 
?>
<?php /*  <meta http-equiv="refresh" content="0;URL='/product_faq'" />
  */ ?>

<?php //} else { 
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>

<main class="p-productFaq">
    <!-- End c-breadcrumb-->
    <div class="c-mv6">
        <div class="c-mv6__bg">
            <h2 class="c-mv6__ttl">よくあるご質問</h2>
        </div>
    </div><!-- End c-mv6-->

    <div class="l-container">

        <section class="p-productFaq__box" id="faq">
            <h2 class="c-title09">
                <span class="c-title09__main">プレビュー用画面</span>
            </h2>
            <ul class="c-faq">
                <?php component_loop_9(); ?>
            </ul>
        </section><!-- End p-productFaq__box-->

    </div><!-- End l-container-->

</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>

<?php //} 
?>