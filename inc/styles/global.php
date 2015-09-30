<?php
/**
 * Global color
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'bulan_customizer_global_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function bulan_customizer_global_styles() {

	// Theme prefix
	$prefix = 'bulan-';

	// Global text color
	$text = bulan_mod( $prefix . 'global-text-color' );

	if ( $text !== customizer_library_get_default( $prefix . 'global-text-color' ) ) {

		$color = sanitize_hex_color( $text );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Global link color
	$link = bulan_mod( $prefix . 'global-link-color' );

	if ( $link !== customizer_library_get_default( $prefix . 'global-link-color' ) ) {

		$color = sanitize_hex_color( $link );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a',
				'a:visited'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'bulan_customizer_library_styles', 'bulan_customizer_global_styles' );