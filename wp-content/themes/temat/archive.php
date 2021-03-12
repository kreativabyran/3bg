<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
						</div>
					</div>
				</div>
			</header>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<?php get_template_part( 'template-parts/templates/content-archive' ); ?>
						<?php endwhile; ?>
					</div>
					<div class="col-md-4 col-sm-12">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
			<?php the_posts_navigation(); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/templates/content', 'none' ); ?>
		<?php endif; ?>
	</main>
</div>
<?php
get_footer();
