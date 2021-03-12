<?php if ( is_admin() && ( defined( 'DOING_AJAX' ) ) ) : ?>
	<div style="border:1px solid green;padding:1rem">
	<em><?php echo esc_html( 'Visas om aktiv', 'temat-child' ); ?></em>
<?php endif; ?>
<?php if ( ( is_admin() && ( defined( 'DOING_AJAX' ) ) ) || is_user_active() ) : ?>
<InnerBlocks  />
<?php endif; ?>
<?php if ( is_admin() && ( defined( 'DOING_AJAX' ) ) ) : ?>
	</div>
<?php endif; ?>
