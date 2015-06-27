<?php
/**
 * Search color
 *
 * @package    Aurora
 * @author     ThemePhe
 * @copyright  Copyright (c) 2015, ThemePhe
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'aurora_customizer_search_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function aurora_customizer_search_styles() {

	// Theme prefix
	$prefix = 'aurora-';

	// Search icon color
	$icon = aurora_mod( $prefix . 'search-icon-color' );

	if ( $icon !== customizer_library_get_default( $prefix . 'search-icon-color' ) ) {

		$color = sanitize_hex_color( $icon );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.search-toggle'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Search bg color
	$bg = aurora_mod( $prefix . 'search-bg-color' );

	if ( $bg !== customizer_library_get_default( $prefix . 'search-bg-color' ) ) {

		$color = sanitize_hex_color( $bg );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.search-area'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

}
endif;
add_action( 'aurora_customizer_library_styles', 'aurora_customizer_search_styles' );