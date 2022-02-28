<?php
//////////////////////////////////////////////////////////////////
// loop1
// for hr_news
//////////////////////////////////////////////////////////////////
function component_loop_1($type = "")
{ 
    global $the_query;
    ?>
    <?php if ($type == "first") { ?>
        <li class="c-list02__item c-new<?php if ($the_query->current_post === 0) { echo ' firstview'; } ?>">
            <a href="<?php the_permalink(); ?>" class="c-new__link"></a>
            <span class="c-tag8">HR News</span>
            <div class="c-list02__img">
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250');
                if ($featured_img_url) { ?>
                    <img src="<?php echo $featured_img_url ?>" alt="">
                <?php } else { ?>
                    <img src="/assets/img/common/default.png" alt="">
                <?php } ?>
            </div>
            <div class="c-list02__content">
                <p class="c-list02__time">
                    <span class="c-new__date2"><?php echo the_time('Y.m.d'); ?></span>
                    <?php mark_new_post(7, '<span class="c-new__tag">New</span>'); ?>
                </p>
                <h3 class="c-list02__ttl c-new__ttl"><?php characters_limit(get_the_title(), 100); ?></h3>

                <?php $local_tags = get_the_terms($post->ID, 'post_tag'); ?>
                <?php if ($local_tags) : ?>
                    <div class="c-new__hastag">
                        <?php foreach ($local_tags as $tag) : ?>
                             <a href="<?php echo get_tag_link($tag); ?>" class="c-tag7"><?php echo $tag->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </li>
    <?php } else { ?>
        <li class="c-list02__item c-new">
            <a href="<?php the_permalink(); ?>" class="c-new__link"></a>
            <div class="c-list02__img">
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250');
                if ($featured_img_url) { ?>
                    <img src="<?php echo $featured_img_url ?>" alt="">
                <?php } else { ?>
                    <img src="/assets/img/common/default.png" alt="">
                <?php } ?>
            </div>
            <div class="c-list02__content">
                <p class="c-list02__time">
                    <span class="c-new__date2"><?php echo the_time('Y.m.d'); ?></span>
                    <?php mark_new_post(7, '<span class="c-new__tag">New</span>'); ?>
                </p>
                <h3 class="c-list02__ttl c-new__ttl"><?php characters_limit(get_the_title(), 100); ?></h3>

                <?php $local_tags = get_the_terms($post->ID, 'hr_news_tag'); ?>
                <?php if ($local_tags) : ?>
                    <div class="c-new__hastag">
                        <?php foreach ($local_tags as $tag) : ?>
                            <a href="<?php echo get_tag_link($tag); ?>" class="c-tag7"><?php echo $tag->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </li>
    <?php } ?>
<?php }

//////////////////////////////////////////////////////////////////
// loop2
// for faq_column
//////////////////////////////////////////////////////////////////
function component_loop_2()
{ ?>
    <li class="c-list33__item">
        <a href="<?php the_permalink(); ?>" class="c-list33__link">
            <div class="c-list33__img">
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250');
                if ($featured_img_url) { ?>
                    <img src="<?php echo $featured_img_url ?>" alt="">
                <?php } else { ?>
                    <img src="/assets/img/common/default.png" alt="">
                <?php } ?>
            </div>
            <div class="c-list33__info">
                <h3 class="c-list33__txt"><?php characters_limit(get_the_title(), 62); ?></h3>
                <time class="c-list33__date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
            </div>
        </a>
    </li>
<?php }

