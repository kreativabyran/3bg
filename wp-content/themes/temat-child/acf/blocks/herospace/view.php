<?php $image = wp_get_attachment_image_src( get_field( 'background' ), 'full' ); ?>
<div <?php echo $image ? 'style="background-image:url(' . $image[0] . ')"' : ''; ?>  class="header<?php echo get_field( 'background_type' ) === 'short' ? ' short' : ''; ?>" <?php echo get_field( 'block_id' ) ? 'id="' . get_field( 'block_id' ) . '"' : ''; ?>>
	<div class="container">
		<div class="row">
			<div class="col-xs-9 col-sm-6 col-md-4 header-col">
				<?php $text = get_field( 'text' ); ?>
				<?php if ( $text ) : ?>
					<?php echo apply_filters( 'the_content', get_field( 'text' ) ); ?>
				<?php endif; ?>
				<?php $button = get_field( 'button' ); ?>
				<?php if ( $button ) : ?>
					<a
						role="button"
						href="<?php echo esc_attr( $button['url'] ); ?>"
						target="<?php echo $button['target'] === '_blank' ? '_blank' : '_self'; ?>">
						<?php echo esc_html( $button['title'] ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
