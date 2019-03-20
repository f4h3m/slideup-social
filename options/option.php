<?php

class slideup_social_Settings_Page {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'slideup_social_create_settings' ) );
		add_action( 'admin_init', array( $this, 'slideup_social_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'slideup_social_setup_fields' ) );
		add_filter( 'plugin_action_links_'.plugin_basename(__FILE__), array( $this, 'slideup_social_settings_link' ) );
	}

	public function slideup_social_settings_link($links) {
		$newlink = sprintf("<a href='%s'>%s</a>",'options-general.php?page=slideup_social',__('Settings','slideup_social'));
		$links[] = $newlink;
		return $links;
	}


	public function slideup_social_create_settings() {
		$page_title = __( 'Slideup Social', 'slideup_social' );
		$menu_title = __( 'Slideup Social', 'slideup_social' );
		$menu_title = __( 'Slideup Social', 'slideup_social' );
		$capability = 'manage_options';
		$slug       = 'slideup_social';
		$callback   = array( $this, 'slideup_social_settings_content' );
		add_options_page( $page_title, $menu_title, $capability, $slug, $callback );
	}

	public function slideup_social_settings_content() { ?>
        <div class="wrap">
            <h1>Slideup Social</h1>
            <form method="POST" action="options.php">
				<?php
				settings_fields( 'slideup_social' );
				do_settings_sections( 'slideup_social' );
				submit_button();
				?>
            </form>
        </div> <?php
	}

	public function slideup_social_setup_sections() {
		add_settings_section( 'slideup_social_section', 'Slideup Social plugin settings options', array(), 'slideup_social' );
	}

	public function slideup_social_setup_fields() {
		$fields = array(
			array(
				'label'       => __( 'Facebook Username', 'slideup-social' ),
				'id'          => 'fb_username',
				'type'        => 'text',
				'section'     => 'slideup_social_section'
			),
			array(
				'label'       => __( 'Facebook Url', 'slideup-social' ),
				'id'          => 'fb_url',
				'type'        => 'text',
				'section'     => 'slideup_social_section'
			),
			array(
				'label'       => __( 'Twitter Username', 'slideup-social' ),
				'id'          => 'tw_username',
				'type'        => 'text',
				'section'     => 'slideup_social_section'
			),
			array(
				'label'       => __( 'Twitter Url', 'slideup-social' ),
				'id'          => 'tw_url',
				'type'        => 'text',
				'section'     => 'slideup_social_section'
			),
            array(
				'label'       => __( 'Instagram Username', 'slideup-social' ),
				'id'          => 'ins_username',
				'type'        => 'text',
				'section'     => 'slideup_social_section'
			),
			array(
				'label'   => __( 'Instagram Url', 'slideup-social' ),
				'id'      => 'ins_url',
				'type'    => 'text',
				'section' => 'slideup_social_section'
            )
		);

		foreach ( $fields as $field ) {
			add_settings_field( $field['id'], $field['label'], array(
				$this,
				'slideup_social_field_callback'
			), 'slideup_social', $field['section'], $field );
			register_setting( 'slideup_social', $field['id'] );
		}
	}

	public function slideup_social_field_callback( $field ) {
		$value = get_option( $field['id'] );

        printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
            $field['id'],
            $field['type'],
            isset( $field['placeholder'] ) ? $field['placeholder'] : '',
            $value
        );


	}
}

new slideup_social_Settings_Page();
