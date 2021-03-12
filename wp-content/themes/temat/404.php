<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<section class="error-404 not-found">
			<div class="container">
				<div class="col-md-12">
					<?php $fields_404 = get_option( 'temat_settings_404' ); ?>
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( $fields_404['temat_text_field_404'], 'temat' ); ?></h1>
					</header>
					<div class="page-content">
						<p><?php esc_html_e( $fields_404['temat_textarea_field_404'], 'temat' ); ?></p>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>
<?php
get_footer();
