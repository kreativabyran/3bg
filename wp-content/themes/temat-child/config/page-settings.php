<?php
class Page_Options {
	private $config = '{"title":"Sidalternativ","prefix":"page_options_","domain":"temat-child","class_name":"Page_Options","post-type":["page"],"context":"normal","priority":"default","fields":[{"type":"select","label":"Sidtyp","default":"standard","options":"standard : Standard\r\nfront : Front Automation\r\nfrojd : Fr\u00f6jd Automation\r\niml : IML Technology","id":"page_options_sidtyp"}]}';

	public function __construct() {
		$this->config = json_decode( $this->config, true );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	public function add_meta_boxes() {
		foreach ( $this->config['post-type'] as $screen ) {
			add_meta_box(
				sanitize_title( $this->config['title'] ),
				$this->config['title'],
				array( $this, 'add_meta_box_callback' ),
				$screen,
				$this->config['context'],
				$this->config['priority']
			);
		}
	}

	public function save_post( $post_id ) {
		foreach ( $this->config['fields'] as $field ) {
			switch ( $field['type'] ) {
				default:
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
						update_post_meta( $post_id, $field['id'], $sanitized );
					}
			}
		}
	}

	public function add_meta_box_callback() {
		$this->fields_table();
	}

	private function fields_table() {
		?><table class="form-table" role="presentation">
			<tbody>
			<?php
			foreach ( $this->config['fields'] as $field ) {
				?>
				<tr>
						<th scope="row"><?php $this->label( $field ); ?></th>
						<td><?php $this->field( $field ); ?></td>
					</tr>
					<?php
			}
			?>
			</tbody>
		</table>
		<?php
	}

	private function label( $field ) {
		switch ( $field['type'] ) {
			default:
				printf(
					'<label class="" for="%s">%s</label>',
					$field['id'],
					$field['label']
				);
		}
	}

	private function field( $field ) {
		switch ( $field['type'] ) {
			case 'select':
				$this->select( $field );
				break;
			default:
				$this->input( $field );
		}
	}

	private function input( $field ) {
		printf(
			'<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
			isset( $field['class'] ) ? $field['class'] : '',
			$field['id'],
			$field['id'],
			isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
			$field['type'],
			$this->value( $field )
		);
	}

	private function select( $field ) {
		printf(
			'<select id="%s" name="%s">%s</select>',
			$field['id'],
			$field['id'],
			$this->select_options( $field )
		);
	}

	private function select_selected( $field, $current ) {
		$value = $this->value( $field );
		if ( $value === $current ) {
			return 'selected';
		}
		return '';
	}

	private function select_options( $field ) {
		$output  = array();
		$options = explode( "\r\n", $field['options'] );
		$i       = 0;
		foreach ( $options as $option ) {
			$pair     = explode( ':', $option );
			$pair     = array_map( 'trim', $pair );
			$output[] = sprintf(
				'<option %s value="%s"> %s</option>',
				$this->select_selected( $field, $pair[0] ),
				$pair[0],
				$pair[1]
			);
			$i++;
		}
		return implode( '<br>', $output );
	}

	private function value( $field ) {
		global $post;
		if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
			$value = get_post_meta( $post->ID, $field['id'], true );
		} elseif ( isset( $field['default'] ) ) {
			$value = $field['default'];
		} else {
			return '';
		}
		return str_replace( '\u0027', "'", $value );
	}

}
// new Page_Options();

function get_page_footer( $pagetype = 'standard' ) {
	ob_start();
	switch ( $pagetype ) {
		case 'front':
			$content = get_field( 'footer_front', 'options' );
			break;
		case 'frojd':
			$content = get_field( 'footer_frojd', 'options' );
			break;
		case 'iml':
			$content = get_field( 'footer_iml', 'options' );
			break;
		default:
			$content = get_field( 'footer', 'options' );

	}
	?>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<?php if ( isset( $content['footer_text_left'] ) ) : ?>
			<?php echo apply_filters( 'the_content', $content['footer_text_left'] ); ?>
		<?php endif; ?>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<?php if ( isset( $content['footer_icon_left'] ) ) : ?>
			<figure>
				<?php echo wp_get_attachment_image( $content['footer_icon_left'], 'full' ); ?>
			</figure>
		<?php endif; ?>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<?php if ( isset( $content['footer_text_right'] ) ) : ?>
			<?php echo apply_filters( 'the_content', $content['footer_text_right'] ); ?>
		<?php endif; ?>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<?php if ( isset( $content['footer_icon_right'] ) ) : ?>
			<figure>
				<?php echo wp_get_attachment_image( $content['footer_icon_right'], 'full' ); ?>
			</figure>
		<?php endif; ?>
	</div>
	<?php
	return ob_get_clean();
}

function get_top_menu( $pagetype = 'standard' ) {
	ob_start();
	$args = array(
		'container' => false,
	);

	switch ( $pagetype ) {
		case 'front':
			$header       = get_field( 'header_front', 'options' );
			$args['menu'] = $header['topmenu'];
			break;
		case 'frojd':
			$header       = get_field( 'header_frojd', 'options' );
			$args['menu'] = $header['topmenu'];
			break;
		case 'iml':
			$header       = get_field( 'header_iml', 'options' );
			$args['menu'] = $header['topmenu'];
			break;
		default:
			$args['theme_location'] = 'top-menu';
			$args['menu_id']        = 'top-menu';

	}
	?>
	<div class="row">
		<div class="col-xs-12">
			<nav>
				<?php wp_nav_menu( $args ); ?>
			</nav>
		</div>
	</div>
	<?php
	return ob_get_clean();
}

function get_service_menu( $pagetype = 'standard' ) {
	ob_start();
	$args = array(
		'container' => false,
		'echo'      => false,
	);

	switch ( $pagetype ) {
		case 'front':
			$header       = get_field( 'header_front', 'options' );
			$args['menu'] = $header['menu'];
			break;
		case 'frojd':
			$header       = get_field( 'header_frojd', 'options' );
			$args['menu'] = $header['menu'];
			break;
		case 'iml':
			$header       = get_field( 'header_iml', 'options' );
			$args['menu'] = $header['menu'];
			break;
		default:
			$args['theme_location'] = 'primary-menu';
			$args['menu_id']        = 'primary-menu';

	}
	return wp_nav_menu( $args );
}
