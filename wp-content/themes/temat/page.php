<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part( 'template-parts/templates/content', 'page' ); ?>
				<?php if ( comments_open() || get_comments_number() ) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>
		<?php endwhile; ?>
	</main>
</div>
<?php
get_footer();
