<?php
/**
 * Header color
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'bulan_customizer_header_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function bulan_customizer_header_styles() {

	// Theme prefix
	$prefix = 'bulan-';

	// Site title color
	$title = bulan_mod( $prefix . 'site-title-color' );

	if ( $title !== customizer_library_get_default( $prefix . 'site-title-color' ) ) {

		$color = sanitize_hex_color( $title );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#masthead .site-title a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Site description color
	$border = bulan_mod( $prefix . 'site-title-border-color' );

	if ( $border !== customizer_library_get_default( $prefix . 'site-title-border-color' ) ) {

		$color = sanitize_hex_color( $border );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#masthead .site-title a'
			),
			'declarations' => array(
				'border-color' => $color
			)
		) );
	}

}
endif;
add_action( 'bulan_customizer_library_styles', 'bulan_customizer_header_styles' );