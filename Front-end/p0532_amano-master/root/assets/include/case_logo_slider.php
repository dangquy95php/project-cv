<div class="c-brand">
	<?php
	if ( ! $case_logo_slider = get_field( 'case_list', 'option' ) ) {
		$case_logo_slider = array();
	}
	if ( count( $case_logo_slider ) ): ?>
        <ul class="c-brand__row is-type1">
		<?php
		$breakpoint = round( count( $case_logo_slider ) / 2 );
		$breakpoint = ( $breakpoint > 10 ) ? $breakpoint : 10;
		?>
		<?php foreach ( $case_logo_slider as $idx => $val ): ?>
			<?php
			$case_alt = isset( $val['case_logo_name'] ) ? $val['case_logo_name'] : '';

			$case_url = isset( $val['case_logo_postLink'] ) ? $val['case_logo_postLink'] : '';
			if ( $case_url && ( is_object( $case_url ) || is_numeric( $case_url ) ) ) {
				$case_url = get_the_permalink( $case_url );
			}

			$case_img = isset( $val['case_logo_img'] ) ? $val['case_logo_img'] : '';
			$case_img = ( is_array( $case_img ) && isset( $case_img['url'] ) ) ? $case_img['url'] : $case_img;
			if ( empty( $case_img ) ) {
				continue;
			}
			?>
            <li class="c-brand__item" data-slider-index="<?php echo( $idx + 1 ); ?>">
				<?php if ( empty( $case_url ) ): ?>
                    <img src="<?php echo esc_url( $case_img ); ?>" alt="<?php echo esc_attr( $case_alt ); ?>">
				<?php else: ?>
                    <a href="<?php echo esc_url( $case_url ) ?>">
                        <img src="<?php echo esc_url( $case_img ); ?>" alt="<?php echo esc_attr( $case_alt ); ?>">
                    </a>
				<?php endif; ?>
            </li>

			<?php if ( ( $idx + 1 ) == $breakpoint ): ?>
                </ul>
                <ul class="c-brand__row is-type2" dir="rtl">
			<?php endif; ?>

		<?php endforeach; ?>
        </ul>
	<?php endif; ?>
</div>
