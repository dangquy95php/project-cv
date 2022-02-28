<?php $pageid = "product"; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/header.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/wp/wp-load.php'); ?>


<main class="p-product">

    <div class="c-mv2">
        <div class="c-mv2__item">
            <a href="/product/e-amano_shift/">
                <div class="c-mv2__img pc-only">
                    <img src="/assets/img/product/mv05.png?ver.02" alt="シフト表の自動作成率 90%！「e-AMANO シフト作成支援サービス」" />
                </div>
                <div class="c-mv2__img sp-only">
                    <img src="/assets/img/product/mv05_sp.png?ver.02" alt="シフト表の自動作成率 90%！「e-AMANO シフト作成支援サービス」" />
                </div>
            </a>
        </div>
        <div class="c-mv2__item">
            <a href="/product/vg_cloud/">
                <div class="c-mv2__img pc-only">
                    <img src="/assets/img/product/mv2.png?ver.02" alt="人材や組織のマネジメントに使える就業管理クラウドサービス「VG Cloud」" />
                </div>
                <div class="c-mv2__img sp-only">
                    <img src="/assets/img/product/mv2_sp.png?ver.02" alt="人材や組織のマネジメントに使える就業管理クラウドサービス「VG Cloud」" />
                </div>
            </a>
        </div>
        <div class="c-mv2__item">
			<a href="/product/timepro-nx/">
				<div class="c-mv2__img pc-only">
					<img src="/assets/img/product/mv4.png" alt="" />
				</div>
				<div class="c-mv2__img sp-only">
					<img src="/assets/img/product/mv4_sp.png" alt="" />
				</div>
			</a>
        </div>
        <div class="c-mv2__item">
            <div class="c-mv2__img pc-only">
                <img src="/assets/img/product/mv1.png" alt="" />
            </div>
            <div class="c-mv2__img sp-only">
                <img src="/assets/img/product/mv1_sp.png" alt="" />
            </div>
        </div>
        <div class="c-mv2__item">
            <a href="/product_case/">
                <div class="c-mv2__img pc-only">
                    <img src="/assets/img/product/mv3.jpg" alt="" />
                </div>
                <div class="c-mv2__img sp-only">
                    <img src="/assets/img/product/mv3_sp.png" alt="" />
                </div>
            </a>
        </div>
    </div>

    <section class="p-product1">
        <div class="l-container">
            <h2 class="c-title01">
                <span class="c-title01__big">「勤怠管理システム」ラインナップ</span>
            </h2>
            <p class="c-text01 c-text01--center">
                これからの経営には、「人と時間」の視点で組織を活性化させるシステムが求められます。
                <br>アマノは、勤怠、給与、人事、入退室管理、危機管理、セルフマネジメント、ワークライフバランスなどのさまざまな視点から多角的に企業の経営をサポートします。
            </p>
        </div>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/block09.php'); ?>
        <div class="l-container">
            <ul class="c-list09">
                <li class="c-list09__item">
                    <a href="/product/top/#id02" class="c-list09__txt">システムタイムレコーダー</a>
                </li>
                <li class="c-list09__item">
                    <a href="/product/top/#id03" class="c-list09__txt">入退室管理</a>
                </li>
                <li class="c-list09__item">
                    <a href="/product/top/#id04" class="c-list09__txt">ICカード</a>
                </li>
                <li class="c-list09__item">
                    <a href="/product/top/#id05" class="c-list09__txt">人事・給与管理</a>
                </li>
                <li class="c-list09__item">
                    <a href="/product/top/#id06" class="c-list09__txt">会計管理</a>
                </li>
                <li class="c-list09__item">
                    <a href="/product/top/#id07" class="c-list09__txt">労務管理</a>
                </li>
                <li class="c-list09__item is-news">
                    <a href="/product/top/#id08" class="c-list09__txt">シフト作成・管理</a>
                </li>
            </ul>
        </div>
    </section>
    <section class="c-box18 u-bg04">
        <div class="l-container">
            <h2 class="c-title01">
                <span class="c-title01__big">【業種別】勤怠管理のお悩み改善</span>
                <span class="c-title01__sm">SOLUTIONS</span>
            </h2>
            <p class="c-box18__txt">アマノの専任システムエンジニアがご要望を抽出、様々な業種でよくある勤怠管理のお悩みを解決いたします。</p>
            <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/list35.php'); ?>
        </div>
    </section>
    <section class="p-product3">
        <div class="l-container">
            <h2 class="c-title01">
                <span class="c-title01__big">導入事例・実績</span>
            </h2>
            <p class="c-text01 c-text01--center">アマノのソリューションをご導入いただいたお客様の事例を紹介します。</p>
            <?php
            $the_query = new WP_Query(array(
                'posts_per_page' => 3,
                'post_type' => 'product_case',
                'meta_query' => array(
                    array(
                        'key'     => 'case_type',
                        'value'   => 'type1',
                        'compare' => '=',
                    )
                )

            ));
            if ($the_query->have_posts()) : ?>
                <ul class="c-list12">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php component_loop_11(); ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>

            <p class="p-product3__txt">他にも、様々な規模・業種の企業でご採用頂いております。</p>

            <ul class="c-price">
                <li class="c-price__item">
                    <p class="c-tag3">累計出荷本数</p>
                    <p class="c-price__number">50,000<span>本以上</span></p>
                </li>
                <li class="c-price__item">
                    <p class="c-tag3">導入企業</p>
                    <p class="c-price__number">20,000<span>社以上</span></p>
                </li>
            </ul>
        </div>

        <!-- 導入企業企業ロゴ -->
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/case_logo_slider.php'); ?>

        <div class="c-btn01">
            <a href="/product_case" class="c-btn01__link"><span class="c-btn01__txt">導入事例一覧</span></a>
        </div>
    </section>

    <section class="p-product4">
        <div class="p-product4__box">
            <div class="l-container">
                <div class="c-new2">
                    <div class="c-new2__heading">
                        <h2 class="c-title01">
                            <span class="c-title01__big">ニュース</span>
                        </h2>
                        <div class="c-btn01 pc-only">
                            <a href="/news-topics" class="c-btn01__link"><span class="c-btn01__txt">ニュース一覧</span></a>
                        </div>
                    </div>
                    <div class="c-new2__list">
                        <?php
                        $the_query = new WP_Query(array(
                            'posts_per_page' => 5,
                            'post_type' => 'news-topics',
                        ));
                        if ($the_query->have_posts()) : ?>
                            <ul class="c-list08">
                                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                    <?php component_loop_8(); ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="c-btn01 sp-only">
                        <a href="/news-topics" class="c-btn01__link"><span class="c-btn01__txt">ニュース一覧</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $the_query = new WP_Query(array(
        'posts_per_page' => 6,
        'post_type' => 'seminar',
    ));
    $i = 0;
    if ($the_query->have_posts()) : ?>
        <section class="c-block01">
            <div class="l-container">
                <h2 class="c-title01 c-title01--blue">
                    <span class="c-title01__sm">ご担当者様の業務改善をサポートする</span>
                    <span class="c-title01__big">セミナーのご案内</span>
                </h2>
                <p class="c-text01 c-text01--center">「毎月の勤怠処理を効率化したい」「ツール導入が不安」そんなお悩みを解決するセミナーを開催中です。 お気軽にご参加ください。</p>
                <ul class="c-list06 c-list06--gray jsSlide06">
                    <?php while ($the_query->have_posts()) : $the_query->the_post();
                        $i++; ?>
                        <?php component_loop_4(); ?>
                    <?php endwhile; ?>
                </ul>
                <?php if ($i > 3) { ?>
                    <div class="c-btn01 c-btn01--blue">
                        <?php component_btn_1("/seminar", "セミナーの一覧をみる"); ?>
                    </div>
                <?php } ?>
            </div>
        </section><!-- End c-block01-->
    <?php endif; ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/download-blue.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/contact.php'); ?>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/assets/include/footer.php'); ?>
