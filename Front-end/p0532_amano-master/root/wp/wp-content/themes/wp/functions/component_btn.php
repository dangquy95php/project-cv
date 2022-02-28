<?php
//////////////////////////////////////////////////////////////////
// btn1
//////////////////////////////////////////////////////////////////
function component_btn_1($url, $text, $target = null)
{

    $target_html = "";
    if ($target) {
        $target_html = ' target="' . $target . '"';
    }
?>
    <a href="<?php echo $url; ?>" class="c-btn01__link" <?php echo $target_html; ?>><span class="c-btn01__txt"><?php echo $text; ?></span></a>
<?php }
