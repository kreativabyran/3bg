<?php
$args = array(
	'numberposts'      => 3,
	'orderby'          => 'rand',
	'meta_key'         => 'post_meta_boxgratisartikel',
	'meta_value'       => 'on',
	'post_type'        => 'post',
	'suppress_filters' => true,
	'post_status'      => 'publish',
);
?>
<?php $posts = get_posts( $args ); ?>
<?php if ( $posts ) : ?>
<div class="free-article" <?php echo get_field( 'block_id' ) ? 'id="' . get_field( 'block_id' ) . '"' : ''; ?>>
	<div class="row">
		<?php foreach ( $posts as $post ) : ?>
			<?php if ( get_post_meta( $post->ID, 'post_meta_boxgratisartikel', true ) !== 'on' ) : ?>
				<?php continue; ?>
			<?php endif; ?>
			<?php echo t_get_blog_post_article( $post, 'col-sm-4 col-xs-12 post type-post' ); ?>
		<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>
