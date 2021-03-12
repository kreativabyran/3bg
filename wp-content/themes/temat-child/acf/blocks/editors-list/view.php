<?php
	$args       = array(
		'orderby'             => 'display_name',
		'has_published_posts' => array( 'post' ),
		'order'               => 'ASC',
	);
	$user_query = new WP_User_Query( $args );
	$users      = $user_query->get_results();
	?>
<?php if ( $users ) : ?>
	<?php $count = 0; ?>
	<?php foreach ( $users as $user ) : ?>
		<?php echo $count++ % 3 === 0 ? '<div class="row">' : ''; ?>
			<article id="author-<?php echo $user->data->ID; ?>" class="col-sm-4 col-xs-12 author">
				<a href="<?php echo esc_url( get_author_posts_url( $user->data->ID ) ); ?>" target="_self">
					<?php $thumbnail = wp_get_attachment_image( get_field( 'acf_avatar', 'user_' . $user->data->ID ), 'articleThumbnail' ); ?>
					<?php if ( $thumbnail ) : ?>
						<figure>
							<?php echo $thumbnail; ?>
						</figure>
					<?php endif; ?>
					<h3><?php echo esc_html( $user->data->display_name ); ?></h3>
					<a href="#"><?php esc_html_e( 'Mer om oss', 'temat-child' ); ?></a>
				</a>
			</article>
		<?php echo $count % 3 === 0 || $count === count( $users ) ? '</div>' : ''; ?>
	<?php endforeach; ?>

	<?php
endif;
