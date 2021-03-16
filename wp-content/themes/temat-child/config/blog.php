<?php

function t_get_latest_post( $exclude = false ) {
	$args = array(
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'numberposts'      => 5,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'suppress_filters' => true,
	);
	if ( $exclude ) :
		$args['exclude'] = $exclude;
	endif;
	$posts = get_posts( $args );
	if ( $posts ) :
		ob_start();
		?>
		<div class="latest-posts">
			<?php echo esc_html( 'SENASTE INLÄGGEN', 'temat-child' ); ?>
			<ul>
			<?php foreach ( $posts as $post ) : ?>
				<li>
					<a
						href="<?php echo esc_attr( get_the_permalink( $post->ID ) ); ?>"
						target="_self"><?php echo esc_html( $post->post_title ); ?>
					</a>
				</li>
			<?php endforeach; ?>
			</ul>
		</div>
		<?php
	endif;
	return ob_get_clean();
}
