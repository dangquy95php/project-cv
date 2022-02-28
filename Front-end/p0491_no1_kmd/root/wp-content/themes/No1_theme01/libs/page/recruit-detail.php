<section class="recruit-detail_sc">
	<div class="l-cont">
		<h2 class="c-title02">
			<span class="c-title02_eng">recruitment</span>
			<span class="c-title02_jp"><?php the_title(); ?></span>
		</h2>

		<?php if( have_rows('recruit_detail') ): ?>

		<table class="main_table">

			<?php while ( have_rows( 'recruit_detail' ) ) : the_row(); ?>

			<tr>
				<th><?php the_sub_field( 'title' ); ?></th>
				<td><?php the_sub_field( 'content' ); ?></td>
			</tr>

			<?php endwhile; ?>

		</table><!-- End main_table -->

		<?php endif; ?>

		<div class="c-combtn c-combtn_center">
			<div class="c-btn02 c-btn02_l"><a href="<?php bloginfo( 'url' ); ?>/recruit/">一覧へ戻る</a></div>
			<div class="c-btn02 c-btn02_r"><a href="<?php bloginfo( 'url' ); ?>/contact/">応募する</a></div>
		</div>
	</div>
</section><!-- End recruit-detail_sc-->