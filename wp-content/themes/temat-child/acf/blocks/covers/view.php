<?php
$args  = array(
	'numberposts'      => -1,
	'order'            => 'DESC',
	'meta_key'         => 'cover_options_publiceringsdatum',
	'orderby'          => 'meta_value',
	'post_type'        => 'covers',
	'suppress_filters' => true,
	'post_status'      => 'publish',
);
$posts = get_posts( $args );
if ( $posts ) :

	$sorted_articles = array();
	$year            = 0;
	foreach ( $posts as $post ) :

		$date      = get_post_meta( $post->ID, 'cover_options_publiceringsdatum', true );
		$post_year = strftime( '%G', strtotime( $date ) );

		if ( $post_year !== $year ) :
			$sorted_articles[ $post_year ] = array();
			$year                          = $post_year;
		endif;
		array_push( $sorted_articles[ $post_year ], $post );
	endforeach;
	?>
		<?php $uniqid = uniqid(); ?>
		<div class="years" id="<?php echo $uniqid; ?>">
			<?php $year_count = 0; ?>
			<?php foreach ( $sorted_articles as $key => $posts ) : ?>
				<div class="year <?php echo $year_count++ > 1 ? 'hidden' : ''; ?>">
					<div class="row">
						<div class="col-xs-12">
							<h3 class="h1"><?php echo esc_html( 'Omslag', 'temat-child' ); ?> <?php echo esc_html( $key ); ?></h3>
						</div>
					</div>
					<?php $count = 0; ?>
					<?php foreach ( $posts as $post ) : ?>
						<?php echo $count++ % 4 === 0 ? '<div class="row">' : ''; ?>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<?php $image = wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
								<?php if ( $image ) : ?>
									<figure>
										<?php echo $image; ?>
									</figure>
								<?php else : ?>
									<div class="date">
										<?php setlocale( LC_TIME, 'swedish' ); ?>
										<?php esc_html_e( 'Kommer', 'temat-child' ); ?>
										<?php echo strftime( '%B %G', strtotime( esc_html( get_post_meta( $post->ID, 'cover_options_publiceringsdatum', true ) ) ) ); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php echo $count % 4 === 0 || $count === count( $posts ) ? '</div>' : ''; ?>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<button class="show-more-covers pr-btn" type="button" data-id="<?php echo $uniqid; ?>"><?php echo esc_html( 'Visa fler omslag', 'temat-child' ); ?></button>
			</div>
		</div>
<?php endif; ?>
