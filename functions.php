<?php
/**
 * Theme functions file
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom hooks and Theme settings.
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 628; /* pixels */
}

if ( ! function_exists( 'bulan_content_width' ) ) :
/**
 * Set new content width if user uses 1 column layout.
 *
 * @since  1.0.0
 */
function bulan_content_width() {
	global $content_width;

	if ( in_array( get_theme_mod( 'theme_layout' ), array( '1c' ) ) ) {
		$content_width = 960;
	}
}
endif;
add_action( 'template_redirect', 'bulan_content_width' );

if ( ! function_exists( 'bulan_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since  1.0.0
 */
function bulan_theme_setup() {

	// Make the theme available for translation.
	load_theme_textdomain( 'bulan', trailingslashit( get_template_directory() ) . 'languages' );

	// Add custom stylesheet file to the TinyMCE visual editor.
	add_editor_style( array( 'assets/css/editor-style.css', bulan_crimnson_text_font(), bulan_oswald_font() ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Register custom navigation menu.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Location', 'bulan' )
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list', 'search-form', 'comment-form', 'gallery', 'caption'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bulan_custom_background_args', array(
		'default-color' => 'f5f5f5'
	) ) );

	// Setup the WordPress core custom header feature.
	add_theme_support( 'custom-header', apply_filters( 'bulan_custom_header_args', array(
		'width'       => 2000,
		'height'      => 480,
		'flex-height' => true
	) ) );

	// Enable theme-layouts extensions.
	add_theme_support( 'theme-layouts',
		array(
			'1c'   => __( '1 Column Wide (Full Width)', 'bulan' ),
			'2c-l' => __( '2 Columns: Content / Sidebar', 'bulan' ),
			'2c-r' => __( '2 Columns: Sidebar / Content', 'bulan' )
		),
		array( 'customize' => false, 'default' => '2c-l' )
	);

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

}
endif; // bulan_theme_setup
add_action( 'after_setup_theme', 'bulan_theme_setup' );

/**
 * Registers custom widgets.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_widget
 */
function bulan_widgets_init() {

	// Register recent posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
	register_widget( 'Bulan_Recent_Widget' );

	// Register social widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-social.php';
	register_widget( 'Bulan_Social_Widget' );

}
add_action( 'widgets_init', 'bulan_widgets_init' );

/**
 * Registers widget areas.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bulan_sidebars_init() {

	register_sidebar(
		array(
			'name'          => __( 'Primary Sidebar', 'bulan' ),
			'id'            => 'primary',
			'description'   => __( 'Main sidebar that appears on the right.', 'bulan' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'bulan_sidebars_init' );

/**
 * Register Crimson Text Google font.
 *
 * @since  1.0.0
 * @return string
 */
function bulan_crimnson_text_font() {

	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Crimson Text, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Crimson Text font: on or off', 'bulan' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Crimson Text:400,700,400italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Register Oswald Google font.
 *
 * @since  1.0.0
 * @return string
 */
function bulan_oswald_font() {

	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Oswald, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'bulan' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Oswald:400,700,300' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Enqueue scripts and styles.
 */
require trailingslashit( get_template_directory() ) . 'inc/scripts.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require trailingslashit( get_template_directory() ) . 'inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require trailingslashit( get_template_directory() ) . 'inc/jetpack.php';

/**
 * Customizer.
 */
require trailingslashit( get_template_directory() ) . 'admin/customizer-library.php';
require trailingslashit( get_template_directory() ) . 'admin/functions.php';

/**
 * Customizer functions.
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer.php';
require trailingslashit( get_template_directory() ) . 'inc/mods.php';

/**
 * We use some part of Hybrid Core to extends our themes.
 *
 * @link  http://themehybrid.com/hybrid-core Hybrid Core site.
 */
require trailingslashit( get_template_directory() ) . 'inc/hybrid/attr.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/theme-layouts.php';
