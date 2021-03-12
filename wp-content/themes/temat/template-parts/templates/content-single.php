<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Temat_2.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php temat_posted_on(); ?> <?php temat_posted_by(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php the_content( sprintf( wp_kses( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'temat' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) ); ?>
				</div>
			</div>
		</div><!-- container -->
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
