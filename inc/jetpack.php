<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package    Aurora
 * @author     ThemePhe
 * @copyright  Copyright (c) 2015, ThemePhe
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Jetpack setup
 * 
 * @since  1.0.0
 */
function aurora_jetpack_setup() {

	/**
	 * Add theme support for Infinite Scroll.
	 * See: http://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer_widgets' => array(
			'footer-one',
			'footer-two',
			'footer-three',
			'footer-four',
		),
		'footer'         => 'page',
	) );
	
	/**
	 * Add theme support for Responsive Videos.
	 */
	add_theme_support( 'jetpack-responsive-videos' );

}
add_action( 'after_setup_theme', 'aurora_jetpack_setup' );

/**
 * Remove sharedaddy from excerpt.
 *
 * @since  1.0.0
 */
function aurora_remove_sharedaddy() {
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
}
add_action( 'loop_start', 'aurora_remove_sharedaddy' );