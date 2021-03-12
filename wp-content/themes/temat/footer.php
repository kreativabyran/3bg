			</div>
			<footer id="colophon" class="site-footer">
				<div class="container">
					<?php if ( is_active_sidebar( 'footer_column_left' ) || is_active_sidebar( 'footer_column_right' ) ) : ?>
						<div class="row">
							<?php if ( is_active_sidebar( 'footer_column_left' ) ) : ?>
								<?php if ( is_active_sidebar( 'footer_column_right' ) ) : ?>
									<div class="col-md-6 col-sm-6">
								<?php else : ?>
									<div class="col-md-12">
								<?php endif; ?>
									<?php dynamic_sidebar( 'footer_column_left' ); ?>
								</div>
							<?php endif; ?>
							<?php if ( is_active_sidebar( 'footer_column_right' ) ) : ?>
								<?php if ( is_active_sidebar( 'footer_column_left' ) ) : ?>
									<div class="col-md-6 col-sm-6">
								<?php else : ?>
									<div class="col-md-12">
								<?php endif; ?>
									<?php dynamic_sidebar( 'footer_column_right' ); ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'copyright' ) ) : ?>
						<div class="row">
							<div class="col-md-12 copyright">
								<?php dynamic_sidebar( 'copyright' ); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
		<span id="scroll_to_top"></span>
	</body>
</html>