//////////////////////////////////////////////////////////////////
// loop2
// for faq_column recommend
//////////////////////////////////////////////////////////////////
function component_loop_2_1()
{ ?>
    <li class="c-list04__item">
        <div class="c-list04__wrap">
            <h3 class="c-list04__ttl">
                <span class="c-list04__ttl__tag">Q</span>
                <span class="c-list04__ttl__txt c-new__ttl"><?php characters_limit(get_the_title(), 62); ?></span>
            </h3>
            <?php $local_tags = get_the_terms($post->ID, 'faq_column_tag'); ?>
            <?php if ($local_tags) : ?>
                <div class="c-list04__hastag c-new__hastag">
                    <?php foreach ($local_tags as $tag) : ?>
                        <a href="<?php echo get_tag_link($tag); ?>" class="c-new__txt"><?php echo $tag->name; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <p class="c-list04__time">
                <span class="c-list04__date c-new__date"><?php the_time('Y.m.d'); ?></span>
            </p>
            <div class="c-list04__btn c-btn01 c-btn01--blue">
                <a href="<?php the_permalink(); ?>" class="c-btn01__link"><span class="c-btn01__txt">回答をみる</span></a>
            </div>
        </div>
    </li><!-- End c-list04__item-->

<?php }

//////////////////////////////////////////////////////////////////
// loop3
// for word
//////////////////////////////////////////////////////////////////
function component_loop_3($type = "date")
{ ?>
    <li class="c-list05__item">
        <a href="<?php the_permalink(); ?>" class="c-list05__link">
            <h3 class="c-list05__ttl"><?php characters_limit(get_the_title(), 100); ?></h3>

            <?php if ($type == "date") : ?>
                <p class="c-new__date"><?php echo get_the_time('Y.m.d') ? get_the_time('Y.m.d') . ' 更新' : '' ?></p>
            <?php else : ?>
                <p class="c-new__date">読み方 : <?php the_field("word_yomi") ?></p>
            <?php endif; ?>
        </a>
    </li>
<?php }

//////////////////////////////////////////////////////////////////
// loop4
// for seminar
//////////////////////////////////////////////////////////////////
function component_loop_4($type = "")
{ ?>
    <li class="c-list06__item">
        <div class="c-list06__wrap">
            <p class="c-list06__ttl"><?php the_title(); ?></p>
            <p class="c-list06__date">
                <?php
                $week = array("日", "月", "火", "水", "木", "金", "土");
                $date = date_create('' . get_field('seminar_date') . '');
                echo date_format($date, 'Y/m/d') . "(" . $week[(int)date_format($date, 'w')] . ")";
                ?>
            </p>
            <p class="c-list06__date c-list06__time"><?php echo get_field('seminar_time') ?>～<?php echo get_field('seminar_time_end') ?></p>
            <?php if ($type == "end") { ?>
                <div class="c-btn07">
                    <a href="<?php the_permalink(); ?>" class="c-btn07__txt">詳細はこちら</a>
                </div>
            <?php } else { ?>
                <div class="c-btn02">
                    <a href="<?php the_permalink(); ?>" class="c-btn02__link"><span class="c-btn02__txt">詳細・お申込みはこちら</span></a>
                </div>
            <?php } ?>
        </div>
    </li>
<?php }

//////////////////////////////////////////////////////////////////
// loop5
// for dowload
//////////////////////////////////////////////////////////////////
function component_loop_5()
{ ?>
    <li class="c-list07__item">
        <div class="c-list07__wrap">
            <div class="c-list07__img">
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250');
                if ($featured_img_url) { ?>
                    <img src="<?php echo $featured_img_url ?>" alt="">
                <?php } else { ?>
                    <img src="/assets/img/common/default.png" alt="">
                <?php } ?>
            </div>
            <div class="c-list07__content">
                <p class="c-list07__ttl"><?php characters_limit(get_the_title(), 100); ?></p>
                <div class="c-btn02 c-btn02--yellow">
                    <a href="<?php the_permalink(); ?>" class="c-btn02__link"><span class="c-btn02__txt">詳細・ダウンロードはこちら</span></a>
                </div>
            </div>
        </div>
    </li>

<?php }

