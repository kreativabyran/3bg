<?php $image = wp_get_attachment_image_src( get_field( 'background' ), 'full' ); ?>
<div <?php echo $image ? 'style="background-image:url(' . $image[0] . ')"' : ''; ?> class="header" <?php echo get_field( 'block_id' ) ? 'id="' . get_field( 'block_id' ) . '"' : ''; ?>>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php $text = get_field( 'text' ); ?>
				<?php if ( $text ) : ?>
					<?php echo apply_filters( 'the_content', get_field( 'text' ) ); ?>
				<?php endif; ?>
				<?php $button = get_field( 'button' ); ?>
				<?php if ( $button ) : ?>
					HELLO WORLD
					<?php print_r( $button ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
