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
					<div class="col-sm-8 col-xs-12">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<?php get_template_part( 'templates/content-blog' ); ?>
						<?php endwhile; ?>
					</div>
					<div class="col-sm-4 col-xs-12">
						<aside>
							<?php echo t_get_latest_post(); ?>
						</aside>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<?php the_posts_navigation(); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</main>
</div>
<?php
get_footer();