//////////////////////////////////////////////////////////////////
// loop6
// for guide
//////////////////////////////////////////////////////////////////
function component_loop_6($type = "")
{ 
    global $the_query;
    ?>
    <?php if ($type == "first") { ?>
        <li class="c-list03__item c-new<?php if ($the_query->current_post === 0) { echo ' firstview'; } ?>">
            <a href="<?php the_permalink(); ?>" class="c-new__link"></a>
            <span class="c-tag8 c-tag8--blue">業務改善ガイド</span>
            <div class="c-list03__img">
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250');
                if ($featured_img_url) { ?>
                    <img src="<?php echo $featured_img_url ?>" alt="">
                <?php } else { ?>
                    <img src="/assets/img/common/default.png" alt="">
                <?php } ?>
            </div>
            <div class="c-list03__content">
                <p class="c-list03__time">
                    <span class="c-new__date"><?php the_time('Y.m.d'); ?></span>
                    <?php mark_new_post(7, '<span class="c-list03__tag c-new__tag">New</span>'); ?>
                </p>
                <h3 class="c-list03__ttl c-new__ttl"><?php characters_limit(get_the_title(), 60); ?></h3>

                <?php $local_tags = get_the_terms($post->ID, 'post_tag'); ?>
                <?php if ($local_tags) : ?>
                    <div class="c-new__hastag">
                        <?php foreach ($local_tags as $tag) : ?>
                            <a href="<?php echo get_tag_link($tag); ?>" class="c-tag7"><?php echo $tag->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </li>
    <?php } else { ?>
        <li class="c-list03__item c-new">
            <a href="<?php the_permalink(); ?>" class="c-new__link"></a>
            <div class="c-list03__img">
                <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250');
                if ($featured_img_url) { ?>
                    <img src="<?php echo $featured_img_url ?>" alt="">
                <?php } else { ?>
                    <img src="/assets/img/common/default.png" alt="">
                <?php } ?>
            </div>
            <div class="c-list03__content">
                <p class="c-list03__time">
                    <span class="c-new__date"><?php the_time('Y.m.d'); ?></span>
                    <?php mark_new_post(7, '<span class="c-list03__tag c-new__tag">New</span>'); ?>
                </p>
                <h3 class="c-list03__ttl c-new__ttl"><?php characters_limit(get_the_title(), 60); ?></h3>

                <?php $local_tags = get_the_terms($post->ID, 'post_tag'); ?>
                <?php if ($local_tags) : ?>
                    <div class="c-new__hastag">
                        <?php foreach ($local_tags as $tag) : ?>
                            <a href="<?php echo get_tag_link($tag); ?>" class="c-tag7"><?php echo $tag->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </li>
    <?php } ?>
<?php }

//////////////////////////////////////////////////////////////////
// loop7
// for word_kana
//////////////////////////////////////////////////////////////////
function component_loop_7($the_query_word, $word = 'a')
{
    $count = 0; ?>
    <ul class="c-list05">
        <?php while ($the_query_word->have_posts()) : $the_query_word->the_post(); ?>
            <?php if (get_field('word_kana') == $word) : ?>
                <?php $count++;
                component_loop_3('word_yomi'); ?>
            <?php endif; ?>
        <?php endwhile; ?>
        <!-- End c-list05__item-->
    </ul>
    <?php
    if ($count != 0) {
        $count = 0;
    } else {
        echo '<p class="c-text09">coming soon</p>';
    }
    ?>
<?php }

//////////////////////////////////////////////////////////////////
// loop8
// for news-topics
//////////////////////////////////////////////////////////////////
function component_loop_8()
{  ?>
    <li class="c-list08__item">
        <div class="c-list08__heading">
            <time class="c-list08__date" datetime="<?php echo get_the_time('Y-m-d'); ?>"><?php echo get_the_time('Y-m-d'); ?></time>

            <?php
            $terms = get_the_terms($post->ID, 'news-topics_cat');
            if ($terms) : ?>
                <div class='c-list08_tag'>
                    <?php foreach ($terms as $term) : ?>
                        <?php $term_link = get_term_link($term); ?>
                        <a class="c-tag" href="<?= esc_url($term_link) ?>"><?= $term->name ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
        <div class="c-list08__info">
            <a href="<?php the_permalink(); ?>" class="c-list08__txt"><?php the_title(); ?></a>
        </div>
    </li>
<?php }


