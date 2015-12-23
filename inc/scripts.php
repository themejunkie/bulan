<?php
/**
 * Enqueue scripts and styles.
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Loads the theme styles & scripts.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link  http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 */
function bulan_enqueue() {

	// Load plugins stylesheet
	wp_enqueue_style( 'bulan-plugins-style', trailingslashit( get_template_directory_uri() ) . 'assets/css/plugins.min.css' );

	// if is not a child theme and WP_DEBUG and/or SCRIPT_DEBUG turned on, load the unminified styles & script.
	if ( ! is_child_theme() && WP_DEBUG || SCRIPT_DEBUG ) {

		// Load main stylesheet
		wp_enqueue_style( 'bulan-style', get_stylesheet_uri() );

		// Load custom js plugins.
		wp_enqueue_script( 'bulan-plugins', trailingslashit( get_template_directory_uri() ) . 'assets/js/plugins.min.js', array( 'jquery' ), null, true );

		// Load custom js methods.
		wp_enqueue_script( 'bulan-main', trailingslashit( get_template_directory_uri() ) . 'assets/js/main.js', array( 'jquery' ), null, true );

	} else {

		// Load main stylesheet
		wp_enqueue_style( 'bulan-style', trailingslashit( get_template_directory_uri() ) . 'style.min.css' );

		// Load custom js plugins.
		wp_enqueue_script( 'bulan-scripts', trailingslashit( get_template_directory_uri() ) . 'assets/js/bulan.min.js', array( 'jquery' ), null, true );

	}

	// If child theme is active, load the stylesheet.
	if ( is_child_theme() ) {
		wp_enqueue_style( 'bulan-child-style', get_stylesheet_uri() );
	}

	// Load comment-reply script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Loads HTML5 Shiv
	wp_enqueue_script( 'standard-html5', trailingslashit( get_template_directory_uri() ) . 'assets/js/html5shiv.min.js', array( 'jquery' ), null, false );
	wp_script_add_data( 'standard-html5', 'conditional', 'lte IE 9' );

}
add_action( 'wp_enqueue_scripts', 'bulan_enqueue' );

/**
 * Display the custom header.
 *
 * @since  1.0.0
 */
function bulan_custom_header() {

	// Get the custom header.
	$header = get_header_image();

	// Get the featured image
	$featured = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

	// Set up empty variable
	$image = '';

	// If on single post or page, use the featured image.
	if ( is_single() || is_page() ) {
		if ( $featured ) {
			$image = $featured[0];
		} else {
			$image = $header;
		}
	} else {
		$image = $header;
	}

	// Display the custom header via inline CSS.
	if ( $image ) :
		$header_css = '
			.site-header {
				background-image: url("' . esc_url( $image ) . '");
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
			}
			.site-header::after {
				content: "";
				display: block;
				width: 100%;
				height: 100%;
				background-color: rgba(204, 137, 0, 0.3);
				position: absolute;
				top: 0;
				left: 0;
				z-index: 0;
			}';
	endif;

	if ( ! empty( $header_css ) ) :
		wp_add_inline_style( 'bulan-style', $header_css );
	endif;

}
add_action( 'wp_enqueue_scripts', 'bulan_custom_header' );
