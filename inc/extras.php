<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since  1.0.0
 * @param  array $args Configuration arguments.
 * @return array
 */
function bulan_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'bulan_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the body element.
 * @return array
 */
function bulan_body_classes( $classes ) {

	// Theme Prefix
	$prefix = 'bulan-';

	// Adds a class of multi-author to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'multi-author';
	}

	// Adds a class to check custom header
	if ( get_header_image() ) {
		$classes[] = 'has-custom-header';
	} else {
		$classes[] = 'no-custom-header';
	}

	// Adds a class if post/page has featured image
	if ( is_singular() ) {
		if ( has_post_thumbnail( get_the_ID() ) ) {
			$classes[] = 'has-featured-image';
		} else {
			$classes[] = 'no-featured-image';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'bulan_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the post element.
 * @return array
 */
function bulan_post_classes( $classes ) {
	global $post;

	// Theme prefix
	$prefix = 'bulan-';

	// Adds a class if a post hasn't a thumbnail.
	if ( ! has_post_thumbnail() ) {
		$classes[] = 'no-post-thumbnail';
	}

	// Check if post has `<!--more-->` tag
	if ( ! is_singular() ) {
		if ( strpos( $post->post_content, '<!--more-->' ) ) {
			$classes[] = 'has-read-more-tag';
		} else {
			$classes[] = 'no-read-more-tag';
		}
	}

	// Check if sticky post
	if ( ! is_sticky() ) {
		$classes[] = 'no-sticky';
	}

	// Check if use excerpt for blog page
	$content = bulan_mod( $prefix . 'blog-content' );
	if ( $content == 'excerpt' && !is_singular() ) {
		$classes[] = 'use-excerpt';
	}

	return $classes;

}
add_filter( 'post_class', 'bulan_post_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function bulan_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'bulan' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'bulan_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function bulan_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'bulan_render_title' );
endif;

/**
 * Change the excerpt more string.
 *
 * @since  1.0.0
 * @param  string  $more
 * @return string
 */
function bulan_excerpt_more( $more ) {
	return ' <a class="more-link" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Continue Reading', 'bulan' ) . '</a>';
}
add_filter( 'excerpt_more', 'bulan_excerpt_more' );

/**
 * Change the excerpt length.
 *
 * @since  1.0.0
 * @param  string  $more
 * @return string
 */
function bulan_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'bulan_excerpt_length', 999 );

/**
 * Remove theme-layouts meta box on attachment and bbPress post type.
 * 
 * @since 1.0.0
 */
function bulan_remove_theme_layout_metabox() {
	remove_post_type_support( 'attachment', 'theme-layouts' );

	// bbPress
	remove_post_type_support( 'forum', 'theme-layouts' );
	remove_post_type_support( 'topic', 'theme-layouts' );
	remove_post_type_support( 'reply', 'theme-layouts' );
}
add_action( 'init', 'bulan_remove_theme_layout_metabox', 11 );

/**
 * Modifies the theme layout on attachment pages.
 *
 * @since  1.0.0
 */
function bulan_mod_theme_layout( $layout ) {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$post_layout = get_post_layout( get_queried_object_id() );
		if ( 'default' === $post_layout ) {
			$layout = '1c';
		}
	}
	return $layout;
}
add_filter( 'theme_mod_theme_layout', 'bulan_mod_theme_layout', 15 );

/**
 * Extend archive title
 *
 * @since  1.0.0
 */
function bulan_extend_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'bulan_extend_archive_title' );

/**
 * Customize tag cloud widget
 *
 * @since  1.0.0
 */
function bulan_customize_tag_cloud( $args ) {
	$args['largest']  = 12;
	$args['smallest'] = 12;
	$args['unit']     = 'px';
	$args['number']   = 20;
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'bulan_customize_tag_cloud' );

/**
 * Add custom fields to the author profile fields
 *
 * @since  1.0.0
 */
function bulan_new_contactmethods( $contactmethods ) {
	$contactmethods['twitter']   = 'Twitter';
	$contactmethods['facebook']  = 'Facebook';
	$contactmethods['gplus']     = 'Google Plus';
	$contactmethods['instagram'] = 'Instagram';
	$contactmethods['linkedin']  = 'Linkedin';

	// Display the new fields
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'bulan_new_contactmethods', 10, 1 );