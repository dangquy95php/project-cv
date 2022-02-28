<?php


//default
$content = "";

if ($redirectid == "dm_202105") {
    $content = "https://amano.inboundtools.com/tis_questionnaire";
} 
elseif ($redirectid == "wp_faq_2105") {
    $content = "https://www.amano.co.jp/pardot/pdf/WP_faq_2105.pdf";
}
elseif ($redirectid == "wp_subsidy_2105") {
    $content = "https://www.amano.co.jp/pardot/pdf/WP_subsidy_2105.pdf";
}
elseif ($redirectid == "wp_telework_2105") {
    $content = "https://www.amano.co.jp/pardot/pdf/WP_telework_2105.pdf";
}
elseif ($redirectid == "dm_202105-2") {
    $content = "http://amano.inboundtools.com/tis_questionnaire-2";
}
elseif ($redirectid == "dm_202108") {
    $content = "https://www.amano.co.jp/pardot/pdf/WP_faq_2105.pdf";
}

?>

<meta http-equiv="refresh" content="0;URL=<?php echo $content; ?>">
