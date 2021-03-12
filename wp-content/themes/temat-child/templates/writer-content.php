<?php $current_user = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>
<?php if ( $current_user->header_image ) : ?>
	<?php $image = wp_get_attachment_image_src( $current_user->header_image, 'headerImage' ); ?>
	<div class="header-image" <?php echo $image ? 'style="background-image:url(' . $image[0] . ')"' : ''; ?>></div>
<?php endif; ?>

<div id="content" class="container">

	<div class="row">
		<div class="col-xs-12">
			<article>
				<h1>
					<?php echo esc_html( $current_user->display_name ); ?>
				</h1>

				<?php echo apply_filters( 'the_content', $current_user->editor_description ); ?>

				<div class="editor-info">
					<div class="left">
						<?php if ( $current_user->user_email || $current_user->phone ) : ?>

							<h4><?php echo esc_html( 'Kontakta oss', 'temat-child' ); ?></h4>

							<?php if ( $current_user->user_email ) : ?>
								<a href="mailto:<?php echo esc_attr( $current_user->user_email ); ?>" target="_self"><?php echo esc_html( $current_user->user_email ); ?></a>
							<?php endif; ?>

							<?php if ( $current_user->phone ) : ?>
								<a href="tel:<?php echo esc_attr( $current_user->phone ); ?>" target="_self"><?php echo esc_html( $current_user->phone ); ?></a>
							<?php endif; ?>

						<?php endif; ?>

						<?php if ( $current_user->address ) : ?>

							<h4><?php echo esc_html( 'Var finns vi?', 'temat-child' ); ?></h4>

							<?php if ( $current_user->address ) : ?>
								<div>
									<?php echo esc_html( $current_user->address ); ?>
								</div>
							<?php endif; ?>

							<?php if ( $current_user->postal_address || $current_user->city ) : ?>
								<div>
									<?php if ( $current_user->postal_address ) : ?>
										<?php echo esc_html( $current_user->postal_address ); ?>
									<?php endif; ?>

									<?php if ( $current_user->city ) : ?>
										<?php echo esc_html( $current_user->city ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>

						<?php endif; ?>
					</div>
					<div class="right">
						<h4><?php echo esc_html( 'Socialt', 'temat-child' ); ?></h4>

						<?php if ( $current_user->user_url ) : ?>
							<a href="<?php echo esc_attr( $current_user->user_url ); ?>" target="_blank"><?php esc_html_e( $current_user->user_url ); ?></a>
						<?php endif; ?>

						<?php if ( $current_user->instagram ) : ?>
							<a href="<?php echo esc_attr( $current_user->instagram ); ?>" target="_blank"><?php esc_html_e( 'Instagram', 'temat-child' ); ?></a>
						<?php endif; ?>

						<?php if ( $current_user->facebook ) : ?>
							<a href="<?php echo esc_attr( $current_user->facebook ); ?>" target="_blank"><?php esc_html_e( 'Facebook', 'temat-child' ); ?></a>
						<?php endif; ?>

					</div>
				</div>



			</article>
		</div>
	</div>

</div>
