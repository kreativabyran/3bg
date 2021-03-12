<?php

function t_get_blog_args( $order = 'latest', $category = false, $editor = false, $search_test = '', $nr_of_posts = 6, $offset = 0 ) {

	$args = array(
		'numberposts'      => $nr_of_posts,
		'offset'           => $offset,
		'post_type'        => 'post',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'suppress_filters' => true,
		'post_status'      => 'publish',
	);

	if ( $order !== 'latest' ) :

		if ( $order === 'asc' ) {
			$args['orderby'] = 'title';
			$args['order']   = 'ASC';
		}

		if ( $order === 'desc' ) {
			$args['orderby'] = 'title';
			$args['order']   = 'DESC';
		}

	endif;

	if ( $category ) :
		$cats = '';
		foreach ( $category as $key => $cat ) :
			$cats .= $key != 0 ? ',' : '';
			$cats .= $cat;
		endforeach;
		$args['category'] = $cats;
	endif;

	if ( $editor ) :
		$users = '';
		foreach ( $editor as $key => $user ) :
			$users .= $key != 0 ? ',' : '';
			$users .= $user;
		endforeach;
		$args['author'] = $users;
	endif;

	if ( $search_test !== '' ) :
		$args['s'] = $search_test;
	endif;

	return $args;

}

if ( is_admin() ) :
	add_action( 'wp_ajax_t_blog_load_more', 't_blog_load_more' );
	add_action( 'wp_ajax_nopriv_t_blog_load_more', 't_blog_load_more' );
endif;
function t_blog_load_more() {

	$order = $_POST['order'];

	if ( isset( $_POST['cat'] ) ) :
		$cat = explode( ',', $_POST['cat'] );
	endif;

	if ( $_POST['users'] ) :
		$users = explode( ',', $_POST['users'] );
	endif;

	$text   = $_POST['text'];
	$offset = $_POST['offset'];

	$args = t_get_blog_args( $order, $cat, $users, $text, 4, $offset );

	$posts = get_posts( $args );
	if ( $posts ) :
		echo t_get_blog_post_row( $posts );
	endif;
	die();
}

function t_get_blog_post_row( $posts ) {
	ob_start();
	?>
	<?php $count = 0; ?>
	<?php foreach ( $posts as $post ) : ?>
		<?php echo $count++ % 2 === 0 ? '<div class="row">' : ''; ?>
			<?php echo t_get_blog_post_article( $post, 'col-sm-6 col-xs-12 post type-post' ); ?>
		<?php echo ( ( $count % 2 === 0 ) || ( count( $posts ) === $count ) ) ? '</div>' : ''; ?>
	<?php endforeach; ?>
	<?php
	return ob_get_clean();
}

function t_get_blog_post_article( $post, $classes ) {
	ob_start();
	?>
	<?php $active = is_user_active() || is_free_article( $post->ID ) ? true : false; ?>
	<article id="post-<?php echo esc_attr( $post->ID ); ?>" class="<?php echo esc_html( $classes ); ?><?php echo ! $active ? ' inactive' : ''; ?>">
		<?php echo $active ? '<a href="' . esc_html( get_the_permalink( $post->ID ) ) . '" target="_self">' : ''; ?>
			<ul style="position: absolute;z-index: 1;top: 0;left: 0;">
				<?php foreach ( get_the_terms( $post->ID, 'category' ) as $term ) : ?>
					<li style="color: red;"><?php echo esc_html( $term->name ); ?> - <?php echo esc_html( $term->term_id ); ?></li>
				<?php endforeach; ?>
			</ul>
			<ul style="position: absolute;z-index: 1;top: 0;right: 0;">
				<li style="color: green;"><?php echo esc_html( get_the_author_meta( 'display_name', get_post_field( 'post_author', $post->ID ) ) ); ?></li>
			</ul>
			<figure>
				<?php echo wp_get_attachment_image( get_post_thumbnail_id( $post->ID ), 'articleThumbnail' ); ?>
			</figure>
			<header>
			<div class="entry-title">
				<?php echo esc_html( $post->post_title ); ?>
        <div class="circle-arrow"></div>
			</div>
			</header>
		<?php echo $active ? '</a>' : ''; ?>
	</article>
	<?php
	return ob_get_clean();
}

