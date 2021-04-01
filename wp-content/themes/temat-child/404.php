<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<section class="error-404 not-found">
			<div class="container">
				<?php if ( get_locale() === 'en_GB' ) : ?>
					<?php if ( get_field( '404_text_en', 'options' ) ) : ?>
						<?php echo apply_filters( 'the_content', get_field( '404_text_en', 'options' ) ); ?>
					<?php endif; ?>
				<?php else : ?>
					<?php if ( get_field( '404_text', 'options' ) ) : ?>
						<?php echo apply_filters( 'the_content', get_field( '404_text', 'options' ) ); ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</section>
	</main>
</div>
<?php
get_footer();
