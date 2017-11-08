<?php
/**
 * Social Customizer
 */

/**
 * Register the customizer.
 */
function bulan_social_customize_register( $wp_customize ) {

	// Register new section: Social
	$wp_customize->add_section( 'bulan_social' , array(
		'title'       => esc_html__( 'Social', 'bulan' ),
		'description' => __( 'The social button will appear at the bottom of your site. Please add full profile link, for example https://twitter.com/theme_junkie/', 'bulan' ),
		'panel'       => 'bulan_options',
		'priority'    => 7
	) );

	// Register twitter setting
	$wp_customize->add_setting( 'bulan-twitter', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'bulan-twitter', array(
		'label'             => esc_html__( 'Twitter', 'bulan' ),
		'section'           => 'bulan_social',
		'priority'          => 1,
		'type'              => 'url'
	) );

	// Register facebook setting
	$wp_customize->add_setting( 'bulan-facebook', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'bulan-facebook', array(
		'label'             => esc_html__( 'Facebook', 'bulan' ),
		'section'           => 'bulan_social',
		'priority'          => 3,
		'type'              => 'url'
	) );

	// Register gplus setting
	$wp_customize->add_setting( 'bulan-gplus', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'bulan-gplus', array(
		'label'             => esc_html__( 'Google Plus', 'bulan' ),
		'section'           => 'bulan_social',
		'priority'          => 5,
		'type'              => 'url'
	) );

	// Register linkedin setting
	$wp_customize->add_setting( 'bulan-linkedin', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'bulan-linkedin', array(
		'label'             => esc_html__( 'Linkedin', 'bulan' ),
		'section'           => 'bulan_social',
		'priority'          => 7,
		'type'              => 'url'
	) );

	// Register dribbble setting
	$wp_customize->add_setting( 'bulan-dribbble', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'bulan-dribbble', array(
		'label'             => esc_html__( 'Dribbble', 'bulan' ),
		'section'           => 'bulan_social',
		'priority'          => 9,
		'type'              => 'url'
	) );

	// Register instagram setting
	$wp_customize->add_setting( 'bulan-instagram', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'bulan-instagram', array(
		'label'             => esc_html__( 'Instagram', 'bulan' ),
		'section'           => 'bulan_social',
		'priority'          => 11,
		'type'              => 'url'
	) );

}
add_action( 'customize_register', 'bulan_social_customize_register' );
