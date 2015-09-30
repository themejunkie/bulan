<?php
/**
 * Menu color
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'bulan_customizer_menu_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function bulan_customizer_menu_styles() {

	// Theme prefix
	$prefix = 'bulan-';

	// Menu background color
	$bgcolor = bulan_mod( $prefix . 'menu-link-bg-color' );

	if ( $bgcolor !== customizer_library_get_default( $prefix . 'menu-link-bg-color' ) ) {

		$color = sanitize_hex_color( $bgcolor );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.main-navigation'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Menu link color
	$menu_link = bulan_mod( $prefix . 'menu-link-color' );

	if ( $menu_link !== customizer_library_get_default( $prefix . 'menu-link-color' ) ) {

		$color = sanitize_hex_color( $menu_link );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#site-navigation ul li a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Menu current & hover link color
	$current_hover = bulan_mod( $prefix . 'menu-current-hover-color' );

	if ( $current_hover !== customizer_library_get_default( $prefix . 'menu-current-hover-color' ) ) {

		$color = sanitize_hex_color( $current_hover );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.menu-primary-items li a:hover',
				'.menu-primary-items li.current-menu-item > a',
				'.menu-primary-items li .sub-menu a:hover',
				'.menu-primary-items li.menu-item-has-children:hover::after'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'bulan_customizer_library_styles', 'bulan_customizer_menu_styles' );