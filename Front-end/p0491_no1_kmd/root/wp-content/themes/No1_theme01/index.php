<?php get_header(); ?>

<main id="wrap" class="top">
	<section class="top_mainimg">
		<div class="c-slider">
			<div class="c-slider_item"></div>
			<div class="c-slider_item"></div>
			<div class="c-slider_item"></div>
		</div>
		<div class="top_mainimg_inner">
			<div class="top_mainimg_body">
				<h2 class="top_mainimg_ttl">
					<span class="eng">catchcopy</span>
					<span class="jap">まるで家族のように、強い絆で結ばれた会社。<br>それが株式会社KMDの一番の強みです。</span>
				</h2>
				<p class="top_mainimg_txt">東京都江戸川区のKMDでは、ダクトの専門家としてお客様満足度の高い高品質のダクト工事をお約束します。お客様ごと、現場ごとのベストを徹底的に探求し、最後まで責任を持ってやり遂げるのが私たちのモットーです。豊富な経験と確かな技術、そしてどこにも負けないチーム力でお客様の理想を実現させて参ります。</p>
			</div>
		</div>
	</section><!-- End top_mainimg-->

	<section class="top_news">
		<div class="l-cont">
			<?php
				$the_query = new WP_Query( array(
					'post_type'      => 'post',
					'category_name'  => 'news',
					'posts_per_page' => 1,
					'orderby'        => 'date',
					'order'          => 'DESC',
					'post_status'    => 'publish',
				) );
				if ( $the_query->have_posts() ):
			?>
			<ul class="c-newslist">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li class="c-newslist_item">
					<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
						<span class="c-newslist_ttl">NEWS</span>
						<?php mark_new_post( 7, '<span class="c-newslist_labelt">NEW</span>' ); ?>
						<span class="c-newslist_date"><?php the_time( 'Y.m.d' ); ?></span>
						<span class="c-newslist_title"><?php the_title() ?></span>
						<span class="c-newslist_more"></span>
					</a>
				</li> <!--End .c-newslist_item-->
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>
		</div>
	</section><!-- End top_news-->

	<section class="top_commitment">
		<div class="l-cont">
			<h2 class="c-title02">
                <span class="c-title02_eng u-white">challenging</span>
                <span class="c-title02_jp">私たちが出来る最大限のサービスを<br>より多くの人たちへ</span>
			</h2>
			<p class="sc01_text u-center">株式会社KMDは、さまざまな人との繋がりによって成長して来た会社です。だからこそ、チームワークを大切にしていきたい。一つひとつの仕事に対し真剣に向き合い、結果を残し、より高度な仕事にチャレンジしていきたいと思っています。</p>
			<div class="c-btn01 c-btn01_center">
				<a href="<?php bloginfo( 'url' ); ?>/commitment/">COMMITMENT</a>
			</div>
		</div>
	</section><!-- End top_commitment-->

	<section class="top_trouble">
		<div class="l-cont">
			<h2 class="c-title02">
                <span class="c-title02_eng">trouble</span>
                <span class="c-title02_jp">店舗・厨房の換気・排気・匂いに<br>お困りではありませんか？</span>
			</h2>
		</div>

		<div class="p-sc01">
            <div class="p-sc01_inner l-cont">
                <div class="sc01 right sc01_service">
                    <figure class="sc01_img"><img src="<?php bloginfo('template_directory'); ?>/img/top/img_service.jpg" alt="店舗や厨房の吸排気工事をトータルサポート"></figure>
                    <div class="sc01_content">
                        <h3 class="c-title03">
                            <span class="c-title03_eng">TOTAL SUPPORT</span>
                            <span class="c-title03_jp">店舗や厨房の吸排気工事を<br>トータルサポート</span>
                        </h3>
						<p class="sc01_text">株式会社KMDは、工場給排気、各種店舗給排気設備、集塵設備、テーブルフード煙快、ダクト・排気ファン清掃等、設計・施工・販売までトータルサポートいたします。<br>全国一円どこでも工事をお承り致します。<br>お見積もり無料！ご相談ご質問等お気軽にお問合わせ下さい。</p>
						<div class="c-btn01">
							<a href="<?php bloginfo( 'url' ); ?>/service/">service</a>
						</div>
                    </div>
                </div>
            </div>
		</div><!-- End p-sc01-->

		<div class="p-sc01">
            <div class="p-sc01_inner l-cont">
                <div class="sc01 left sc01_company">
                    <figure class="sc01_img"><img src="<?php bloginfo('template_directory'); ?>/img/top/img_company.jpg" alt="私たちについて"></figure>
                    <div class="sc01_content">
                        <h3 class="c-title03">
                            <span class="c-title03_eng">ABOUT</span>
                            <span class="c-title03_jp">私たちについて</span>
                        </h3>
						<p class="sc01_text">KMDは空調用から換気用、排煙用、厨房用、産業用まで、さまざまなダクト工事を行う空調ダクト工事の専門会社です。知識や経験の積み重ねをチーム力の力に反映させることで、お客様のニーズにお応えしています。</p>
						<div class="c-btn01">
							<a href="<?php bloginfo( 'url' ); ?>/company/">company</a>
						</div>
                    </div>
                </div>
            </div>
        </div><!-- End p-sc01-->
	</section><!-- End top_trouble-->

	<section class="top_construction">
		<div class="l-cont">
			<h2 class="c-title02">
                <span class="c-title02_eng">construction</span>
                <span class="c-title02_jp">施工事例</span>
			</h2>

			<?php
        $the_query = new WP_Query( array(
            'post_type'      => 'post',
            'category_name'  => 'construction',
            'posts_per_page' => 4,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status'    => 'publish',
        ) );
        if ( $the_query->have_posts() ):
        ?>

			<ul class="c-list01">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<div class="c-list01_img">
								<?php $gallery = get_field( 'gallery' ); ?>
								<?php if ( $image = get_field( 'image' ) ): ?>
									<img src="<?php echo $image['sizes']['img245x245']; ?>" alt="<?php the_title_attribute(); ?>">
								<?php elseif ( $after = get_field( 'image_after' )  ): ?>
									<img src="<?php echo $after['sizes']['img245x245']; ?>" alt="<?php the_title_attribute(); ?>">
								<?php else: ?>
									<img src="<?php bloginfo( 'template_directory' ); ?>/img/common/img245x245.jpg" alt="<?php the_title_attribute(); ?>">
								<?php endif; ?>
							</div>
							<h3 class="c-title04">
									<span class="c-title04_t"><?php the_time( 'Y.m.d' ); ?></span>
									<span class="c-title04_b"><?php the_title() ?></span>
							</h3>
						</a>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
			<div class="c-btn01 c-btn01_center">
				<a href="<?php bloginfo( 'url' ); ?>/construction/">more</a>
			</div>
			<?php else: ?>
            <p class="text-center">※施工実績の情報が整い次第、掲載いたしますので、お待ちください。</p>
        <?php endif; ?>
		</div>
	</section><!-- End top_construction-->

	<section class="top_recruit">
		<div class="l-cont">
			<h2 class="c-title02">
                <span class="c-title02_eng u-white">recruit</span>
                <span class="c-title02_jp">採用案内</span>
			</h2>
		</div>

		<div class="p-sc01">
            <div class="p-sc01_inner l-cont">
                <div class="sc01 right sc01_recruit">
                    <figure class="sc01_img"><img src="<?php bloginfo('template_directory'); ?>/img/top/img_recruit.jpg" alt="モノづくりの面白さを感じられるお仕事です"></figure>
                    <div class="sc01_content">
                        <h3 class="c-title03">
                            <span class="c-title03_eng">MAIN WORKS</span>
                            <span class="c-title03_jp">モノづくりの面白さを感じられるお仕事です</span>
                        </h3>
						<p class="sc01_text">私たちの手掛けるダクト工事は、お客様が使う環境を改善する重要な工事です。<br>一つのチームとして、仲間として。私たちと一緒に、その感覚を味わって見ませんか？</p>
						<div class="c-btn01">
							<a href="<?php bloginfo( 'url' ); ?>/recruit/">recruit</a>
						</div>
                    </div>
                </div>
            </div>
		</div><!-- End p-sc01-->

		<div class="p-sc01">
            <div class="p-sc01_inner l-cont">
                <div class="sc01 left sc01_staff">
                    <figure class="sc01_img"><img src="<?php bloginfo('template_directory'); ?>/img/top/img_staff.png" alt="先輩社員のメッセージ"></figure>
                    <div class="sc01_content">
                        <h3 class="c-title03">
                            <span class="c-title03_eng">staff</span>
                            <span class="c-title03_jp">先輩社員のメッセージ</span>
                        </h3>
						<p class="sc01_text">仕事のやりがいや将来の目標など、当社で働く先輩社員からのメッセージをご覧ください。</p>
						<div class="c-btn01">
							<a href="<?php bloginfo( 'url' ); ?>/staff/">staff</a>
						</div>
                    </div>
                </div>
            </div>
        </div><!-- End p-sc01-->
	</section><!-- End top_trouble-->

	<section class="top_other">
		<div class="top_other__list">
			<div class="top_other__item">
				<div class="top_other__img">
					<img src="<?php bloginfo('template_directory'); ?>/img/top/img_flow.jpg" alt="WORK FLOW 一日の流れ">
				</div>
				<div class="top_other__content">
					<h3 class="c-title05">
						<span class="c-title05_eng">WORK FLOW</span>
						<span class="c-title05_jp">一日の流れ</span>
					</h3>
					<div class="c-btn01 c-btn01_center">
						<a href="<?php bloginfo( 'url' ); ?>/workflow/">more</a>
					</div>
				</div>
			</div><!-- End top_other__item-->

			<div class="top_other__item">
				<div class="top_other__img">
					<img src="<?php bloginfo('template_directory'); ?>/img/top/img_faq.jpg" alt="Q&A よくある質問">
				</div>
				<div class="top_other__content">
					<h3 class="c-title05">
						<span class="c-title05_eng">Q&A</span>
						<span class="c-title05_jp">よくある質問</span>
					</h3>
					<div class="c-btn01 c-btn01_center">
						<a href="<?php bloginfo( 'url' ); ?>/faq/">more</a>
					</div>
				</div>
			</div><!-- End top_other__item-->
		</div>
		<div class="l-cont">
			<div class="top_other__link">
				<a href="<?php bloginfo( 'url' ); ?>/recruit/#recruit03"><img src="<?php bloginfo('template_directory'); ?>/img/top/img_link.png" alt="株式会社ＫＭＤ"></a>
			</div>
		</div>
	</section><!-- End top_other-->

	<section class="top_recruitment">
		<div class="l-cont">
			<h2 class="c-title02">
				<span class="c-title02_eng">recruitment</span>
				<span class="c-title02_jp">募集要項</span>
			</h2>
			<?php
				$the_query = new WP_Query( array(
					'post_type'      => 'post',
					'category_name'  => 'recruit-detail',
					'posts_per_page' => 3,
					'orderby'        => 'date',
					'order'          => 'DESC',
					'post_status'    => 'publish',
				) );
				if ( $the_query->have_posts() ):
			?>
			<ul class="c-newslist">
				<?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
				<li class="c-newslist_item">
					<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
						<?php mark_new_post( 7, '<span class="c-newslist_label">NEW</span>' ); ?>
						<span class="c-newslist_date"><?php the_time( 'Y.m.d' ); ?></span>
						<span class="c-newslist_title"><?php the_title() ?></span>
					</a>
				</li> <!--End .c-newslist_item-->
				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			</ul>
			<div class="c-btn01 c-btn01_center">
				<a href="<?php bloginfo( 'url' ); ?>/recruit/">more</a>
			</div>
			<?php else: ?>

			<p class="text-center">※只今、当社では新規の募集は行っておりません。<br>採用情報が整い次第、掲載いたしますので、お待ちください。</p>

			<?php endif; ?>
		</div>
	</section><!-- End top_recruitment-->
</main>

<?php get_footer(); ?>
