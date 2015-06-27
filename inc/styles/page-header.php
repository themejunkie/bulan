<?php
/**
 * Page header color
 *
 * @package    Aurora
 * @author     ThemePhe
 * @copyright  Copyright (c) 2015, ThemePhe
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'aurora_customizer_page_header_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function aurora_customizer_page_header_styles() {

	// Theme prefix
	$prefix = 'aurora-';

	// Title color
	$title = aurora_mod( $prefix . 'page-header-title-color' );

	if ( $title !== customizer_library_get_default( $prefix . 'page-header-title-color' ) ) {

		$color = sanitize_hex_color( $title );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.page-header .page-title'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Excerpt color
	$excerpt = aurora_mod( $prefix . 'page-header-excerpt-color' );

	if ( $excerpt !== customizer_library_get_default( $prefix . 'page-header-excerpt-color' ) ) {

		$color = sanitize_hex_color( $excerpt );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.page-header p'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'aurora_customizer_library_styles', 'aurora_customizer_page_header_styles' );