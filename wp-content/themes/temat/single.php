<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part( 'template-parts/templates/content-single' ); ?>
			<aside>
				<div class="container">
					<div class="row">
						<div class="col-12">
							<?php
							the_post_navigation(
								array(
									'prev_text' => 'previous post - %title',
									'next_text' => 'next post - %title',
								)
							);
							?>
						</div>
					</div>
				</div>
				<?php if ( comments_open() || get_comments_number() ) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>
			</aside>
		<?php endwhile; ?>
	</main>
</div>
<?php
get_footer();
