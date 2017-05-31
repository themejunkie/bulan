<?php
/**
 * Bulan Theme Customizer
 */

// Loads custom control
require trailingslashit( get_template_directory() ) . 'inc/customizer/controls/custom-text.php';

// Loads the customizer settings
require trailingslashit( get_template_directory() ) . 'inc/customizer/posts.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/social.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/misc.php';
require trailingslashit( get_template_directory() ) . 'inc/customizer/colors.php';

/**
 * Custom customizer functions.
 */
function bulan_customize_functions( $wp_customize ) {

	// Register new panel: Design
	$wp_customize->add_panel( 'bulan_design', array(
		'title'       => esc_html__( 'Design', 'bulan' ),
		'description' => esc_html__( 'This panel is used for customizing the design of your site.', 'bulan' ),
		'priority'    => 125,
	) );

	// Register new panel: Theme Options
	$wp_customize->add_panel( 'bulan_options', array(
		'title'       => esc_html__( 'Theme Options', 'bulan' ),
		'description' => esc_html__( 'This panel is used for customizing the Bulan theme.', 'bulan' ),
		'priority'    => 130,
	) );

	// Live preview of Site Title
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	// Enable selective refresh to the Site Title
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title a',
			'settings'         => array( 'blogname' ),
			'render_callback'  => function() {
				return get_bloginfo( 'name', 'display' );
			}
		) );
	}

	// Move the Colors section.
	$wp_customize->get_section( 'colors' )->panel    = 'bulan_design';
	$wp_customize->get_section( 'colors' )->priority = 1;

	// Move the Header Image section.
	$wp_customize->get_section( 'header_image' )->panel    = 'bulan_design';
	$wp_customize->get_section( 'header_image' )->priority = 5;

	// Move the Background Image section.
	$wp_customize->get_section( 'background_image' )->panel    = 'bulan_design';
	$wp_customize->get_section( 'background_image' )->priority = 7;

	// Move the Static Front Page section.
	$wp_customize->get_section( 'static_front_page' )->panel    = 'bulan_design';
	$wp_customize->get_section( 'static_front_page' )->priority = 9;

	// Move the Additional CSS section.
	$wp_customize->get_section( 'custom_css' )->panel    = 'bulan_design';
	$wp_customize->get_section( 'custom_css' )->priority = 11;

	// Move background color to background image section.
	$wp_customize->get_section( 'background_image' )->title = esc_html__( 'Background', 'bulan' );
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

	// Move header text color to header image section.
	$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Header', 'bulan' );
	$wp_customize->get_control( 'header_textcolor' )->section = 'header_image';
	$wp_customize->get_control( 'header_textcolor' )->priority = 99;

}
add_action( 'customize_register', 'bulan_customize_functions', 99 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bulan_customize_preview_js() {
	wp_enqueue_script( 'bulan-customizer', get_template_directory_uri() . '/assets/js/customizer/customizer.js', array( 'customize-preview', 'jquery' ) );
}
add_action( 'customize_preview_init', 'bulan_customize_preview_js' );

/**
 * Custom styles.
 */
function bulan_custom_css() {

	// Set up empty variable.
	$css = '';

	$text = get_theme_mod( 'bulan-global-text-color', '#454545' );
	if ( $text != '#454545' ) {
		$css .= 'body { color: ' . sanitize_hex_color( $text ) . '; } ';
	}

	$link = get_theme_mod( 'bulan-global-link-color', '#cc8900' );
	if ( $link != '#cc8900' ) {
		$css .= 'a, a:visited { color: ' . sanitize_hex_color( $link ) . '; } ';
	}

	$quote = get_theme_mod( 'bulan-global-quote-color', '#454545' );
	if ( $quote != '#454545' ) {
		$css .= 'blockquote { border-color: ' . sanitize_hex_color( $quote ) . '; } ';
	}

	$search_icon = get_theme_mod( 'bulan-search-icon-color', '#454545' );
	if ( $search_icon != '#454545' ) {
		$css .= '.search-toggle { color: ' . sanitize_hex_color( $search_icon ) . '; } ';
	}

	$search_bg = get_theme_mod( 'bulan-search-bg-color', '#333333' );
	if ( $search_bg != '#333333' ) {
		$css .= '.search-area { background-color: ' . sanitize_hex_color( $search_bg ) . '; } ';
	}

	$site_title = get_theme_mod( 'bulan-site-title-color', '#ffffff' );
	if ( $site_title != '#ffffff' ) {
		$css .= '#masthead .site-title a { color: ' . sanitize_hex_color( $site_title ) . '; } ';
	}

	$site_title_border = get_theme_mod( 'bulan-site-title-border-color', '#ffffff' );
	if ( $site_title_border != '#ffffff' ) {
		$css .= '#masthead .site-title a { border-color: ' . sanitize_hex_color( $site_title_border ) . '; } ';
	}

	$footer_bg = get_theme_mod( 'bulan-footer-bg-color', '#333333' );
	if ( $footer_bg != '#333333' ) {
		$css .= '.site-footer { background-color: ' . sanitize_hex_color( $footer_bg ) . '; } ';
	}

	$footer_text = get_theme_mod( 'bulan-footer-text-color', '#888888' );
	if ( $footer_text != '#888888' ) {
		$css .= '.site-footer { color: ' . sanitize_hex_color( $footer_text ) . '; } ';
	}

	$footer_link = get_theme_mod( 'bulan-footer-link-color', '#ffffff' );
	if ( $footer_link != '#ffffff' ) {
		$css .= '.site-footer p a { color: ' . sanitize_hex_color( $footer_link ) . '; } ';
	}

	$social_bg = get_theme_mod( 'bulan-footer-social-bg-color', '#ffffff' );
	if ( $social_bg != '#ffffff' ) {
		$css .= '.social-links a { background-color: ' . sanitize_hex_color( $social_bg ) . '; } ';
	}

	$social_bg_hover = get_theme_mod( 'bulan-footer-social-bg-hover-color', '#cc8900' );
	if ( $social_bg_hover != '#cc8900' ) {
		$css .= '.social-links a:hover { background-color: ' . sanitize_hex_color( $social_bg_hover ) . '; } ';
	}

	$social_icon = get_theme_mod( 'bulan-footer-social-icon-color', '#454545' );
	if ( $social_icon != '#454545' ) {
		$css .= '.social-links a { color: ' . sanitize_hex_color( $social_icon ) . '; } ';
	}

	$menu_bg = get_theme_mod( 'bulan-menu-link-bg-color', '#ffffff' );
	if ( $menu_bg != '#ffffff' ) {
		$css .= '.main-navigation { background-color: ' . sanitize_hex_color( $menu_bg ) . '; } ';
	}

	$menu_link = get_theme_mod( 'bulan-menu-link-color', '#454545' );
	if ( $menu_link != '#454545' ) {
		$css .= '#site-navigation ul li a { color: ' . sanitize_hex_color( $menu_link ) . '; } ';
	}

	$menu_hover = get_theme_mod( 'bulan-menu-current-hover-color', '#cc8900' );
	if ( $menu_hover != '#cc8900' ) {
		$css .= '.menu-primary-items li a:hover, .menu-primary-items li.current-menu-item > a, .menu-primary-items li .sub-menu a:hover, .menu-primary-items li.menu-item-has-children:hover::after { color: ' . sanitize_hex_color( $menu_hover ) . '; } ';
	}

	$menu_dropdown = get_theme_mod( 'bulan-menu-dropdown-hover-bgcolor', '#cc8900' );
	if ( $menu_dropdown != '#cc8900' ) {
		$css .= '.menu-primary-items .sub-menu a:hover { background-color: ' . sanitize_hex_color( $menu_dropdown ) . '; } ';
	}

	$post_text = get_theme_mod( 'bulan-post-text-color', '#454545' );
	if ( $post_text != '#454545' ) {
		$css .= '.single .entry-content { color: ' . sanitize_hex_color( $post_text ) . '; } ';
	}

	$post_heading = get_theme_mod( 'bulan-post-heading-color', '#454545' );
	if ( $post_heading != '#454545' ) {
		$css .= '.single .entry-title, .single .entry-content h1, .single .entry-content h2, .single .entry-content h3,.single .entry-content h4, .single .entry-content h5, .single .entry-content h6 { color: ' . sanitize_hex_color( $post_heading ) . '; } ';
	}

	$post_excerpt = get_theme_mod( 'bulan-post-excerpt-color', '#999999' );
	if ( $post_excerpt != '#999999' ) {
		$css .= '.page-header p{ color: ' . sanitize_hex_color( $post_excerpt ) . '; } ';
	}

	$post_link = get_theme_mod( 'bulan-post-link-color', '#cc8900' );
	if ( $post_link != '#cc8900' ) {
		$css .= '.single .entry-content a, .cat-links a { color: ' . sanitize_hex_color( $post_link ) . '; } ';
	}

	$post_link_hover = get_theme_mod( 'bulan-post-link-hover-color', '#b37800' );
	if ( $post_link_hover != '#b37800' ) {
		$css .= '.single .entry-content a:hover, .cat-links a:hover { color: ' . sanitize_hex_color( $post_link_hover ) . '; } ';
	}

	$page_text = get_theme_mod( 'bulan-page-text-color', '#454545' );
	if ( $page_text != '#454545' ) {
		$css .= '.page .entry-content { color: ' . sanitize_hex_color( $page_text ) . '; } ';
	}

	$page_heading = get_theme_mod( 'bulan-page-heading-color', '#454545' );
	if ( $page_heading != '#454545' ) {
		$css .= '.page .entry-title, .page .entry-content h1, .page .entry-content h2, .page .entry-content h3,.page .entry-content h4, .page .entry-content h5, .page .entry-content h6 { color: ' . sanitize_hex_color( $page_heading ) . '; } ';
	}

	$page_link = get_theme_mod( 'bulan-page-link-color', '#cc8900' );
	if ( $page_link != '#cc8900' ) {
		$css .= '.page .entry-content a, .cat-links a { color: ' . sanitize_hex_color( $page_link ) . '; } ';
	}

	$page_link_hover = get_theme_mod( 'bulan-page-link-hover-color', '#b37800' );
	if ( $page_link_hover != '#b37800' ) {
		$css .= '.page .entry-content a:hover, .cat-links a:hover { color: ' . sanitize_hex_color( $page_link_hover ) . '; } ';
	}

	$widget_title_bg = get_theme_mod( 'bulan-widget-bg-title-color', '#333333' );
	if ( $widget_title_bg != '#333333' ) {
		$css .= '.widget-title { background-color: ' . sanitize_hex_color( $widget_title_bg ) . '; } ';
	}

	$widget_title = get_theme_mod( 'bulan-widget-title-color', '#ffffff' );
	if ( $widget_title != '#ffffff' ) {
		$css .= '.widget-title { color: ' . sanitize_hex_color( $widget_title ) . '; } ';
	}

	$widget_text = get_theme_mod( 'bulan-widget-text-color', '#454545' );
	if ( $widget_text != '#454545' ) {
		$css .= '.widget { color: ' . sanitize_hex_color( $widget_text ) . '; } ';
	}

	$widget_link = get_theme_mod( 'bulan-widget-link-color', '#454545' );
	if ( $widget_link != '#454545' ) {
		$css .= '.widget a, .widget li a { color: ' . sanitize_hex_color( $widget_link ) . '; } ';
	}

	$widget_link_hover = get_theme_mod( 'bulan-widget-link-hover-color', '#cc8900' );
	if ( $widget_link_hover != '#cc8900' ) {
		$css .= '.widget a:hover, .widget li a:hover { color: ' . sanitize_hex_color( $widget_link_hover ) . '; } ';
	}

	$widget_border = get_theme_mod( 'bulan-widget-border-color', '#e0e0e0' );
	if ( $widget_border != '#e0e0e0' ) {
		$css .= '.widget li { border-color: ' . sanitize_hex_color( $widget_border ) . '; } ';
	}

	// Print the custom style
	wp_add_inline_style( 'bulan-style', $css );

}
add_action( 'wp_enqueue_scripts', 'bulan_custom_css' );

/**
 * Display theme documentation on customizer page.
 */
function bulan_documentation_link() {

	// Enqueue the script
	wp_enqueue_script( 'bulan-doc', get_template_directory_uri() . '/assets/js/customizer/doc.js', array(), '1.0.0', true );

	// Localize the script
	wp_localize_script( 'bulan-doc', 'prefixL10n',
		array(
			'prefixURL'   => esc_url( 'http://docs.theme-junkie.com/bulan/' ),
			'prefixLabel' => esc_html__( 'Documentation', 'bulan' ),
		)
	);

}
add_action( 'customize_controls_enqueue_scripts', 'bulan_documentation_link' );

/**
 * Display 'More premium themes' message.
 *
 * @since  1.0.0
 */
function bulan_premium_message() {

	// Enqueue the script
	wp_enqueue_script(
		'bulan-customizer-premium',
		get_template_directory_uri() . '/assets/js/customizer/premium.js',
		array(), '1.0.0',
		true
	);

}
add_action( 'customize_controls_enqueue_scripts', 'bulan_premium_message' );


/**
 * Custom RSS feed url.
 */
function bulan_custom_rss_url( $output, $feed ) {

	// Get the custom rss feed url
	$url = get_theme_mod( 'bulan-custom-rss' );

	// Do not redirect comments feed
	if ( strpos( $output, 'comments' ) ) {
		return $output;
	}

	// Check the settings.
	if ( ! empty( $url ) ) {
		$output = esc_url( $url );
	}

	return $output;
}
add_filter( 'feed_link', 'bulan_custom_rss_url', 10, 2 );

/**
 * Retrieve tags list.
 */
function bulan_tags_list() {

	// Set up empty array.
	$tags = array();

	// Retrieve available tags.
	$tags_obj = get_tags();

	// Set default/empty tag.
	$tags[''] = esc_html__( 'Select a tag &hellip;', 'bulan' );

	// Display the tags.
	foreach ( $tags_obj as $tag ) {
		$tags[$tag->term_id] = esc_attr( $tag->name );
	}

	return $tags;

}

/**
 * Sanitize the checkbox.
 *
 * @param boolean $input.
 * @return boolean (true|false).
 */
function bulan_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Sanitize the Footer Credits
 */
function bulan_sanitize_textarea( $text ) {
	if ( current_user_can( 'unfiltered_html' ) ) {
		$text = $text;
	} else {
		$text = wp_kses_post( $text );
	}
	return $text;
}

/**
 * Sanitize the post date style value.
 */
function bulan_sanitize_post_date_style( $style ) {
	if ( ! in_array( $style, array( 'absolute', 'relative' ) ) ) {
		$style = 'absolute';
	}
	return $style;
}

/**
 * Sanitize home page layout value.
 */
function bulan_sanitize_home_layout( $layout ) {
	if ( ! in_array( $layout, array( 'standard', 'grid' ) ) ) {
		$layout = 'standard';
	}
	return $layout;
}

/**
 * Sanitize blog content value.
 */
function bulan_sanitize_blog_content( $content ) {
	if ( ! in_array( $content, array( 'content', 'excerpt' ) ) ) {
		$content = 'content';
	}
	return $content;
}
