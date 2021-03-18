<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Temat_2.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php echo esc_attr( get_the_permalink( get_the_ID() ) ); ?>" target="_self">
		<?php $image = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), 'articleThumbnail' ); ?>
		<?php if ( $image ) : ?>
		<figure>
			<?php echo $image; ?>
		</figure>
		<?php endif; ?>
		<div class="entry-header">
			<div class="date">
				<?php echo get_the_date(); ?>
			</div>
			<?php echo esc_html( get_the_title() ); ?>
		</div>
		<div class="entry-content">
			<?php echo wp_kses_post( get_the_excerpt() ); ?>
		</div>
	</a>
</article>
