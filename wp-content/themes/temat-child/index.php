<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
			<?php if ( get_locale() === 'en_GB' ) : ?>
				<?php $text = get_field( 'blog_text_en', 'options' ); ?>
				<?php $image = wp_get_attachment_image_src( get_field( 'blog_bg_en', 'options' ), 'blogHeader' ); ?>
			<?php else : ?>
				<?php $text = get_field( 'blog_text', 'options' ); ?>
				<?php $image = wp_get_attachment_image_src( get_field( 'blog_bg', 'options' ), 'blogHeader' ); ?>
			<?php endif; ?>
			<header <?php echo $image[0] ? 'style="background-image:url(' . $image[0] . ')"' : ''; ?>>
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<?php if ( $text ) : ?>
								<?php echo apply_filters( 'the_content', $text ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</header>
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
