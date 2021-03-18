<?php get_header(); ?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'templates/content-search' );
						endwhile;
							the_posts_navigation();
					else :
						get_template_part( 'templates/content-none' );
					endif;
					?>
				</div>
			</div>
		</div>
	</main>
</section>
<?php
get_footer();
