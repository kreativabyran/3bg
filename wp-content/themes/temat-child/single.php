<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<?php if ( is_free_article( get_the_ID() ) && get_field( 'free_article', 'options' ) ) : ?>
					<div class="free-article-banner">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<?php the_field( 'free_article', 'options' ); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( is_user_active() || is_free_article( get_the_ID() ) ) : ?>
					<?php $image_id = get_post_meta( get_the_ID(), 'post_meta_boxheaderbild', true ); ?>
					<?php if ( $image_id ) : ?>
						<?php $image = wp_get_attachment_image_src( $image_id, 'headerImage' ); ?>
						<div class="header-image" <?php echo $image ? 'style="background-image:url(' . $image[0] . ')"' : ''; ?>></div>
					<?php endif; ?>
					<div class="container breadcrumbs">
						<div class="row">
							<div class="col-xs-12">
								<a href="/" target="_self"><?php esc_html_e( 'Till startsidan', 'temat-child' ); ?></a>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<article>
									<?php the_content(); ?>
								</article>
								<?php get_template_part( 'templates/article-author' ); ?>
							</div>
						</div>
					</div>
					<?php get_template_part( 'templates/article-entry-meta' ); ?>
				<?php else : ?>
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h1><?php esc_html_e( 'Går ej att läsa. Prenumeration krävs.', 'temat-child' ); ?></h1>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
	</main>
</div>
<?php
get_footer();
