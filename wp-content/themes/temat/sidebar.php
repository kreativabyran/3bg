<?php
if ( ! is_active_sidebar( 'archive' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'archive' ); ?>
</aside>
