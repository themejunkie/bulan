<?php
/**
 * Misc Customizer
 */

/**
 * Register the customizer.
 */
function bulan_misc_customize_register( $wp_customize ) {

	// Register new section: Misc
	$wp_customize->add_section( 'bulan_misc' , array(
		'title'       => esc_html__( 'Misc', 'bulan' ),
		'description' => esc_html__( 'These options is used for customizing general elements.', 'bulan' ),
		'panel'       => 'bulan_options',
		'priority'    => 9
	) );

	// Register Custom RSS setting
	$wp_customize->add_setting( 'bulan-custom-rss', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'bulan-custom-rss', array(
		'label'             => esc_html__( 'Custom RSS', 'bulan' ),
		'description'       => esc_html__( 'Custom RSS URL such as Feedburner.', 'bulan' ),
		'section'           => 'bulan_misc',
		'priority'          => 1,
		'type'              => 'url'
	) );

	// Register blog content setting
	$wp_customize->add_setting( 'bulan-blog-content', array(
		'default'           => 'content',
		'sanitize_callback' => 'bulan_sanitize_blog_content',
	) );
	$wp_customize->add_control( 'bulan-blog-content', array(
		'label'             => esc_html__( 'Blog content', 'bulan' ),
		'section'           => 'bulan_misc',
		'priority'          => 3,
		'type'              => 'radio',
		'choices'           => array(
			'content' => esc_html__( 'Content', 'bulan' ),
			'excerpt' => esc_html__( 'Excerpt', 'bulan' )
		)
	) );

	// Register search setting
	$wp_customize->add_setting( 'bulan-search-icon', array(
		'default'           => 1,
		'sanitize_callback' => 'bulan_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'bulan-search-icon', array(
		'label'             => esc_html__( 'Show search icon', 'bulan' ),
		'section'           => 'bulan_misc',
		'priority'          => 5,
		'type'              => 'checkbox'
	) );

	// Register page title setting
	$wp_customize->add_setting( 'bulan-page-title', array(
		'default'           => 1,
		'sanitize_callback' => 'bulan_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'bulan-page-title', array(
		'label'             => esc_html__( 'Show page title', 'bulan' ),
		'section'           => 'bulan_misc',
		'priority'          => 7,
		'type'              => 'checkbox'
	) );

	// Register page comment setting
	$wp_customize->add_setting( 'bulan-page-comment', array(
		'default'           => 1,
		'sanitize_callback' => 'bulan_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'bulan-page-comment', array(
		'label'             => esc_html__( 'Show page comment', 'bulan' ),
		'section'           => 'bulan_misc',
		'priority'          => 9,
		'type'              => 'checkbox'
	) );

	// Register Footer Credits setting
	$wp_customize->add_setting( 'bulan-footer-text', array(
		'sanitize_callback' => 'bulan_sanitize_textarea',
		'default'           => '&copy; Copyright ' . date( 'Y' ) . ' <a href="' . esc_url( home_url() ) . '">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> &middot; Designed by <a href="http://www.theme-junkie.com/">Theme Junkie</a>'
	) );
	$wp_customize->add_control( 'bulan-footer-text', array(
		'label'             => esc_html__( 'Footer Text', 'bulan' ),
		'section'           => 'bulan_misc',
		'priority'          => 11,
		'type'              => 'textarea'
	) );

}
add_action( 'customize_register', 'bulan_misc_customize_register' );
