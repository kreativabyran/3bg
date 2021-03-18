<!doctype html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/<?php echo get_post_type() === 'page' ? 'WebPage' : 'Article'; ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="format-detection" content="telephone=no">
	<?php if ( is_singular( 'post' ) ) : ?>
		<link rel="stylesheet" href="<?php echo TEMAT_CHILD_URI; ?>css/mediaplayer/main.css" type="text/css">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="container">
			<?php // global $post; $pagetype = get_post_meta( $post->ID, 'page_options_sidtyp', true ); ?>
			<?php echo get_top_menu(); ?>
			<div class="row">
				<div class="col-xs-12">
					<div class="wrapper">
						<div class="site-branding">
							<?php the_custom_logo(); ?>
						</div>
						<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-light">
							<button class="hamburger hamburger--collapse navbar-toggler" aria-controls="primary-menu" aria-expanded="false" type="button">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
							<div class="temat-primary-menu-container">
								<?php echo get_service_menu(); ?>
							</div>
							<?php $automation_image = get_field( 'automation_image', 'options' ); ?>
							<?php $automation_link = get_field( 'automation_link', 'options' ); ?>
							<?php if ( $automation_image && $automation_link ) : ?>
								<div class="automation">
									<?php $image = wp_get_attachment_image( $automation_image, 'articleThumbnail' ); ?>
									<?php if ( $image && $automation_link ) : ?>
										<a href="<?php echo $automation_link['url']; ?>" target="_self">
											<figure>
												<?php echo $image; ?>
											</figure>
										</a>
									<?php endif; ?>
								</div>
							<?php endif; ?>
							<?php get_template_part( 'templates/search-form' ); ?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="content" class="site-content">
	<?php
