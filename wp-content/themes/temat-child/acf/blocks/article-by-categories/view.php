<?php
$args = array(
	'numberposts'      => 3,
	'orderby'          => 'rand',
	'post_type'        => 'post',
	'suppress_filters' => true,
	'post_status'      => 'publish',
);
?>
<?php
if ( get_field( 'cat_select' ) ) :
	$args['category_name'] = get_field( 'cat_select' );
endif;
?>
<?php $posts = get_posts( $args ); ?>
<?php if ( $posts ) : ?>
<div class="article" <?php echo get_field( 'block_id' ) ? 'id="' . get_field( 'block_id' ) . '"' : ''; ?>>
	<div class="row">
		<?php foreach ( $posts as $post ) : ?>
			<?php echo t_get_blog_post_article( $post, 'col-sm-4 col-xs-12 post type-post' ); ?>
		<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>
