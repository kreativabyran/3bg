<?php get_header(); ?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<h1 class="page-title">
								<?php printf( esc_html__( 'Search Results for: %s', 'temat' ), '<span>' . get_search_query() . '</span>' ); ?>
							</h1>
						</header>
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<?php get_template_part( 'template-parts/content', 'search' ); ?>
						<?php endwhile; ?>
						<?php the_posts_navigation(); ?>
					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</main>
</section>
<?php
get_footer();
