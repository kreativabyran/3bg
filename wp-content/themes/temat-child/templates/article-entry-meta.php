<?php
$args = array(
	'numberposts'      => 3,
	'orderby'          => 'rand',
	'post_type'        => 'post',
	'suppress_filters' => true,
	'post_status'      => 'publish',
);

$args['category'] = wp_get_post_categories( get_the_ID() );

if ( ! is_user_active() ) :
	$args['meta_key']   = 'post_meta_boxgratisartikel';
	$args['meta_value'] = 'on';
endif;

?>
<?php $posts = get_posts( $args ); ?>
<aside>
<?php if ( $posts ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php if ( ! is_user_active() ) : ?>
					<h4><?php esc_html_e( 'Fler gratisartiklar', 'temat-child' ); ?></h4>
				<?php else : ?>
					<h4><?php esc_html_e( 'Fler artiklar ur samma kategori', 'temat-child' ); ?></h4>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<?php foreach ( $posts as $post ) : ?>
				<?php echo t_get_blog_post_article( $post, 'col-sm-4 col-xs-12 post type-post' ); ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<?php if ( get_field( 'free_article_text', 'options' ) ) : ?>
					<?php echo apply_filters( 'the_content', get_field( 'free_article_text', 'options' ) ); ?>
				<?php endif; ?>
			</div>
			<div class="col-sm-6 col-xs-12">
				<?php echo t_get_order_today(); ?>
			</div>
		</div>
	</div>
</aside>
