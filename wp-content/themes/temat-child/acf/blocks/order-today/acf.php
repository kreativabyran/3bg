<?php

function t_get_order_today() {
	ob_start();
	?>
		<div class="order-today">
			<?php if ( get_field( 'order_text', 'options' ) ) : ?>
				<div class="text">
					<?php echo apply_filters( 'the_content', get_field( 'order_text', 'options' ) ); ?>
				</div>
			<?php endif; ?>
			<div class="price">
				<?php if ( get_field( 'order_price', 'options' ) ) : ?>
					<p><?php echo esc_html( get_field( 'order_price', 'options' ) ); ?></p>
				<?php endif; ?>
				<?php if ( get_field( 'order_button', 'options' ) ) : ?>
          <div>
            <a href="#" role="button" class="pr-btn">
              <?php echo esc_html( get_field( 'order_button', 'options' ) ); ?>
            </a>
          </div>

				<?php endif; ?>
			</div>
		</div>
	<?php
	return ob_get_clean();
}
