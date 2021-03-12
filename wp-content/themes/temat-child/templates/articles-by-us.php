<?php $current_user = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>
<section class="posts">
	<div class="container">
		<?php
		$args = array(
			'author'           => $current_user->ID,
			'orderby'          => 'post_date',
			'order'            => 'ASC',
			'post_type'        => 'post',
			'posts_per_page'   => -1,
			'post_status'      => 'publish',
			'suppress_filters' => true,
		);
		?>

		<?php $posts = get_posts( $args ); ?>

		<?php if ( $posts ) : ?>
			<?php $count = 0; ?>

			<div class="row">
				<div class="col-xs-12">
					<h3><?php esc_html_e( 'Artiklar skrivna av oss', 'temat-child' ); ?></h3>
				</div>
			</div>

			<?php foreach ( $posts as $post ) : ?>
				<?php echo $count++ % 3 === 0 ? '<div class="row">' : ''; ?>
				<?php echo t_get_blog_post_article( $post, 'col-sm-4 col-xs-12 post type-post' ); ?>
				<?php echo ( ( $count % 3 === 0 ) || ( count( $posts ) === $count ) ) ? '</div>' : ''; ?>
			<?php endforeach; ?>

		<?php else : ?>

			<div class="row">
				<div class="col-xs-12">
					<h3><?php esc_html_e( 'Redaktionen har inte skrivit några artiklar.', 'temat-child' ); ?></h3>
				</div>
			</div>

		<?php endif; ?>
	</div>
</section>
