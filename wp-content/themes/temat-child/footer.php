</div>
			<footer id="colophon" class="site-footer">
				<div class="container">
					<div class="row">
						<?php
							global $post;
							$pagetype = get_post_meta( $post->ID, 'page_options_sidtyp', true );
						?>
						<?php echo get_page_footer( $pagetype ); ?>
					</div>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
