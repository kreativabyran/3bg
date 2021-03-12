<?php
$slides = get_field( 'repeater' ); ?>
<?php if ( $slides ) : ?>
	<div class="slider" <?php echo get_field( 'block_id' ) ? 'id="' . get_field( 'block_id' ) . '"' : ''; ?>>
		<?php foreach ( $slides as $slide ) : ?>
			<div>
				<?php echo wp_kses_post( $slide['text_contents'] ); ?>
				<?php echo esc_html( $slide['quote_name'] ); ?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
