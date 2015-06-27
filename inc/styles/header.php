<?php
/**
 * Header color
 *
 * @package    Bulan
 * @author     ThemePhe
 * @copyright  Copyright (c) 2015, ThemePhe
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
	$desc = bulan_mod( $prefix . 'site-desc-color' );

	if ( $desc !== customizer_library_get_default( $prefix . 'site-desc-color' ) ) {

		$color = sanitize_hex_color( $desc );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#masthead .site-description'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'bulan_customizer_library_styles', 'bulan_customizer_header_styles' );