<div style="border-top: 4px solid #000;border-bottom: 4px solid #000;">
	<?php $thumbnail = wp_get_attachment_image( get_field( 'acf_avatar', 'user_' . get_the_author_meta( 'ID' ) ), 'authorProfile' ); ?>
	<?php if ( $thumbnail ) : ?>
		<figure>
			<?php echo $thumbnail; ?>
		</figure>
	<?php endif; ?>
	<div>
		<small><?php esc_html_e( 'Redaktion', 'temat-child' ); ?></small>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" target="_self"><?php esc_html_e( get_the_author() ); ?></a>
	</div>

  <?php $text = get_post_meta( get_the_ID(), 'post_meta_boxtext', true ); ?>
  <?php if ( ! empty( $text ) ) : ?>
	<div>
	  <small><?php esc_html_e( 'Text', 'temat-child' ); ?></small>
	  <div><?php echo esc_html( $text ); ?></div>
	</div>
  <?php endif; ?>

  <?php $foto = get_post_meta( get_the_ID(), 'post_meta_boxfoto', true ); ?>
  <?php if ( ! empty( $foto ) ) : ?>
	<div>
	  <small><?php esc_html_e( 'Foto', 'temat-child' ); ?></small>
	  <div><?php echo esc_html( $foto ); ?></div>
	</div>
  <?php endif; ?>

	<div>
		<small><?php esc_html_e( 'Publicerad', 'temat-child' ); ?></small>
		<div><?php the_date(); ?></div>
	</div>
</div>