function t_get_blog_total( $args ) {
	$args['numberposts'] = -1;
	return count( get_posts( $args ) );
}

function t_get_blog_form( $posts_total ) {

	ob_start();
	?>
	<form action="" method="get" id="articles">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="filter">
						<button
							class="filter-toggle"
							type="button"
							aria-selected="<?php echo isset( $_GET['open'] ) && $_GET['open'] === 'true' ? 'true' : 'false'; ?>"
							><?php esc_html_e( 'Visa filter', 'temat-child' ); ?></button>
						<div class="inner" <?php echo isset( $_GET['open'] ) && $_GET['open'] === 'true' ? '' : 'style="display:none"'; ?>>
							<?php echo t_get_filter_cats(); ?>
							<?php echo t_get_filter_author(); ?>
							<button
								class="submit-filter"
								type="button"
								><?php esc_html_e( 'Visa artiklar', 'temat-child' ); ?></button>
							<button
								class="clean-filter"
								type="button"
								><?php esc_html_e( 'Rensa filter', 'temat-child' ); ?></button>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="search">
						<button
							class="filter-toggle"
							type="button"
							aria-selected="false"
							><?php esc_html_e( 'Sök artikel', 'temat-child' ); ?></button>
						<div class="inner" style="display:none">
							<input <?php echo isset( $_GET['text'] ) && $_GET['text'] !== '' ? 'value="' . esc_html( $_GET['text'] ) . '"' : ''; ?> type="text" name="text" placeholder="<?php esc_html_e( 'Sök fritext', 'temat-child' ); ?>" />
							<button class="submit-filter"><?php esc_html_e( 'Sök', 'temat-child' ); ?></button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h4 class="nr-of-post">
						<?php echo esc_html( $posts_total ); ?>
						<?php esc_html_e( 'resultat', 'temat-child' ); ?>
						<?php echo isset( $_GET['text'] ) && $_GET['text'] !== '' ? '’' . esc_html( $_GET['text'] ) . '’' : ''; ?>
					</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="sort">
						<?php esc_html_e( 'Sortera artiklar:', 'temat-child' ); ?>
						<ul>
							<li>
								<button
									<?php echo ! isset( $_GET['order'] ) || $_GET['order'] === 'latest' ? 'aria-selected="true"' : 'aria-selected="false"'; ?>
									class="radio-toggle"
									type="button"
									data-for="latest"><?php esc_html_e( 'Senaste', 'temat-child' ); ?></button>
								<input <?php echo ! isset( $_GET['order'] ) || $_GET['order'] === 'latest' ? 'checked' : ''; ?>
									type="radio"
									id="latest"
									name="order"
									style="display:none"
									value="latest">
							</li>
							<li>
								<button
									<?php echo isset( $_GET['order'] ) && $_GET['order'] === 'asc' ? 'aria-selected="true"' : 'aria-selected="false"'; ?>
									class="radio-toggle"
									type="button"
									data-for="asc"><?php esc_html_e( 'A-Ö', 'temat-child' ); ?></button>
								<input <?php echo isset( $_GET['order'] ) && $_GET['order'] === 'asc' ? 'checked' : ''; ?>
									type="radio"
									id="asc"
									name="order"
									style="display:none"
									value="asc">
							</li>
							<li>
								<button
									<?php echo isset( $_GET['order'] ) && $_GET['order'] === 'desc' ? 'aria-selected="true"' : 'aria-selected="false"'; ?>
									class="radio-toggle"
									type="button"
									data-for="desc"><?php esc_html_e( 'Ö-A', 'temat-child' ); ?></button>
								<input <?php echo isset( $_GET['order'] ) && $_GET['order'] === 'desc' ? 'checked' : ''; ?>
									type="radio"
									id="desc"
									name="order"
									style="display:none"
									value="desc">
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
		$cats = '';
		if ( isset( $_GET['cat'] ) ) :

			foreach ( $_GET['cat'] as $key => $cat ) :
				$cats .= $key != 0 ? ',' : '';
				$cats .= $cat;
			endforeach;
		endif;

		$users = '';
		if ( isset( $_GET['user'] ) ) :

			foreach ( $_GET['user'] as $key => $user ) :
				$users .= $key != 0 ? ',' : '';
				$users .= $user;
			endforeach;
		endif;
		?>
		<input type="hidden" id="filter-order" value="<?php echo isset( $_GET['order'] ) ? $_GET['order'] : 'latest'; ?>" />
		<input type="hidden" id="filter-cats" value="<?php echo esc_attr( $cats ); ?>" />
		<input type="hidden" id="filter-users" value="<?php echo esc_attr( $users ); ?>" />
		<input type="hidden" id="filter-text" value="<?php echo isset( $_GET['text'] ) ? $_GET['text'] : ''; ?>" />
	</form>
	<?php
	return ob_get_clean();
}

