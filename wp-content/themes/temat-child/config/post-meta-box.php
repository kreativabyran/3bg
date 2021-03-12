<?php
class Post_Meta_Box {
	private $config = '{"title":"Inl\u00e4ggsinst\u00e4llningar","prefix":"post_meta_box","domain":"temat-child","class_name":"Post_Meta_Box","post-type":["post"],"context":"normal","priority":"default","fields":[{"type":"checkbox","label":"Gratisartikel","description":"Markera artikeln som gratis","id":"post_meta_boxgratisartikel"},{"type":"text","label":"Inl\u00e4sning","id":"post_meta_boxinlasning"},{"type":"text","label":"Text","id":"post_meta_boxtext"},{"type":"text","label":"Foto","id":"post_meta_boxfoto"},{"type":"media","label":"Headerbild","button-text":"Mediabibliotek","return":"id","id":"post_meta_boxheaderbild"}]}';

	public function __construct() {
		$this->config = json_decode( $this->config, true );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
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

	public function admin_enqueue_scripts() {
		global $typenow;
		if ( in_array( $typenow, $this->config['post-type'] ) ) {
			wp_enqueue_media();
		}
	}

	public function admin_head() {
		global $typenow;
		if ( in_array( $typenow, $this->config['post-type'] ) ) {
			?><script>
				jQuery.noConflict();
				(function($) {
					$(function() {
						$('body').on('click', '.rwp-media-toggle', function(e) {
							e.preventDefault();
							let button = $(this);
							let rwpMediaUploader = null;
							rwpMediaUploader = wp.media({
								title: button.data('modal-title'),
								button: {
									text: button.data('modal-button')
								},
								multiple: true
							}).on('select', function() {
								let attachment = rwpMediaUploader.state().get('selection').first().toJSON();
								button.prev().val(attachment[button.data('return')]);
							}).open();
						});
					});
				})(jQuery);
			</script>
			<?php
		}
	}

	public function save_post( $post_id ) {
		foreach ( $this->config['fields'] as $field ) {
			switch ( $field['type'] ) {
				case 'checkbox':
					update_post_meta( $post_id, $field['id'], isset( $_POST[ $field['id'] ] ) ? $_POST[ $field['id'] ] : '' );
					break;
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
		?>
		<table class="form-table" role="presentation">
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
			case 'media':
				printf(
					'<label class="" for="%s_button">%s</label>',
					$field['id'],
					$field['label']
				);
				break;
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
			case 'checkbox':
				$this->checkbox( $field );
				break;
			case 'media':
				$this->input( $field );
				$this->media_button( $field );
				break;
			default:
				$this->input( $field );
		}
	}

	private function checkbox( $field ) {
		printf(
			'<label class="rwp-checkbox-label"><input %s id="%s" name="%s" type="checkbox"> %s</label>',
			$this->checked( $field ),
			$field['id'],
			$field['id'],
			isset( $field['description'] ) ? $field['description'] : ''
		);
	}

	private function input( $field ) {
		if ( $field['type'] === 'media' ) {
			$field['type'] = 'text';
		}
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

	private function media_button( $field ) {
		printf(
			' <button class="button rwp-media-toggle" data-modal-button="%s" data-modal-title="%s" data-return="%s" id="%s_button" name="%s_button" type="button">%s</button>',
			isset( $field['modal-button'] ) ? $field['modal-button'] : __( 'Select this file', 'temat-child' ),
			isset( $field['modal-title'] ) ? $field['modal-title'] : __( 'Choose a file', 'temat-child' ),
			$field['return'],
			$field['id'],
			$field['id'],
			isset( $field['button-text'] ) ? $field['button-text'] : __( 'Upload', 'temat-child' )
		);
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

	private function checked( $field ) {
		global $post;
		if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
			$value = get_post_meta( $post->ID, $field['id'], true );
			if ( $value === 'on' ) {
				return 'checked';
			}
			return '';
		} elseif ( isset( $field['checked'] ) ) {
			return 'checked';
		}
		return '';
	}
}
new Post_Meta_Box();
