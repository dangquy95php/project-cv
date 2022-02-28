<section class="c-recommend u-bg01">
    <div class="l-container">
        <h2 class="c-title01 c-title01--blue">
            <span class="c-title01__big">おすすめ記事</span>
        </h2>
		<?php
		global $type;

		///////////////////////////////////////////////////////
		// hr_news
		///////////////////////////////////////////////////////
		if ( $type == "hr_news" ) {

			$featured_post = get_field( 'single_postList_hr_news' );
			if ( $featured_post ) { ?>
                <ul class="c-list02 field">
					<?php foreach ( $featured_post as $post ) : setup_postdata( $post );
						if ( get_post_status( $post ) == 'publish' ) {
							component_loop_1();
						}
					endforeach;
					wp_reset_postdata(); ?>
                </ul>
			<?php } else { ?>
				<?php
				$the_query = new WP_Query( array(
					'posts_per_page' => 3,
					'post_type'      => 'hr_news',
					'post_status'    => 'publish',
				) );
				if ( $the_query->have_posts() ) : ?>
                    <ul class="c-list02 query">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php component_loop_1(); ?>
						<?php endwhile; ?>
                    </ul>
				<?php endif; ?>
			<?php } ?>


			<?php
			///////////////////////////////////////////////////////
			// gyomu_kaizen
			///////////////////////////////////////////////////////
		} elseif ( $type == "gyomu_kaizen" ) {

			$featured_post = get_field( 'single_postList_gyomu_kaizen' );
			if ( $featured_post ) { ?>
                <ul class="c-list02 field">
					<?php foreach ( $featured_post as $post ) : setup_postdata( $post );
						if ( get_post_status( $post ) == 'publish' ) {
							component_loop_1();
						}
					endforeach;
					wp_reset_postdata(); ?>
                </ul>
			<?php } else { ?>
				<?php
				$the_query = new WP_Query( array(
					'posts_per_page' => 3,
					'post_type'      => 'gyomu_kaizen',
					'post_status'    => 'publish',
				) );
				if ( $the_query->have_posts() ) : ?>
                    <ul class="c-list02 query">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php component_loop_1(); ?>
						<?php endwhile; ?>
                    </ul>
				<?php endif; ?>
			<?php } ?>


			<?php
			///////////////////////////////////////////////////////
			// product_case
			///////////////////////////////////////////////////////
		} elseif ( $type == "product_case" ) {

			$featured_post = get_field( 'single_postList_product_case' );
			if ( $featured_post ) { ?>
                <ul class="c-list12 field">
					<?php foreach ( $featured_post as $post ) : setup_postdata( $post );
						if ( get_post_status( $post ) == 'publish' ) {
							component_loop_13();
						}
					endforeach;
					wp_reset_postdata(); ?>
                </ul>
			<?php } else { ?>
				<?php
				$the_query = new WP_Query( array(
					'posts_per_page' => 3,
					'post_type'      => 'product_case',
					'post_status'    => 'publish',
				) );
				if ( $the_query->have_posts() ) : ?>
                    <ul class="c-list12 query">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php component_loop_13(); ?>
						<?php endwhile; ?>
                    </ul>
				<?php endif; ?>
			<?php } ?>

			<?php
			///////////////////////////////////////////////////////
			// faq_column
			///////////////////////////////////////////////////////
		} elseif ( $type == "faq_column" ) {

			$featured_post = get_field( 'single_postList_faq_column' );
			if ( $featured_post ) { ?>
                <ul class="c-list04 field">
					<?php foreach ( $featured_post as $post ) : setup_postdata( $post );
						if ( get_post_status( $post ) == 'publish' ) {
							component_loop_2();
						}
					endforeach;
					wp_reset_postdata(); ?>
                </ul>
			<?php } else { ?>
				<?php
				$the_query = new WP_Query( array(
					'posts_per_page' => 3,
					'post_type'      => 'faq_column',
					'post_status'    => 'publish',
				) );
				if ( $the_query->have_posts() ) : ?>
                    <ul class="c-list04 query">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php component_loop_2(); ?>
						<?php endwhile; ?>
                    </ul>
				<?php endif; ?>

			<?php } ?>

			<?php
			///////////////////////////////////////////////////////
			// glossary
			///////////////////////////////////////////////////////
		} elseif ( $type == "glossary" ) {

			$featured_post = get_field( 'single_postList_glossary' );
			if ( $featured_post ) { ?>
                <ul class="c-list02 field">
					<?php foreach ( $featured_post as $post ) : setup_postdata( $post );
						if ( get_post_status( $post ) == 'publish' ) {
							component_loop_3();
						}
					endforeach;
					wp_reset_postdata(); ?>
                </ul>
			<?php } else { ?>
				<?php
				$the_query = new WP_Query( array(
					'posts_per_page' => 3,
					'post_type'      => 'glossary',
					'post_status'    => 'publish',
				) );
				if ( $the_query->have_posts() ) : ?>
                    <ul class="c-list02 query">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php component_loop_3(); ?>
						<?php endwhile; ?>
                    </ul>
				<?php endif; ?>

			<?php } ?>


			<?php
			///////////////////////////////////////////////////////
			// tool_guide
			///////////////////////////////////////////////////////
		} elseif ( $type == "tool_guide" ) {

			$featured_post = get_field( 'single_postList_tool_guide' );
			if ( $featured_post ) { ?>
                <ul class="c-list02 field">
					<?php foreach ( $featured_post as $post ) : setup_postdata( $post );
						if ( get_post_status( $post ) == 'publish' ) {
							component_loop_1();
						}
					endforeach;
					wp_reset_postdata(); ?>
                </ul>
			<?php } else { ?>
				<?php
				$the_query = new WP_Query( array(
					'posts_per_page' => 3,
					'post_type'      => 'tool_guide',
					'post_status'    => 'publish',
				) );
				if ( $the_query->have_posts() ) : ?>
                    <ul class="c-list02 query">
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php component_loop_1(); ?>
						<?php endwhile; ?>
                    </ul>
				<?php endif; ?>

			<?php } ?>

		<?php } ?>

    </div>
</section>