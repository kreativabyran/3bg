<!-- CODE -->
<section id="kb-blocks-hero-space">
  <div class="container">
	<div class="row">

	  <!-- LEFT COLUMN -->
	  <div class="col-sm-7 kb-left-col">
		<div class="wrapper">
		  <div class="kb-tbl-cell">
			<!-- Title -->
			<?php
			if ( get_field( 'title' ) ) : ?>
			  <h1>
				<?php the_field( 'title' ); ?>
				<br>
				<?php if ( get_field( 'title2' ) ) : ?>
					<?php the_field( 'title2' ); ?>
				<?php endif; ?>
			  </h1>
			<?php endif; ?>

			<!-- Box -->
			<div class="kb-beige-box">
			  <!-- List -->
			  <?php if ( get_field( 'list' ) ) : ?>
				<ul>
					<?php foreach ( get_field( 'list' ) as $list ) : ?>
					<li><?php echo $list['list_item']; ?></li>
				  <?php endforeach; ?>
				</ul>
			  <?php endif; ?>

			  <!-- Contact us -->
			  <?php if ( get_field( 'contact_text' ) ) : ?>
				<p class="contact-us-call-big"><?php the_field( 'contact_text' ); ?></p>
				<p><?php the_field( 'contact_text_sub' ); ?></p>
			  <?php endif; ?>


			  <!-- Button -->
			  <?php if ( get_field( 'button_link' ) ) : ?>
				<a href="<?php the_field( 'button_link' ); ?>" class="btn btn-primary"><?php the_field( 'button_text' ); ?></a>
			  <?php endif; ?>
			</div>
		  </div>
		</div>
	  </div>

	  <!-- RIGHT COLUMN -->
	  <div class="col-sm-5 kb-right-col">
		<?php if ( get_field( 'list' ) ) : ?>
		  <img src="<?php the_field( 'image' ); ?>" />
		<?php endif; ?>

	  </div>
	</div>
  </div>
</section>
