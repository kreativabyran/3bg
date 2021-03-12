<?php

if ( ! function_exists( 'temat_head_social_tags' ) ) :
	function temat_head_social_tags() {
		global $post;

		if ( $post ) {
			if ( get_the_excerpt( $post ) ) {
				$desc = get_the_excerpt( $post );
			} else {
				$space_string = str_replace( '<', ' <', $post->post_content );
				$double_space = wp_strip_all_tags( $space_string );
				$single_space = trim( str_replace( array( "\r\n", "\n", "\r", ' ', '  ' ), ' ', $double_space ) );
				$desc         = preg_replace( '/\s+/', ' ', $single_space );
			}
		} else {
			$desc = get_bloginfo( 'description', 'display' );
		}

		$GLOBALS['kb_desc'] = $desc;

		$descs = array(
			155 => ( strlen( $desc ) > 155 ? str_replace( '....', '...', mb_substr( $desc, 0, 152 ) . '...' ) : $desc ),
			199 => ( strlen( $desc ) > 199 ? str_replace( '....', '...', mb_substr( $desc, 0, 196 ) . '...' ) : $desc ),
		);

		$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

		if ( $img ) {
			if ( $img[1] < 280 || $img[2] < 200 ) {
				$img = false;
			}
		}

		if ( ! $img ) {
			$custom_logo_id  = get_theme_mod( 'custom_logo' );
			$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );

			if ( $custom_logo_url ) {
				$img    = array();
				$img[0] = esc_url( $custom_logo_url );
			}
		}

		$cats = get_categories();

		$lang = explode( '-', get_bloginfo( 'language' ) );
		$lang = strtolower( $lang[0] ) . '_' . strtoupper( $lang[1] );

		ob_start();
		?>






		<!-- Place this data between the <head> tags of your website -->
		<meta name="description" content="<?php echo esc_attr( $descs[155] ); ?>" />
		<meta property="og:type" content="<?php echo isset( $post->post_type ) && 'page' === $post->post_type ? 'website' : 'article'; ?>" />

		<!-- Schema.org markup for Google+ -->
		<meta itemprop="name" content="<?php the_title(); ?>">
		<meta itemprop="description" content="<?php echo esc_attr( $descs[199] ); ?>">
		<meta property="og:locale" content="<?php echo esc_attr( $lang ); ?>" />

		<?php if ( $img ) { ?>
		<meta itemprop="image" content="<?php echo esc_url( $img[0] ); ?>">
		<?php } ?>




		<!-- Twitter Card data -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="<?php the_title(); ?>">
		<meta name="twitter:description" content="<?php echo esc_attr( $descs[199] ); ?>">

		<!-- Twitter summary card with large image must be at least 280x150px -->
		<?php if ( $img ) { ?>
		<meta name="twitter:image" content="<?php echo esc_url( $img[0] ); ?>">
		<?php } ?>




		<!-- Open Graph data -->
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />

		<?php if ( $img ) { ?>
		<meta property="og:image" content="<?php echo esc_url( $img[0] ); ?>">
		<?php } ?>

		<meta property="og:description" content="<?php echo esc_attr( $descs[199] ); ?>" />
		<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />

		<meta property="article:published_time" content="<?php echo get_the_date( 'c' ); ?>" />
		<meta property="article:modified_time" content="<?php the_modified_date( 'c' ); ?>" />
		<?php if ( $post && 'post' === $post->post_type ) { ?>
			<?php // <meta property="article:section" content="Article Section" /> ?>

			<?php
			if ( $cats ) {
				foreach ( $cats as $cat ) {
					?>
				<meta property="article:tag" content="<?php echo esc_attr( $cat->cat_name ); ?>" />
					<?php
				}
			}
			?>

			<?php // <meta property="fb:admins" content="Facebook numberic ID" /> ?>
		<?php } ?>



		<?php
		ob_end_flush();
	}
endif;

add_action( 'wp_head', 'temat_head_social_tags' );