//////////////////////////////////////////////////////////////////
// loop9
// for product_faq
//////////////////////////////////////////////////////////////////
function component_loop_9()
{  ?>

    <li class="c-faq__item">
        <div class="c-faq__question">
            <p class="c-faq__ttl"><?php the_title(); ?></p>
        </div>
        <div class="c-faq__answer">
            <div class="c-faq__txt"><?php the_content(); ?></div>
        </div>
    </li><!-- End c-faq__item-->

<?php }


//////////////////////////////////////////////////////////////////
// loop10
// for side
//////////////////////////////////////////////////////////////////
function component_loop_10()
{  ?>

    <?php
    $post_type = get_post_type($post);
    $tagname = "";

    if ($post_type == "hr_news") {
        $tagname = "HR news";
    } else if ($post_type == "faq_column") {
        $tagname = "何でもQ＆A";
    } else if ($post_type == "glossary") {
        $tagname = "注目用語";
    } else if ($post_type == "gyomu_kaizen") {
        $tagname = "業務改善ガイド";
    } else if ($post_type == "news-topics") {
        $tagname = "お知らせ";
    } else if ($post_type == "product_case") {
        $tagname = "導入事例";
    } else if ($post_type == "seminar") {
        $tagname = "セミナー";
    } else if ($post_type == "tool_guide") {
        $tagname = "ツールガイド";
    } else if ($post_type == "download") {
        $tagname = "ダウンロード";
    }

    ?>
    <li class="c-side__item">
        <a href="<?php the_permalink(); ?>" class="c-side__link">
            <?php if ($tagname) { ?>
                <span class="c-side__tag"><?php echo $tagname; ?></span>
            <?php } ?>
            <span class="c-side__txt"><?php characters_limit(get_the_title(), 100); ?></span>
        </a>
    </li>

<?php }

//////////////////////////////////////////////////////////////////
// loop11
// for product_case
//////////////////////////////////////////////////////////////////
function component_loop_11()
{  ?>

    <li class="c-list12__item">
        <div class="c-list12__img">
            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250');
            if ($featured_img_url) { ?>
                <img src="<?php echo $featured_img_url ?>" alt="">
            <?php } else { ?>
                <img src="/assets/img/common/default.png" alt="">
            <?php } ?>
        </div>
        <div class="c-list12__box">
            <div class="c-list12__info">
                <a href="<?php the_permalink(); ?>" class="c-list12__ttl"><?php characters_limit(get_the_title(), 100); ?></a>

                <?php /*
                <?php $post_tags = get_the_terms($post->ID, 'post_tag'); ?>
                <?php if ($post_tags) : ?>
                    <div class="c-list12__tag c-new__hastag">
                        <?php foreach ($post_tags as $tag) : ?>
                            <a href="<?php echo get_tag_link($tag); ?>" class="c-new__txt"><?php echo $tag->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                */ ?>

            </div>
            <div class="c-list12__detail">
                <p class="c-list12__name"><?php the_field("case_company"); ?></p>
                <div class="c-taglist">
                    <?php for ($i = 1; $i <= 3; $i++) {
                        $terms_cat = get_the_terms($post->ID, 'product_case_cat' . $i);
                        if ($terms_cat) {
                            foreach ($terms_cat as $cat) { ?>
                                <span class="c-tag2"><?= $cat->name; ?></span>
                    <?php }
                        }
                    } ?>
                </div>
            </div>
        </div>
    </li>
<?php }

