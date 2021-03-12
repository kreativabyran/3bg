<div class="packages" <?php echo get_field( 'block_id' ) ? 'id="' . get_field( 'block_id' ) . '"' : ''; ?>>
	<?php if ( get_field( 'image' ) ) : ?>
		<figure>
			<?php echo wp_get_attachment_image( get_field( 'image' ), 'articleThumbnail' ); ?>
		</figure>
	<?php endif; ?>
	<div>
    <div class="package-left">
      <?php if ( get_field( 'title' ) ) : ?>
        <h4><?php echo esc_html( get_field( 'title' ) ); ?></h4>
      <?php endif; ?>
      <ul>
        <?php foreach ( get_field( 'lists' ) as $list ) : ?>
          <li><?php echo esc_html( $list['list'] ); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="package-right">
		  <div><?php echo esc_html( get_field( 'price' ) ); ?></div>
		  <a href="#" class="pr-btn" role="button" target="_self"><?php echo esc_html( 'Beställ', 'temat-child' ); ?></a>
    </div>
	</div>
</div>
