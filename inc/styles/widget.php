<?php
/**
 * Widget color
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'bulan_customizer_widget_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function bulan_customizer_widget_styles() {

	// Theme prefix
	$prefix = 'bulan-';

	// Widget title background color
	$bg_title = bulan_mod( $prefix . 'widget-bg-title-color' );

	if ( $bg_title !== customizer_library_get_default( $prefix . 'widget-bg-title-color' ) ) {

		$color = sanitize_hex_color( $bg_title );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-title'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Widget title color
	$title = bulan_mod( $prefix . 'widget-title-color' );

	if ( $title !== customizer_library_get_default( $prefix . 'widget-title-color' ) ) {

		$color = sanitize_hex_color( $title );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-title'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Widget text color
	$text = bulan_mod( $prefix . 'widget-text-color' );

	if ( $text !== customizer_library_get_default( $prefix . 'widget-text-color' ) ) {

		$color = sanitize_hex_color( $text );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Widget link color
	$link = bulan_mod( $prefix . 'widget-link-color' );

	if ( $link !== customizer_library_get_default( $prefix . 'widget-link-color' ) ) {

		$color = sanitize_hex_color( $link );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget a',
				'.widget li a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Widget link hover color
	$link_hover = bulan_mod( $prefix . 'widget-link-hover-color' );

	if ( $link_hover !== customizer_library_get_default( $prefix . 'widget-link-hover-color' ) ) {

		$color = sanitize_hex_color( $link_hover );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget a:hover',
				'.widget li a:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Widget border color
	$border = bulan_mod( $prefix . 'widget-border-color' );

	if ( $border !== customizer_library_get_default( $prefix . 'widget-border-color' ) ) {

		$color = sanitize_hex_color( $border );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget li'
			),
			'declarations' => array(
				'border-color' => $color
			)
		) );
	}

}
endif;
add_action( 'bulan_customizer_library_styles', 'bulan_customizer_widget_styles' );