//////////////////////////////////////////////////////////////////
// loop12
// for product_case
//////////////////////////////////////////////////////////////////
function component_loop_12()
{  ?>

    <div class="c-box9">
        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-500-auto'); ?>
        <figure class="c-box9__img">
            <?php if ($featured_img_url) : ?>
                <img src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>">
            <?php else : ?>
                <img src="/assets/img/common/default.png" alt="">
            <?php endif; ?>
        </figure>

        <div class="c-box9__info">
            <a href="<?php the_permalink(); ?>" class="c-title09 c-title09__left">
                <span class="c-title09__main"><?php characters_limit(get_the_title(), 100); ?></span>
            </a>
            <h3 class="c-box9__ttl"><?php echo get_field('case_company'); ?></h3>
            <div class="c-taglist">
                <?php for ($i = 1; $i <= 3; $i++) {
                    $terms_cat = get_the_terms($post->ID, 'product_case_cat' . $i);
                    if ($terms_cat) {
                        foreach ($terms_cat as $cat) { ?>
                            <span class="c-tag2"><?= $cat->name; ?></span>
                <?php }
                    }
                } ?>
            </div>
            <p class="c-box9__txt"><?php echo get_field('case_lead'); ?></p>
        </div>
    </div>

<?php }


//////////////////////////////////////////////////////////////////
// loop13
// for product_case
//////////////////////////////////////////////////////////////////
function component_loop_13()
{  ?>

    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250'); ?>

    <li class="c-list12__item">
        <div class="c-list12__img">
            <?php if ($featured_img_url) : ?>
                <img src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>">
            <?php else : ?>
                <img src="/assets/img/common/default.png" alt="">
            <?php endif; ?>
        </div>
        <div class="c-list12__box">
            <div class="c-list12__info">
                <a href="<?php the_permalink(); ?>" class="c-list12__ttl"><?php characters_limit(get_the_title(), 100); ?></a>
            </div>
            <div class="c-list12__detail">
                <div class="c-taglist">
                    <?php for ($i = 1; $i <= 3; $i++) {
                        $terms_cat = get_the_terms($post->ID, 'product_case_cat' . $i);
                        if ($terms_cat) {
                            foreach ($terms_cat as $cat) { ?>
                                <span class="c-tag2"><?= $cat->name; ?></span>
                    <?php }
                        }
                    } ?>
                </div>
            </div>
        </div>
    </li>


<?php }

//////////////////////////////////////////////////////////////////
// loop14
// for gyomu_kaizen
//////////////////////////////////////////////////////////////////
function component_loop_14()
{ ?>
    <li class="c-list02__item c-new">
        <a href="<?php the_permalink(); ?>" class="c-new__link"></a>
        <div class="c-list02__img">
            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250');
            if ($featured_img_url) { ?>
                <img src="<?php echo $featured_img_url ?>" alt="">
            <?php } else { ?>
                <img src="/assets/img/common/default.png" alt="">
            <?php } ?>
        </div>
        <div class="c-list02__content">
            <p class="c-list02__time">
                <span class="c-new__date2"><?php echo the_time('Y.m.d'); ?></span>
                <?php mark_new_post(7, '<span class="c-new__tag">New</span>'); ?>
            </p>
            <h3 class="c-list02__ttl c-new__ttl"><?php characters_limit(get_the_title(), 100); ?></h3>

            <?php $local_tags = get_the_terms($post->ID, 'gyomu_kaizen_tag'); ?>
            <?php if ($local_tags) : ?>
                <div class="c-new__hastag">
                    <?php foreach ($local_tags as $tag) : ?>
                        <a href="<?php echo get_tag_link($tag); ?>" class="c-new__txt"><?php echo $tag->name; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </li><!-- End c-list02__item-->

<?php }

