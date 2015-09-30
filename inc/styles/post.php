<?php
/**
 * Posts colors
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'bulan_customizer_post_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function bulan_customizer_post_styles() {

	// Theme prefix
	$prefix = 'bulan-';

	// Text color
	$text = bulan_mod( $prefix . 'post-text-color' );

	if ( $text !== customizer_library_get_default( $prefix . 'post-text-color' ) ) {

		$color = sanitize_hex_color( $text );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.single .entry-content'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Heading color
	$heading = bulan_mod( $prefix . 'post-heading-color' );

	if ( $heading !== customizer_library_get_default( $prefix . 'post-heading-color' ) ) {

		$color = sanitize_hex_color( $heading );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.single .entry-title',
				'.single .entry-content h1',
				'.single .entry-content h2',
				'.single .entry-content h3',
				'.single .entry-content h4',
				'.single .entry-content h5',
				'.single .entry-content h6'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Excerpt color
	$excerpt = bulan_mod( $prefix . 'post-excerpt-color' );

	if ( $excerpt !== customizer_library_get_default( $prefix . 'post-excerpt-color' ) ) {

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

	// Link color
	$link = bulan_mod( $prefix . 'post-link-color' );

	if ( $link !== customizer_library_get_default( $prefix . 'post-link-color' ) ) {

		$color = sanitize_hex_color( $link );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.single .entry-content a',
				'.cat-links a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Link hover color
	$link_hover = bulan_mod( $prefix . 'post-link-hover-color' );

	if ( $link_hover !== customizer_library_get_default( $prefix . 'post-link-hover-color' ) ) {

		$color = sanitize_hex_color( $link_hover );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.single .entry-content a:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'bulan_customizer_library_styles', 'bulan_customizer_post_styles' );