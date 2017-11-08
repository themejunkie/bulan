<?php
/**
 * Colors Customizer
 */

/**
 * Register the customizer.
 */
function bulan_colors_customize_register( $wp_customize ) {

	// Register global colors setting
	$wp_customize->add_setting( 'bulan-global-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-global-colors', array(
		'label'             => esc_html__( 'GLOBAL', 'bulan' ),
		'section'           => 'colors',
		'priority'          => 1
	) ) );

		// Register text color setting
		$wp_customize->add_setting( 'bulan-global-text-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-global-text-color', array(
			'label'             => esc_html__( 'Text', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 3
		) ) );

		// Register link color setting
		$wp_customize->add_setting( 'bulan-global-link-color', array(
			'default'           => '#cc8900',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-global-link-color', array(
			'label'             => esc_html__( 'Link', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 5
		) ) );

		// Register quote color setting
		$wp_customize->add_setting( 'bulan-global-quote-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-global-quote-color', array(
			'label'             => esc_html__( 'Quote', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 4
		) ) );

		// Register search icon color setting
		$wp_customize->add_setting( 'bulan-search-icon-color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-search-icon-color', array(
			'label'             => esc_html__( 'Search icon', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 7
		) ) );

		// Register search background color setting
		$wp_customize->add_setting( 'bulan-search-bg-color', array(
			'default'           => '#333333',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-search-bg-color', array(
			'label'             => esc_html__( 'Search background', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 8
		) ) );

	// Register header colors setting
	$wp_customize->add_setting( 'bulan-header-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-header-colors', array(
		'label'             => esc_html__( 'HEADER', 'bulan' ),
		'section'           => 'colors',
		'priority'          => 9
	) ) );

		// Register site title color setting
		$wp_customize->add_setting( 'bulan-site-title-color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-site-title-color', array(
			'label'             => esc_html__( 'Site title', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 13
		) ) );

		// Register site title border color setting
		$wp_customize->add_setting( 'bulan-site-title-border-color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-site-title-border-color', array(
			'label'             => esc_html__( 'Site title border', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 15
		) ) );

	// Register menu colors setting
	$wp_customize->add_setting( 'bulan-menu-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-menu-colors', array(
		'label'             => esc_html__( 'MENU', 'bulan' ),
		'section'           => 'colors',
		'priority'          => 17
	) ) );

		// Register menu background color setting
		$wp_customize->add_setting( 'bulan-menu-link-bg-color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-menu-link-bg-color', array(
			'label'             => esc_html__( 'Background', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 19
		) ) );

		// Register link color setting
		$wp_customize->add_setting( 'bulan-menu-link-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-menu-link-color', array(
			'label'             => esc_html__( 'Link', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 23
		) ) );

		// Register menu hover color setting
		$wp_customize->add_setting( 'bulan-menu-current-hover-color', array(
			'default'           => '#cc8900',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-menu-current-hover-color', array(
			'label'             => esc_html__( 'Hover & current', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 25
		) ) );

		// Register menu dropdown hover background color setting
		$wp_customize->add_setting( 'bulan-menu-dropdown-hover-bgcolor', array(
			'default'           => '#cc8900',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-menu-dropdown-hover-bgcolor', array(
			'label'             => esc_html__( 'Dropdown hover', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 26
		) ) );

	// Register posts colors setting
	$wp_customize->add_setting( 'bulan-posts-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-posts-colors', array(
		'label'             => esc_html__( 'POST', 'bulan' ),
		'section'           => 'colors',
		'priority'          => 27
	) ) );

		// Register post text color setting
		$wp_customize->add_setting( 'bulan-post-text-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-post-text-color', array(
			'label'             => esc_html__( 'Text', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 29
		) ) );

		// Register post heading color setting
		$wp_customize->add_setting( 'bulan-post-heading-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-post-heading-color', array(
			'label'             => esc_html__( 'Heading', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 31
		) ) );

		// Register post excerpt color setting
		$wp_customize->add_setting( 'bulan-post-excerpt-color', array(
			'default'           => '#999999',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-post-excerpt-color', array(
			'label'             => esc_html__( 'Excerpt', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 32
		) ) );

		// Register post link color setting
		$wp_customize->add_setting( 'bulan-post-link-color', array(
			'default'           => '#cc8900',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-post-link-color', array(
			'label'             => esc_html__( 'Link', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 33
		) ) );

		// Register post link hover color setting
		$wp_customize->add_setting( 'bulan-post-link-hover-color', array(
			'default'           => '#b37800',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-post-link-hover-color', array(
			'label'             => esc_html__( 'Link hover', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 35
		) ) );

	// Register page colors setting
	$wp_customize->add_setting( 'bulan-page-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-page-colors', array(
		'label'             => esc_html__( 'PAGE', 'bulan' ),
		'section'           => 'colors',
		'priority'          => 37
	) ) );

		// Register page text color setting
		$wp_customize->add_setting( 'bulan-page-text-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-page-text-color', array(
			'label'             => esc_html__( 'Text', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 39
		) ) );

		// Register page heading color setting
		$wp_customize->add_setting( 'bulan-page-heading-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-page-heading-color', array(
			'label'             => esc_html__( 'Heading', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 41
		) ) );

		// Register page link color setting
		$wp_customize->add_setting( 'bulan-page-link-color', array(
			'default'           => '#cc8900',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-page-link-color', array(
			'label'             => esc_html__( 'Link', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 43
		) ) );

		// Register page link hover color setting
		$wp_customize->add_setting( 'bulan-page-link-hover-color', array(
			'default'           => '#b37800',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-page-link-hover-color', array(
			'label'             => esc_html__( 'Link hover', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 45
		) ) );

	// Register widget colors setting
	$wp_customize->add_setting( 'bulan-widget-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-widget-colors', array(
		'label'             => esc_html__( 'WIDGET', 'bulan' ),
		'section'           => 'colors',
		'priority'          => 47
	) ) );

		// Register widget title background color setting
		$wp_customize->add_setting( 'bulan-widget-bg-title-color', array(
			'default'           => '#333333',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-widget-bg-title-color', array(
			'label'             => esc_html__( 'Background title', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 49
		) ) );

		// Register widget title color setting
		$wp_customize->add_setting( 'bulan-widget-title-color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-widget-title-color', array(
			'label'             => esc_html__( 'Title', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 51
		) ) );

		// Register widget text color setting
		$wp_customize->add_setting( 'bulan-widget-text-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-widget-text-color', array(
			'label'             => esc_html__( 'Text', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 53
		) ) );

		// Register widget link color setting
		$wp_customize->add_setting( 'bulan-widget-link-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-widget-link-color', array(
			'label'             => esc_html__( 'Link', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 57
		) ) );

		// Register widget link hover color setting
		$wp_customize->add_setting( 'bulan-widget-link-hover-color', array(
			'default'           => '#cc8900',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-widget-link-hover-color', array(
			'label'             => esc_html__( 'Link hover', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 59
		) ) );

		// Register widget border color setting
		$wp_customize->add_setting( 'bulan-widget-border-color', array(
			'default'           => '#e0e0e0',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-widget-border-color', array(
			'label'             => esc_html__( 'Border', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 61
		) ) );

	// Register footer colors setting
	$wp_customize->add_setting( 'bulan-footer-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-footer-colors', array(
		'label'             => esc_html__( 'FOOTER', 'bulan' ),
		'section'           => 'colors',
		'priority'          => 69
	) ) );

		// Register footer background color setting
		$wp_customize->add_setting( 'bulan-footer-bg-color', array(
			'default'           => '#333333',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-footer-bg-color', array(
			'label'             => esc_html__( 'Background', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 71
		) ) );

		// Register footer color setting
		$wp_customize->add_setting( 'bulan-footer-text-color', array(
			'default'           => '#888888',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-footer-text-color', array(
			'label'             => esc_html__( 'Text color', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 73
		) ) );

		// Register footer link color setting
		$wp_customize->add_setting( 'bulan-footer-link-color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-footer-link-color', array(
			'label'             => esc_html__( 'Link color', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 75
		) ) );

	// Register social colors setting
	$wp_customize->add_setting( 'bulan-social-colors', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-social-colors', array(
		'label'             => esc_html__( 'SOCIAL', 'bulan' ),
		'section'           => 'colors',
		'priority'          => 77
	) ) );

		// Register social background color setting
		$wp_customize->add_setting( 'bulan-footer-social-bg-color', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-footer-social-bg-color', array(
			'label'             => esc_html__( 'Background', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 79
		) ) );

		// Register social background hover color setting
		$wp_customize->add_setting( 'bulan-footer-social-bg-hover-color', array(
			'default'           => '#cc8900',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-footer-social-bg-hover-color', array(
			'label'             => esc_html__( 'Background hover', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 81
		) ) );

		// Register social icon color setting
		$wp_customize->add_setting( 'bulan-footer-social-icon-color', array(
			'default'           => '#454545',
			'sanitize_callback' => 'sanitize_hex_color'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bulan-footer-social-icon-color', array(
			'label'             => esc_html__( 'Icon', 'bulan' ),
			'section'           => 'colors',
			'priority'          => 83
		) ) );

}
add_action( 'customize_register', 'bulan_colors_customize_register' );