//////////////////////////////////////////////////////////////////
// loop15
// for product_case
//////////////////////////////////////////////////////////////////
function component_loop_15($color = "")
{  ?>
    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-500-auto'); ?>

    <div class="c-slide1__item">

        <?php if ($color == "red") { ?>
            <div class="c-box9 c-box9--style3">
            <?php } else { ?>
                <div class="c-box9">
                <?php } ?>
                <figure class="c-box9__img">
                    <?php if ($featured_img_url) : ?>
                        <img src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>">
                    <?php else : ?>
                        <img src="/assets/img/common/default.png" alt="">
                    <?php endif; ?>
                </figure>
                <div class="c-box9__info">
                    <a href="<?php the_permalink(); ?>" class="c-title09 c-title09__left">
                        <span class="c-title09__main"><?php characters_limit(get_the_title(), 36); ?></span>
                    </a>
                    <h3 class="c-box9__ttl"><?php echo get_field('case_company'); ?></h3>
                    <div class="c-taglist">
                        <?php for ($i = 1; $i <= 3; $i++) {
                            $terms_cat = get_the_terms($post->ID, 'product_case_cat' . $i);
                            if ($terms_cat) {
                                foreach ($terms_cat as $cat) { ?>
                                    <span class="c-tag2"><?= $cat->name; ?></span>
                        <?php }
                            }
                        } ?>
                    </div>
                </div>
                </div>
            </div>


        <?php }


    //////////////////////////////////////////////////////////////////
    // loop16
    // for product_splutions
    //////////////////////////////////////////////////////////////////
    function component_loop_16()
    {  ?>

            <?php
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250');
            ?>

            <li class="c-list12__item">
                <div class="c-list12__img">
                    <?php if ($featured_img_url) : ?>
                        <img src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>">
                    <?php else : ?>
                        <img src="/assets/img/common/default.png" alt="">
                    <?php endif; ?>
                </div>
                <div class="c-list12__box">
                    <div class="c-list12__info">
                        <a href="<?php the_permalink(); ?>" class="c-list12__ttl"><?php characters_limit(get_the_title(), 100); ?></a>
                    </div>
                    <div class="c-list12__detail">
                        <p class="c-list12__name">
                            <?php
                            $terms_cat = get_the_terms($post->ID, 'product_solutions_cat');
                            $i = 0;
                            if ($terms_cat) {
                                foreach ($terms_cat as $cat) {
                                    if ($i != 0) {
                                        echo "・";
                                    }
                                    echo $cat->name;
                                    $i++;
                                }
                            }
                            ?>
                        </p>
                        <?php
                        $posts = get_field('solution_product');
                        if ($posts) : ?>
                            <div class="c-taglist">
                                <?php foreach ($posts as $post) : ?>
                                    <a href="<?php echo get_field('product_url', $post->ID); ?>" class="c-tag6"><?php echo get_field("product_title", $post->ID) ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </li>

        <?php }

    //////////////////////////////////////////////////////////////////
    // loop17
    // for product_solution
    //////////////////////////////////////////////////////////////////
    function component_loop_17()
    {  ?>

            <li class="c-list12__item">
                <div class="c-list12__img">
                    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'img-auto-250');
                    if ($featured_img_url) { ?>
                        <img src="<?php echo $featured_img_url ?>" alt="">
                    <?php } else { ?>
                        <img src="/assets/img/common/default.png" alt="">
                    <?php } ?>
                </div>
                <div class="c-list12__box">
                    <div class="c-list12__info">
                        <a href="<?php the_permalink(); ?>" class="c-list12__ttl"><?php characters_limit(get_the_title(), 100); ?></a>

                    </div>
                    <div class="c-list12__detail">
                        <p class="c-list12__name"><?php the_field("case_company"); ?></p>
                        <div class="c-taglist">
                            <?php for ($i = 1; $i <= 3; $i++) {
                                $terms_cat = get_the_terms($post->ID, 'product_case_cat' . $i);
                                if ($terms_cat) {
                                    foreach ($terms_cat as $cat) { ?>
                                        <span class="c-tag6"><?= $cat->name; ?></span>
                            <?php }
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php }
