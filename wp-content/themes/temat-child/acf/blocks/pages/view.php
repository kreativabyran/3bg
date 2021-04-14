<div class="pages" <?php echo get_field( 'block_id' ) ? 'id="' . get_field( 'block_id' ) . '"' : ''; ?>>
	<div class="container">
		<?php $posts = get_field( 'repeater_field' ); ?>
		<?php $count = 0; ?>
		<?php foreach ( $posts as $page ) : ?>
			<?php echo $count++ % 3 === 0 ? '<div class="row">' : ''; ?>
				<a class="col-xs-12 col-md-4" href="<?php echo get_the_permalink( $page['page']->ID ); ?>" target="_self">
					<article>
						<?php $image = wp_get_attachment_image( get_post_thumbnail_id( $page['page']->ID ), 'articleThumbnail' ); ?>
						<?php if ( $image ) : ?>
							<figure>
								<?php echo $image; ?>
							</figure>
						<?php endif; ?>
						<h2><?php echo esc_html( $page['page']->post_title ); ?></h2>
						<div><?php echo apply_filters( 'the_excerpt', $page['page']->post_excerpt ); ?></div>
						<div class="is-style-arrowlink"><?php pll_e( 'Läs mer' ); ?></div>
					</article>
				</a>
			<?php echo $count % 3 === 0 || count( $posts ) === $count ? '</div>' : ''; ?>
		<?php endforeach; ?>

	</div>
</div>
