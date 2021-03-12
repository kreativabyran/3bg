<?php



add_action(
	'wp_authenticate',
	function( $username, $password ) {

		if ( ! empty( $username ) && ! empty( $password ) ) {
			$user_data = get_user_by( 'login', $username );
			$user      = get_csv_user( $user_data->user_email );
			if ( $user ) {
				$user_id = email_exists( $user[4] );
				if ( $user_id ) :
					// Uppdatera användarens lösenord
					if ( $user[1] ) :
						wp_set_password( $user[1], $user_id );
					endif;
				else :
					// Användaren finns inte, skapa den
					if ( $user[1] && $user[4] ) :
						wp_create_user( $user[4], $user[1], $user[4] );
					endif;
				endif;
			}
		}

	},
	30,
	2
);

// Om användaren finns i csv-filen returnera användaren. Annars false
function get_csv_user( $email ) {
	$file = fopen( $_SERVER['DOCUMENT_ROOT'] . '/login.csv', 'r' );
	while ( ( $line = fgetcsv( $file ) ) !== false ) :
		$user = explode( ';', $line[0] );
		if ( in_array( $email, $user ) ) :
			fclose( $file );
			return $user;
		endif;
	endwhile;
	fclose( $file );
	return false;
}

function is_user_active() {
	if ( ! is_user_logged_in() ) {
		return false;
	}
	$user = wp_get_current_user();
	if ( get_csv_user( $user->user_email ) ) {
		return true;
	}
	return false;
}

function is_free_article( $post_id ) {

	if ( get_post_meta( $post_id, 'post_meta_boxgratisartikel', true ) === 'on' ) {
		return true;
	}
	return false;
}

 // Byt url från wp-login till /logga-in/
function redirect_login_page() {
	$login_page  = home_url( '/logga-in/' );
	$page_viewed = basename( $_SERVER['REQUEST_URI'] );

	if ( $page_viewed == 'wp-login.php' && $_SERVER['REQUEST_METHOD'] == 'GET' ) {
		wp_redirect( $login_page );
		exit;
	}
}
add_action( 'init', 'redirect_login_page' );

// Om det inte gick att logga in. Skicka en till loggainsidan
add_action(
	'wp_login_failed',
	function() {
		$login_page = home_url( '/logga-in/' );
		wp_redirect( $login_page . '?login=failed' );
		exit;
	}
);

// Om man inte fyllt i någonting. Skicka en till loginsidan
add_filter(
	'authenticate',
	function( $user, $username, $password ) {
		$login_page = home_url( '/logga-in/' );
		if ( $username == '' || $password == '' ) {
			wp_redirect( $login_page . '?login=empty' );
			exit;
		}
	},
	1,
	3
);

add_shortcode(
	'login',
	function( $atts ) {
		ob_start();
		?>
		<?php $login = ( isset( $_GET['login'] ) ) ? $_GET['login'] : 0; ?>

		<?php if ( $login === 'thanks' ) : ?>
			<div class="thanks is-style-info">
				<?php the_field( 'thanks_message', 'options' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( false ) : ?>
			<?php if ( $login === 'failed' ) : ?>
				<p class="login-msg"><?php echo esc_html( 'Ogiltiga inloggningsuppgifter.', 'temat-child' ); ?></p>
			<?php elseif ( $login === 'empty' ) : ?>
				<p class="login-msg"><?php echo esc_html( 'Fyll i e-post och lösenord.', 'temat-child' ); ?></p>
			<?php elseif ( $login === 'false' ) : ?>
				<p class="login-msg"><?php echo esc_html( 'Du är utloggad.', 'temat-child' ); ?></p>
			<?php endif; ?>
		<?php endif; ?>

		
		<?php if ( get_field( 'help_message', 'options' ) ) : ?>
      <div class="login-help-row">
        <h1 class="h2"><?php echo esc_html( 'Logga in', 'temat-child' ); ?></h1>
        <button id="login-help_button"><?php echo esc_html( 'Hjälp', 'temat-child' ); ?></button>
      </div>
			<div style="display:none" id="login-help"><?php the_field( 'help_message', 'options' ); ?></div>
		<?php endif; ?>

		<?php
		wp_login_form(
			array(
				'echo'           => true,
				'redirect'       => home_url(),
				'label_username' => 'E-post',
				'label_password' => 'Lösenord',
				'label_log_in'   => 'Logga in',
				'remember'       => false,
			)
		);
		?>
		<?php
		return ob_get_clean();
	}
);