function t_get_filter_cats() {
	$terms = get_terms(
		array(
			'taxonomy'   => 'category',
			'hide_empty' => true,
		)
	);
	ob_start();
	?>
	<div>
		<label><?php esc_html_e( 'Kategorier', 'temat-child' ); ?></label>
		<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
			<ul>
			<?php foreach ( $terms as $term ) : ?>
				<li>
					<button
						<?php echo isset( $_GET['cat'] ) ? t_button_selected( $_GET['cat'], $term->term_id ) : ''; ?>
						class="checkbox-toggle"
						type="button"
						data-for="cat-<?php echo esc_attr( $term->term_id ); ?>"><?php echo esc_attr( $term->name ); ?></button>
					<input
						<?php echo isset( $_GET['cat'] ) ? t_checkbox_selected( $_GET['cat'], $term->term_id ) : ''; ?>
						id="cat-<?php echo esc_attr( $term->term_id ); ?>"
						class="categories"
						type="checkbox" name="cat[]"
						style="display:none"
						value="<?php echo esc_attr( $term->term_id ); ?>">
				</li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
	<?php
	$result = ob_get_clean();
	return $result;
}

function t_get_filter_author() {

	$args = array(
		'orderby'             => 'display_name',
		'has_published_posts' => array( 'post' ),
		'order'               => 'ASC',
	);

	$user_query = new WP_User_Query( $args );
	$users      = $user_query->get_results();
	ob_start();
	?>
	<div>
		<label><?php esc_html_e( 'Redaktioner', 'temat-child' ); ?></label>
		<?php if ( ! empty( $users ) ) : ?>
			<ul>
			<?php foreach ( $users as $user ) : ?>
				<li>
					<button
						<?php echo isset( $_GET['user'] ) ? t_button_selected( $_GET['user'], $user->data->ID ) : ''; ?>
						class="checkbox-toggle"
						type="button"
						data-for="user-<?php echo esc_attr( $user->data->ID ); ?>"><?php echo esc_html( $user->data->display_name ); ?></button>
					<input
						<?php echo isset( $_GET['user'] ) ? t_checkbox_selected( $_GET['user'], $user->data->ID ) : ''; ?>
						id="user-<?php echo esc_attr( $user->data->ID ); ?>"
						class="users"
						type="checkbox" name="user[]"
						style="display:none"
						value="<?php echo esc_attr( $user->data->ID ); ?>">
				</li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
	<?php
	$result = ob_get_clean();
	return $result;
}

function t_checkbox_selected( $array, $value ) {
	if ( in_array( $value, $array ) ) :
		return 'checked';
	endif;
	return '';
}

function t_button_selected( $array, $value ) {
	if ( in_array( $value, $array ) ) :
		return 'aria-selected="true"';
	endif;
	return 'aria-selected="false"';
}


add_action(
	'template_redirect',
	function() {
		if ( is_category() || is_tag() ) {
			global $wp_query;
			$wp_query->set_404();
		}
	}
);

add_action(
	'admin_head',
	function () {
		global $current_screen;
		if ( $current_screen->id == 'profile' ) {
			?>
			<script type="text/javascript">
			jQuery(function($) {
				$('textarea#description').closest('tr.user-description-wrap').remove();
			});
			</script>
			<?php
		}
	}
);
