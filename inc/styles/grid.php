<?php
/**
 * Posts grid color
 *
 * @package    Aurora
 * @author     ThemePhe
 * @copyright  Copyright (c) 2015, ThemePhe
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'aurora_customizer_grid_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function aurora_customizer_grid_styles() {

	// Theme prefix
	$prefix = 'aurora-';
	
	// Image grayscale
	$grayscale = aurora_mod( $prefix . 'grid-img-grayscale' );

	if ( $grayscale !== customizer_library_get_default( $prefix . 'grid-img-grayscale' ) ) {

		$gray = absint( $grayscale );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.thumbnail-link img'
			),
			'declarations' => array(
				'filter' => 'grayscale(' . $gray . '%)',
				'-webkit-filter' => 'grayscale(' . $gray . '%)'
			)
		) );
	}

	// Title color
	$title = aurora_mod( $prefix . 'grid-title-color' );

	if ( $title !== customizer_library_get_default( $prefix . 'grid-title-color' ) ) {

		$color = sanitize_hex_color( $title );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.thumbnail-detail .entry-title a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Title hover color
	$title_hover = aurora_mod( $prefix . 'grid-title-hover-color' );

	if ( $title_hover !== customizer_library_get_default( $prefix . 'grid-title-hover-color' ) ) {

		$color = sanitize_hex_color( $title_hover );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.thumbnail-detail .entry-title a:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Category color
	$cat = aurora_mod( $prefix . 'grid-cat-color' );

	if ( $cat !== customizer_library_get_default( $prefix . 'grid-cat-color' ) ) {

		$color = sanitize_hex_color( $cat );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.thumbnail-detail .cat-links a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Category hover color
	$cat_hover = aurora_mod( $prefix . 'grid-cat-hover-color' );

	if ( $cat_hover !== customizer_library_get_default( $prefix . 'grid-cat-hover-color' ) ) {

		$color = sanitize_hex_color( $cat_hover );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.thumbnail-detail .cat-links a:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'aurora_customizer_library_styles', 'aurora_customizer_grid_styles' );