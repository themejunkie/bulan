<?php
/**
 * Polylang Compatibility File
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015 - 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

// Theme prefix
$prefix = 'bulan-';

/**
 * Register related posts title strings
 */
$related = bulan_mod( $prefix . 'related-posts-title' ); // Get the data set in customizer
pll_register_string( $prefix . 'related-posts-title', $related, 'Bulan' ); // Register string

/**
 * Register footer text strings
 */
$footer_text = bulan_mod( $prefix . 'footer-text' ); // Get the data set in customizer
pll_register_string( $prefix . 'footer-text', $footer_text, 'Bulan' ); // Register string
