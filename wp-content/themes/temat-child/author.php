<?php get_header(); ?>
<?php $current_user = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>
<main id="main" class="site-main">

	<?php if ( $current_user->roles[0] === 'subscriber' ) : ?>

		<?php get_template_part( 'templates/subscriber-page' ); ?>

	<?php else : ?>

		<?php get_template_part( 'templates/writer-content' ); ?>
		<?php get_template_part( 'templates/articles-by-us' ); ?>

	<?php endif; ?>
</main>

<?php get_footer(); ?>
