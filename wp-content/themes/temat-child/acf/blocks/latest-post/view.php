<?php
$args = array(
	'numberposts'      => 3,
	'post_type'        => 'post',
	'suppress_filters' => true,
	'post_status'      => 'publish',
);
?>
<?php $posts = get_posts( $args ); ?>
<?php if ( $posts ) : ?>
<div class="latest-article" <?php echo get_field( 'block_id' ) ? 'id="' . get_field( 'block_id' ) . '"' : ''; ?>>
	<div class="row">
		<?php foreach ( $posts as $post ) : ?>
			<?php if ( get_post_meta( $post->ID, 'post_meta_boxgratisartikel', true ) !== 'on' ) : ?>
				<?php continue; ?>
			<?php endif; ?>
			<?php echo t_get_blog_post_article( $post, 'col-sm-4 col-xs-12 post type-post' ); ?>
		<?php endforeach; ?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<a href="<?php echo esc_html( get_the_permalink( get_option( 'page_for_posts' ) ) ); ?>" target="_self"><?php esc_html_e( 'Alla artiklar', 'temat-child' ); ?></a>
		</div>
	</div>
</div>
<?php endif; ?>
