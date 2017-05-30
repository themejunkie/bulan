<?php
/**
 * Post Customizer
 */

/**
 * Register the customizer.
 */
function bulan_post_customize_register( $wp_customize ) {

	// Register new section: Post
	$wp_customize->add_section( 'bulan_post' , array(
		'title'       => esc_html__( 'Posts', 'bulan' ),
		'description' => esc_html__( 'Posts is a single post page. Please navigate the preview to the single post to see changes.', 'bulan' ),
		'panel'       => 'bulan_options',
		'priority'    => 5
	) );

	// Register post meta group setting
	$wp_customize->add_setting( 'bulan-post-meta', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-post-meta', array(
		'label'             => esc_html__( 'POST META', 'bulan' ),
		'section'           => 'bulan_post',
		'priority'          => 1
	) ) );

		// Register post categories setting
		$wp_customize->add_setting( 'bulan-post-date', array(
			'default'           => 1,
			'sanitize_callback' => 'bulan_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'bulan-post-date', array(
			'label'             => esc_html__( 'Show post date', 'bulan' ),
			'section'           => 'bulan_post',
			'priority'          => 1,
			'type'              => 'checkbox'
		) );

		// Register post categories setting
		$wp_customize->add_setting( 'bulan-post-cat', array(
			'default'           => 1,
			'sanitize_callback' => 'bulan_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'bulan-post-cat', array(
			'label'             => esc_html__( 'Show post categories', 'bulan' ),
			'section'           => 'bulan_post',
			'priority'          => 3,
			'type'              => 'checkbox'
		) );

		// Register post tags setting
		$wp_customize->add_setting( 'bulan-post-tag', array(
			'default'           => 1,
			'sanitize_callback' => 'bulan_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'bulan-post-tag', array(
			'label'             => esc_html__( 'Show post tags', 'bulan' ),
			'section'           => 'bulan_post',
			'priority'          => 5,
			'type'              => 'checkbox'
		) );

		// Register post author setting
		$wp_customize->add_setting( 'bulan-post-author', array(
			'default'           => 1,
			'sanitize_callback' => 'bulan_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'bulan-post-author', array(
			'label'             => esc_html__( 'Show post author box', 'bulan' ),
			'section'           => 'bulan_post',
			'priority'          => 7,
			'type'              => 'checkbox'
		) );

	// Register post date style setting
	$wp_customize->add_setting( 'bulan-post-date-style-section', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-post-date-style-section', array(
		'label'             => esc_html__( 'POST DATE', 'bulan' ),
		'section'           => 'bulan_post',
		'priority'          => 9
	) ) );

		// Register post author setting
		$wp_customize->add_setting( 'bulan-post-date-style', array(
			'default'           => 'absolute',
			'sanitize_callback' => 'bulan_sanitize_post_date_style',
		) );
		$wp_customize->add_control( 'bulan-post-date-style', array(
			'label'             => esc_html__( 'Style', 'bulan' ),
			'section'           => 'bulan_post',
			'priority'          => 11,
			'type'              => 'radio',
			'choices'           => array(
				'absolute' => esc_html__( 'Absolute (June 16, 2015)', 'bulan' ),
				'relative' => esc_html__( 'Relative (1 week ago)', 'bulan' )
			)
		) );

	// Register related posts setting
	$wp_customize->add_setting( 'bulan-related-posts-section', array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( new Bulan_Custom_Text( $wp_customize, 'bulan-related-posts-section', array(
		'label'             => esc_html__( 'RELATED POSTS', 'bulan' ),
		'section'           => 'bulan_post',
		'priority'          => 13
	) ) );

		// Register related posts title setting
		$wp_customize->add_setting( 'related-posts-title', array(
			'default'           => esc_html__( 'Related Posts', 'bulan' ),
			'sanitize_callback' => 'esc_attr',
		) );
		$wp_customize->add_control( 'related-posts-title', array(
			'label'             => esc_html__( 'Related posts title', 'bulan' ),
			'section'           => 'bulan_post',
			'priority'          => 14,
			'type'              => 'text'
		) );

		// Register related posts enable setting
		$wp_customize->add_setting( 'bulan-related-posts', array(
			'default'           => 1,
			'sanitize_callback' => 'bulan_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'bulan-related-posts', array(
			'label'             => esc_html__( 'Show related posts', 'bulan' ),
			'section'           => 'bulan_post',
			'priority'          => 15,
			'type'              => 'checkbox'
		) );

		// Register related posts image setting
		$wp_customize->add_setting( 'bulan-related-posts-img', array(
			'default'           => 1,
			'sanitize_callback' => 'bulan_sanitize_checkbox',
		) );
		$wp_customize->add_control( 'bulan-related-posts-img', array(
			'label'             => esc_html__( 'Show related posts thumbnail', 'bulan' ),
			'section'           => 'bulan_post',
			'priority'          => 17,
			'type'              => 'checkbox'
		) );

}
add_action( 'customize_register', 'bulan_post_customize_register' );
