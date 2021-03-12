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
								<?php
								if ( ! is_user_logged_in() ) {
									if ( has_nav_menu( 'primary-menu' ) ) {
										wp_nav_menu(
											array(
												'container' => false,
												'theme_location' => 'primary-menu',
												'menu_id' => 'primary-menu',
											)
										);
									}
								} else {
									if ( has_nav_menu( 'logedin-menu' ) ) {
										wp_nav_menu(
											array(
												'container' => false,
												'theme_location' => 'logedin-menu',
												'menu_id' => 'primary-menu',
											)
										);
									}
								}
								?>
							</div>
						</nav>

					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="content" class="site-content">
	<?php
