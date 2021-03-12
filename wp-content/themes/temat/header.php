<!doctype html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/<?php echo get_post_type() === 'page' ? 'WebPage' : 'Article'; ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>

	<?php if ( temat_is_enabled( 'MOBILE_FIXED_MENU' ) ) : ?>
		<style type="text/css">header.site-header{position: fixed}</style>
		<script type="text/javascript">jQuery(document).ready(function($){$('#content.site-content').css({'padding-top': $('header#masthead').height() + 'px'})});</script>
	<?php endif; ?>

	<?php if ( temat_is_enabled( 'SMOOTH_SCROLL' ) ) : ?>
		<script type="text/javascript">
			<?php
			if ( file_exists( TEMAT_DIR . 'js/smoothscroll.js' ) ) :
				include_once get_template_directory() . '/js/smoothscroll.js';
			endif;
			?>
		</script>
	<?php endif; ?>

	<?php if ( temat_is_enabled( 'LOAD_LAZYLOAD_JS' ) ) : ?>
		<script type="text/javascript">
			<?php
			if ( file_exists( TEMAT_DIR . 'js/jquery.lazy.min.js' ) ) :
				include_once get_template_directory() . '/js/jquery.lazy.min.js';
			endif;
			?>
			jQuery(document).ready(function($){if($('.lazy').length){$('.lazy').Lazy()}});
		</script>
	<?php endif; ?>

	<?php if ( temat_is_enabled( 'SCROLL_TO_TOP' ) ) : ?>
		<script type="text/javascript">
			<?php
			if ( file_exists( TEMAT_DIR . 'js/scroll-to-top.min.js' ) ) :
				include_once get_template_directory() . '/js/scroll-to-top.min.js';
			endif;
			?>
		</script>
		<style type="text/css">
			<?php
			if ( file_exists( TEMAT_DIR . '/ss/_scroll-to-top.css' ) ) :
				include_once get_template_directory() . '/css/_scroll-to-top.css';
			endif;
			?>
		</style>
	<?php endif; ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="wrapper">
				<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-light">
					<button class="hamburger hamburger--elastic navbar-toggler" aria-controls="primary-menu" aria-expanded="false" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
					<?php
					wp_nav_menu(
						array(
							'container_class' => 'temat-primary-menu-container',
							'theme_location'  => 'primary-menu',
							'menu_id'         => 'primary-menu',
						)
					);
					?>
				</nav>
				<div class="site-branding">
					<?php the_custom_logo(); ?>
				</div>
				<?php if ( WOOCOMMERCE_ENABLED ) : ?>
					<div class="right-section">
						<?php
						wp_nav_menu(
							array(
								'container_class' => 'temat-woocommerce-menu-container',
								'theme_location'  => 'temat-woo-menu',
								'menu_id'         => 'woocommerce-menu',
							)
						);
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</header>
	<div id="content" class="site-content">
