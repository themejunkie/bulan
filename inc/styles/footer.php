<?php
/**
 * Footer color
 *
 * @package    Aurora
 * @author     ThemePhe
 * @copyright  Copyright (c) 2015, ThemePhe
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'aurora_customizer_footer_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function aurora_customizer_footer_styles() {

	// Theme prefix
	$prefix = 'aurora-';

	// Background color
	$bg = aurora_mod( $prefix . 'footer-bg-color' );

	if ( $bg !== customizer_library_get_default( $prefix . 'footer-bg-color' ) ) {

		$color = sanitize_hex_color( $bg );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Text color
	$text = aurora_mod( $prefix . 'footer-text-color' );

	if ( $text !== customizer_library_get_default( $prefix . 'footer-text-color' ) ) {

		$color = sanitize_hex_color( $text );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Link color
	$link = aurora_mod( $prefix . 'footer-link-color' );

	if ( $link !== customizer_library_get_default( $prefix . 'footer-link-color' ) ) {

		$color = sanitize_hex_color( $link );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer p a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Social bg color
	$social_bg = aurora_mod( $prefix . 'footer-social-bg-color' );

	if ( $social_bg !== customizer_library_get_default( $prefix . 'footer-social-bg-color' ) ) {

		$color = sanitize_hex_color( $social_bg );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.social-links a'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Social icon color
	$social_icon = aurora_mod( $prefix . 'footer-social-icon-color' );

	if ( $social_icon !== customizer_library_get_default( $prefix . 'footer-social-icon-color' ) ) {

		$color = sanitize_hex_color( $social_icon );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.social-links a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'aurora_customizer_library_styles', 'aurora_customizer_footer_styles' );