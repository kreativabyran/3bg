</div>
			<footer id="colophon" class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-12 about">
							<?php if ( is_active_sidebar( 'footer_column_1' ) ) : ?>
								<?php dynamic_sidebar( 'footer_column_1' ); ?>
							<?php endif; ?>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<?php if ( is_active_sidebar( 'footer_column_2' ) ) : ?>
								<?php dynamic_sidebar( 'footer_column_2' ); ?>
							<?php endif; ?>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<h5><?php esc_html_e( 'Innehåll', 'temat-child' ); ?></h5>
							<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
								<?php
								wp_nav_menu(
									array(
										'container'      => false,
										'theme_location' => 'primary-menu',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
							<?php endif; ?>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<?php if ( is_active_sidebar( 'footer_column_3' ) ) : ?>
								<?php dynamic_sidebar( 'footer_column_3' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6 col-xs-12 left">
							<?php if ( is_active_sidebar( 'footer_column_bottom' ) ) : ?>
								<?php dynamic_sidebar( 'footer_column_bottom' ); ?>
							<?php endif; ?>
						</div>
						<div class="col-sm-6 col-xs-12 right">
							<?php if ( is_active_sidebar( 'copyright' ) ) : ?>
								<?php dynamic_sidebar( 'copyright' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
		<?php if ( is_singular( 'post' ) ) : ?>
			<script src="<?php echo TEMAT_CHILD_URI; ?>js/mediaelement-and-player.min.js"></script>
			<script src="<?php echo TEMAT_CHILD_URI; ?>js/jump-forward.js"></script>
			<script src="<?php echo TEMAT_CHILD_URI; ?>js/skip-back.js"></script>
			<script>
				var mediaElements = document.querySelectorAll('audio');
				for (var i = 0, total = mediaElements.length; i < total; i++) {
					var features = ['playpause', 'current', 'progress', 'duration', 'volume', 'skipback', 'jumpforward'];
					new MediaElementPlayer(mediaElements[i], {
						jumpForwardInterval: 15,
						skipBackInterval: 15,
						autoRewind: false,
						features: features,
					});
				}
				jQuery(document).ready(function($){
					if($('figure.wp-block-audio').length){
						var author=<?php echo json_encode( get_post_meta( get_queried_object_id(), 'post_meta_boxinlasning', true ) ); ?>;
						if(author){
							$('figure.wp-block-audio').append('<div class="reader">Inläst av: <strong>'+author+'</strong></div>');
						}
					}
				});
			</script>
		<?php endif; ?>
	</body>
</html>
