<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</div>
					</div>
				</div>
			</header>
		<?php endif; ?>

		<?php $order = isset( $_GET['order'] ) ? $_GET['order'] : 'latest'; ?>
		<?php $category = isset( $_GET['cat'] ) ? $_GET['cat'] : false; ?>
		<?php $editor = isset( $_GET['user'] ) ? $_GET['user'] : false; ?>
		<?php $search_test = isset( $_GET['text'] ) ? $_GET['text'] : ''; ?>

		<?php $args = t_get_blog_args( $order, $category, $editor, $search_test ); ?>

		<?php $posts_total = t_get_blog_total( $args ); ?>
		<?php $posts = get_posts( $args ); ?>

		<?php echo t_get_blog_form( $posts_total ); ?>

		<?php if ( $posts ) : ?>

			<div class="container" id="all-articles">
				<?php if ( $posts ) : ?>

					<?php echo t_get_blog_post_row( $posts ); ?>

				<?php endif; ?>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<button class="filter-load-more pr-btn" type="button"><?php esc_html_e( 'Visa fler', 'temat-child' ); ?></button>
						<img id="loading-icon" style="display:none" src="<?php echo TEMAT_CHILD_URI; ?>img/loading.svg" alt="<?php esc_html_e( 'Laddningsikon', 'temat-child' ); ?>" width="50">
					</div>
				</div>
			</div>

		<?php else : ?>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php esc_html_e( 'Hoppsan inga resultat kunde hittas', 'temat-child' ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</main>
</div>
<?php
get_footer();
