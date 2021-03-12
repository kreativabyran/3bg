<?php
$terms = get_terms(
	array(
		'taxonomy'   => 'category',
		'hide_empty' => true,
	)
);
?>
<?php if ( $terms ) : ?>
	<?php
	shuffle( $terms );
	$terms = array_slice( $terms, 0, 6 );
	?>
	<?php $background = wp_get_attachment_image_url( get_field( 'image' ), 'full' ); ?>
<div <?php echo $background ? 'style="background-image:url(' . $background . ')"' : ''; ?> class="categories" <?php echo get_field( 'block_id' ) ? 'id="' . get_field( 'block_id' ) . '"' : ''; ?>>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h3><?php esc_html_e( 'Kategorier', 'temat-child' ); ?></h3>
			</div>
		</div>
		<div class="row">
			<?php foreach ( $terms as $term ) : ?>
				<a
					class="<?php echo esc_html( $term->slug ); ?>"
					id="term-<?php echo esc_html( $term->term_id ); ?>"
					href="<?php echo esc_html( get_the_permalink( get_option( 'page_for_posts' ) ) . '?cat[]=' . $term->term_id ); ?>"
					target="_self">
						<?php echo esc_html( $term->name ); ?>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<a
					href="<?php echo esc_html( get_the_permalink( get_option( 'page_for_posts' ) ) . '?open=true' ); ?>"
					target="_self"><?php esc_html_e( 'alla kategorier', 'temat-child' ); ?></a>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
