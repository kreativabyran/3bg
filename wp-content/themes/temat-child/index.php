<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</div>
						</div>
					</div>
				</header>
			<?php endif; ?>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<?php get_template_part( 'template-parts/templates/content-blog' ); ?>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
			<?php the_posts_navigation(); ?>
		<?php endif; ?>
	</main>
</div>
<?php
get_footer();
