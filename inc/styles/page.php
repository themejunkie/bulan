<?php
/**
 * Page colors
 *
 * @package    Aurora
 * @author     ThemePhe
 * @copyright  Copyright (c) 2015, ThemePhe
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'aurora_customizer_page_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function aurora_customizer_page_styles() {

	// Theme prefix
	$prefix = 'aurora-';

	// Text color
	$text = aurora_mod( $prefix . 'page-text-color' );

	if ( $text !== customizer_library_get_default( $prefix . 'page-text-color' ) ) {

		$color = sanitize_hex_color( $text );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.page .entry-content'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Heading color
	$heading = aurora_mod( $prefix . 'page-heading-color' );

	if ( $heading !== customizer_library_get_default( $prefix . 'page-heading-color' ) ) {

		$color = sanitize_hex_color( $heading );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.page .page-title',
				'.page .entry-content h1',
				'.page .entry-content h2',
				'.page .entry-content h3',
				'.page .entry-content h4',
				'.page .entry-content h5',
				'.page .entry-content h6'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Link color
	$link = aurora_mod( $prefix . 'page-link-color' );

	if ( $link !== customizer_library_get_default( $prefix . 'page-link-color' ) ) {

		$color = sanitize_hex_color( $link );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.page .entry-content a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Link hover color
	$link_hover = aurora_mod( $prefix . 'page-link-hover-color' );

	if ( $link_hover !== customizer_library_get_default( $prefix . 'page-link-hover-color' ) ) {

		$color = sanitize_hex_color( $link_hover );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.page .entry-content a:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'aurora_customizer_library_styles', 'aurora_customizer_page_styles' );