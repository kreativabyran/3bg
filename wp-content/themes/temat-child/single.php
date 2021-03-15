<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-xs-12">
							<article>
								<?php the_content(); ?>
							</article>
						</div>
						<div class="col-sm-4 col-xs-12">
							<aside>
								Sidebar
							</aside>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
	</main>
</div>
<?php
get_footer();
