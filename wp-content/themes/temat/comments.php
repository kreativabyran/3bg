<?php
if ( post_password_required() ) {
	return;
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="comments" class="comments-area">

				<?php if ( have_comments() ) : ?>
					<h2 class="comments-title">
						<?php
						$temat_comment_count = get_comments_number();
						if ( '1' === $temat_comment_count ) {
							printf(
								esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'temat' ),
								'<span>' . get_the_title() . '</span>'
							);
						} else {
							printf(
								esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $temat_comment_count, 'comments title', 'temat' ) ),
								number_format_i18n( $temat_comment_count ),
								'<span>' . get_the_title() . '</span>'
							);
						}
						?>
					</h2>

					<?php the_comments_navigation(); ?>

					<ol class="comment-list">
						<?php
						wp_list_comments(
							array(
								'style'      => 'ol',
								'short_ping' => true,
							)
						);
						?>
					</ol>

					<?php
					the_comments_navigation();

					if ( ! comments_open() ) :
						?>
						<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'temat' ); ?></p>
						<?php
					endif;

				endif;
				?>

				<div class="row">
					<div class="col-md-8 col-sm-12">
						<?php comment_form(); ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
