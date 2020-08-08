<?php
/**
 * Caramel Theme Customizer
 *
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'caramel_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function caramel_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'caramel_customize_register' );

if ( ! function_exists( 'caramel_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function caramel_theme_customize_register( $wp_customize ) {

		// CONTACT INFO
		$wp_customize->add_section(
			'caramel_theme_cantact_info',
			array(
				'title'       => __( 'Cantact Information', 'caramel' ),
				'description' => __( 'Contact and Social-Media information', 'caramel' ),
				'priority'    => 20,
			)
		);

		// CARAMEL PORTFOLIO MODE
		$wp_customize->add_section(
			'caramel_portfolio_mode',
			array(
				'title'       => __( 'Portfolio Mode', 'caramel' ),
				'description' => __( 'Choose how you want to present your work', 'caramel' ),
				'priority'    => 30,
			)
		);

		// CARAMEL PORTFOLIO MODE
		$wp_customize->add_section(
			'caramel_landingpage',
			array(
				'title'       => __( 'Landingpage', 'caramel' ),
				'description' => __( 'Settings of your homepage', 'caramel' ),
				'priority'    => 35,
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function caramel_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'contact_info_display',
			array(
				'default'           => false,
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'contact_info_display_email',
			array(
				'default'           => false,
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'contact_info_display_whatsapp',
			array(
				'default'           => false,
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'contact_info_display_instagram',
			array(
				'default'           => false,
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'contact_info_email',
			array(
				'default'           => 'info@flellex.de',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'contact_info_whatsapp',
			array(
				'default'           => '01234567891',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'contact_info_instagram',
			array(
				'default'           => 'instagram.com/flellex',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'portfolio_image_mode',
			array(
				'default'           => true,
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'landingpage_slider_fullwidth',
			array(
				'default'           => true,
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'landingpage_slider_controlls',
			array(
				'default'           => true,
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'landingpage_showreels',
			array(
				'default'           => false,
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'landingpage_showreels_title',
			array(
				'default'           => 'Showreels',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_setting(
			'landingpage_showreel_one_id',
			array(
				'default'           => '201304529',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contact_info_display',
				array(
					'label'       => __( 'Show Contact Information', 'caramel' ),
					'description' => __( 'Enable/Disable the information block', 'caramel' ),
					'section'     => 'caramel_theme_cantact_info',
					'settings'    => 'contact_info_display',
					'type'        => 'radio',
					'choices'	  => array(
						false => 'Hide',
						true => 'Show',
					),
					'priority'    => 10,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contact_info_email',
				array(
					'label'       => __( 'E-Mail', 'caramel' ),
					'description' => __( 'Put in your contact e-mail', 'caramel' ),
					'section'     => 'caramel_theme_cantact_info',
					'settings'    => 'contact_info_email',
					'type'        => 'text',
					'priority'    => 20,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contact_info_display_email',
				array(
					'section'     => 'caramel_theme_cantact_info',
					'description' => __( 'show information', 'caramel' ),
					'settings'    => 'contact_info_display_email',
					'type'        => 'checkbox',
					'choices'	  => array(
						false => 'Hide',
						true => 'Show',
					),
					'priority'    => 30,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contact_info_whatsapp',
				array(
					'label'       => __( 'Whatsapp', 'caramel' ),
					'description' => __( 'Put in your contact number', 'caramel' ),
					'section'     => 'caramel_theme_cantact_info',
					'settings'    => 'contact_info_whatsapp',
					'type'        => 'text',
					'priority'    => 40,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contact_info_display_whatsapp',
				array(
					'section'     => 'caramel_theme_cantact_info',
					'description' => __( 'show information', 'caramel' ),
					'settings'    => 'contact_info_display_whatsapp',
					'type'        => 'checkbox',
					'choices'	  => array(
						false => 'Hide',
						true => 'Show',
					),
					'priority'    => 50,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contact_info_instagram',
				array(
					'label'       => __( 'Instagram', 'caramel' ),
					'description' => __( 'Put in your Instagram-ID', 'caramel' ),
					'section'     => 'caramel_theme_cantact_info',
					'settings'    => 'contact_info_instagram',
					'type'        => 'text',
					'priority'    => 60,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contact_info_display_instagram',
				array(
					'section'     => 'caramel_theme_cantact_info',
					'description' => __( 'show information', 'caramel' ),
					'settings'    => 'contact_info_display_instagram',
					'type'        => 'checkbox',
					'choices'	  => array(
						false => 'Hide',
						true => 'Show',
					),
					'priority'    => 70,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'portfolio_image_mode',
				array(
					'label'       => __( 'Lightbox-Toggle', 'caramel' ),
					'description' => __( 'Choose between a image based or project page portfolio', 'caramel' ),
					'section'     => 'caramel_portfolio_mode',
					'settings'    => 'portfolio_image_mode',
					'type'        => 'radio',
					'choices'	  => array(
						false => 'Project Page',
						true => 'Image',
					),
					'priority'    => 10,
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'landingpage_slider_fullwidth',
				array(
					'label'       => __( 'Fullwidth-Slider', 'caramel' ),
					'description' => __( 'enable full width for slider', 'caramel' ),
					'section'     => 'caramel_landingpage',
					'settings'    => 'landingpage_slider_fullwidth',
					'type'        => 'radio',
					'choices'	  => array(
						true => 'Fullwidth',
						false => 'With Whitespace',
					),
					'priority'    => 10,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'landingpage_slider_controlls',
				array(
					'label'       => __( 'Slider Controlls', 'caramel' ),
					'description' => __( 'enable controll elements of Slider', 'caramel' ),
					'section'     => 'caramel_landingpage',
					'settings'    => 'landingpage_slider_controlls',
					'type'        => 'radio',
					'choices'	  => array(
						true => 'on',
						false => 'off',
					),
					'priority'    => 20,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'landingpage_showreels',
				array(
					'label'       => __( 'Showreel Section', 'caramel' ),
					'description' => __( 'turn on a section for your showreel videos', 'caramel' ),
					'section'     => 'caramel_landingpage',
					'settings'    => 'landingpage_showreels',
					'type'        => 'radio',
					'choices'	  => array(
						true => 'on',
						false => 'off',
					),
					'priority'    => 30,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'landingpage_showreels_title',
				array(
					'label'       => __( 'Showreel Title', 'caramel' ),
					'description' => __( 'Put in a title for your showreel section', 'caramel' ),
					'section'     => 'caramel_landingpage',
					'settings'    => 'landingpage_showreels_title',
					'type'        => 'text',
					'priority'    => 40,
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'landingpage_showreel_one_id',
				array(
					'label'       => __( 'Showreel-One', 'caramel' ),
					'description' => __( 'Put in a link to your showreel vimeo video', 'caramel' ),
					'section'     => 'caramel_landingpage',
					'settings'    => 'landingpage_showreel_one_id',
					'type'        => 'text',
					'priority'    => 40,
				)
			)
		);
	}
}
add_action( 'customize_register', 'caramel_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'caramel_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function caramel_customize_preview_js() {
		wp_enqueue_script(
			'caramel_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'caramel_customize_preview_js' );
