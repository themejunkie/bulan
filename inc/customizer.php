<?php
/**
 * Register custom customizer panels, sections and settings.
 *
 * @package    Bulan
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * We register our custom customizer by using the hook.
 *
 * @since  1.0.0
 */
function bulan_customizer_register() {

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// ======= Start Customizer Panels/Sections/Settings ======= //

	// Theme prefix
	$prefix = 'bulan-';

	// Base color
	$color = '#cc8900';

	// General Panels and Sections
	$general_panel = 'general';

	$panels[] = array(
		'id'       => $general_panel,
		'title'    => __( 'General', 'bulan' ),
		'priority' => 10
	);

		// RSS
		$section = $prefix . 'rss-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'RSS', 'bulan' ),
			'priority'    => 100,
			'panel'       => $general_panel,
			'description' => __( 'If you fill the custom rss url below, it will replace the default.', 'bulan' ),
		);
		$options[$prefix . 'custom-rss'] = array(
			'id'           => $prefix . 'custom-rss',
			'label'        => __( 'Custom RSS URL (eg. Feedburner)', 'bulan' ),
			'section'      => $section,
			'type'         => 'url',
			'default'      => ''
		);

		// Comment
		$section = $prefix . 'comment-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Comments', 'bulan' ),
			'priority'    => 110,
			'panel'       => $general_panel,
		);
		$options[$prefix . 'page-comment'] = array(
			'id'           => $prefix . 'page-comment',
			'label'        => __( 'Page Comment', 'bulan' ),
			'description'  => __( 'Enable comment on page', 'bulan' ),
			'section'      => $section,
			'type'         => 'switch',
			'default'      => 1
		);

		// Footer Social
		$section = $prefix . 'footer-social-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Social', 'bulan' ),
			'description' => __( 'Please add full profile link, for example https://twitter.com/theme_junkie/', 'bulan' ),
			'priority'    => 120,
			'panel'       => $general_panel,
		);
		$options[$prefix . 'twitter'] = array(
			'id'           => $prefix . 'twitter',
			'label'        => __( 'Twitter Profile', 'bulan' ),
			'section'      => $section,
			'type'         => 'text'
		);
		$options[$prefix . 'facebook'] = array(
			'id'           => $prefix . 'facebook',
			'label'        => __( 'Facebook Profile', 'bulan' ),
			'section'      => $section,
			'type'         => 'text'
		);
		$options[$prefix . 'gplus'] = array(
			'id'           => $prefix . 'gplus',
			'label'        => __( 'Google Plus Profile', 'bulan' ),
			'section'      => $section,
			'type'         => 'text'
		);
		$options[$prefix . 'linkedin'] = array(
			'id'           => $prefix . 'linkedin',
			'label'        => __( 'Linkedin Profile', 'bulan' ),
			'section'      => $section,
			'type'         => 'text'
		);
		$options[$prefix . 'dribbble'] = array(
			'id'           => $prefix . 'dribbble',
			'label'        => __( 'Dribbble Profile', 'bulan' ),
			'section'      => $section,
			'type'         => 'text'
		);
		$options[$prefix . 'instagram'] = array(
			'id'           => $prefix . 'instagram',
			'label'        => __( 'Instagram Profile', 'bulan' ),
			'section'      => $section,
			'type'         => 'text'
		);

		// Footer Text
		$section = $prefix . 'footer-text-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Footer Text', 'bulan' ),
			'priority'    => 125,
			'panel'       => $general_panel,
		);
		$options[$prefix . 'footer-text'] = array(
			'id'           => $prefix . 'footer-text',
			'label'        => '',
			'description'  => __( 'Customize the footer text.', 'bulan' ),
			'section'      => $section,
			'type'         => 'textarea',
			'default'      => '&copy; Copyright ' . date( 'Y' ) . ' <a href="' . esc_url( home_url() ) . '">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> &middot; Designed by <a href="http://www.theme-junkie.com/">Theme Junkie</a>'
		);

	// Header Panels and Sections
	$header_panel = 'header';

	$panels[] = array(
		'id'       => $header_panel,
		'title'    => __( 'Header', 'bulan' ),
		'priority' => 15
	);

		// Logo
		$section = $prefix . 'logo-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Logo', 'bulan' ),
			'priority'    => 30,
			'panel'       => $header_panel
		);
		$options[$prefix . 'logo'] = array(
			'id'      => $prefix . 'logo',
			'label'   => __( 'Regular Logo', 'bulan' ),
			'section' => $section,
			'type'    => 'media',
			'default' => ''
		);
		// $options[$prefix . 'retina-logo'] = array(
		// 	'id'           => $prefix . 'retina-logo',
		// 	'label'        => __( 'Retina Logo', 'bulan' ),
		// 	'description'  => __( 'The Retina Logo should be twice the size of the Regular Logo.', 'bulan' ),
		// 	'section'      => $section,
		// 	'type'         => 'media',
		// 	'default'      => '',
		// );

		// Sticky Navigation
		$section = $prefix . 'search-icon-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Search', 'bulan' ),
			'description' => __( 'Show search icon', 'bulan' ),
			'priority'    => 35,
			'panel'       => $header_panel
		);
		$options[$prefix . 'search-icon'] = array(
			'id'      => $prefix . 'search-icon',
			'label'   => '',
			'section' => $section,
			'type'    => 'switch',
			'default' => 1
		);

	// Colors Panel and Sections
	$color_panel = 'color';

	$panels[] = array(
		'id'       => $color_panel,
		'title'    => __( 'Color', 'bulan' ),
		'priority' => 20
	);

		// Global colors
		$section = $prefix . 'global-colors-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Global', 'bulan' ),
			'priority'    => 1,
			'panel'       => $color_panel
		);
		$options[$prefix . 'global-text-color'] = array(
			'id'          => $prefix . 'global-text-color',
			'label'       => __( 'Text color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#454545'
		);
		$options[$prefix . 'global-link-color'] = array(
			'id'          => $prefix . 'global-link-color',
			'label'       => __( 'Link color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => $color
		);

		// Search colors
		$section = $prefix . 'search-colors-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Search', 'bulan' ),
			'priority'    => 3,
			'panel'       => $color_panel
		);
		$options[$prefix . 'search-icon-color'] = array(
			'id'          => $prefix . 'search-icon-color',
			'label'       => __( 'Icon color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#ffffff',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'search-bg-color'] = array(
			'id'          => $prefix . 'search-bg-color',
			'label'       => __( 'Background color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => $color,
			'transport'   => 'postMessage'
		);

		// Header colors
		$section = $prefix . 'header-colors-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Header', 'bulan' ),
			'priority'    => 5,
			'panel'       => $color_panel
		);
		$options[$prefix . 'site-title-color'] = array(
			'id'          => $prefix . 'site-title-color',
			'label'       => __( 'Site Title', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#ffffff',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'site-title-border-color'] = array(
			'id'          => $prefix . 'site-title-border-color',
			'label'       => __( 'Site Title Border', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#ffffff',
			'transport'   => 'postMessage'
		);

		// Menu colors
		$section = $prefix . 'menu-colors-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Menu', 'bulan' ),
			'priority'    => 15,
			'panel'       => $color_panel
		);
		$options[$prefix . 'menu-link-bg-color'] = array(
			'id'          => $prefix . 'menu-link-bg-color',
			'label'       => __( 'Background color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#ffffff',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'menu-link-color'] = array(
			'id'          => $prefix . 'menu-link-color',
			'label'       => __( 'Link color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#454545',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'menu-current-hover-color'] = array(
			'id'          => $prefix . 'menu-current-hover-color',
			'label'       => __( 'Hover & current menu color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => $color
		);

		// Posts colors
		$section = $prefix . 'post-colors-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Post', 'bulan' ),
			'description' => __( 'Used for single post only, please navigate the preview to the existing post.', 'bulan' ),
			'priority'    => 25,
			'panel'       => $color_panel
		);
		$options[$prefix . 'post-text-color'] = array(
			'id'          => $prefix . 'post-text-color',
			'label'       => __( 'Text color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#454545',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'post-heading-color'] = array(
			'id'          => $prefix . 'post-heading-color',
			'label'       => __( 'Heading color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#454545',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'post-excerpt-color'] = array(
			'id'          => $prefix . 'post-excerpt-color',
			'label'       => __( 'Excerpt color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#999999',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'post-link-color'] = array(
			'id'          => $prefix . 'post-link-color',
			'label'       => __( 'Link color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => $color,
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'post-link-hover-color'] = array(
			'id'          => $prefix . 'post-link-hover-color',
			'label'       => __( 'Link hover color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#b37800'
		);

		// Page colors
		$section = $prefix . 'page-colors-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Page', 'bulan' ),
			'description' => __( 'Used for page only, please navigate the preview to the existing page.', 'bulan' ),
			'priority'    => 30,
			'panel'       => $color_panel
		);
		$options[$prefix . 'page-text-color'] = array(
			'id'          => $prefix . 'page-text-color',
			'label'       => __( 'Text color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#454545',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'page-heading-color'] = array(
			'id'          => $prefix . 'page-heading-color',
			'label'       => __( 'Heading color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#454545',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'page-link-color'] = array(
			'id'          => $prefix . 'page-link-color',
			'label'       => __( 'Link color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => $color,
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'page-link-hover-color'] = array(
			'id'          => $prefix . 'page-link-hover-color',
			'label'       => __( 'Link hover color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#b37800'
		);

		// Widget colors
		$section = $prefix . 'widget-colors-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Widget', 'bulan' ),
			'priority'    => 35,
			'panel'       => $color_panel
		);
		$options[$prefix . 'widget-bg-title-color'] = array(
			'id'          => $prefix . 'widget-bg-title-color',
			'label'       => __( 'Background Title color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#333333',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'widget-title-color'] = array(
			'id'          => $prefix . 'widget-title-color',
			'label'       => __( 'Title color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#ffffff',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'widget-text-color'] = array(
			'id'          => $prefix . 'widget-text-color',
			'label'       => __( 'Text color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#454545',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'widget-link-color'] = array(
			'id'          => $prefix . 'widget-link-color',
			'label'       => __( 'Link color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#454545',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'widget-link-hover-color'] = array(
			'id'          => $prefix . 'widget-link-hover-color',
			'label'       => __( 'Link Hover color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => $color
		);
		$options[$prefix . 'widget-border-color'] = array(
			'id'          => $prefix . 'widget-border-color',
			'label'       => __( 'Border color', 'bulan' ),
			'description' => __( 'Use for widget with list such as Recent Posts, etc.', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#e0e0e0',
			'transport'   => 'postMessage'
		);

		// Footer colors
		$section = $prefix . 'footer-colors-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Footer', 'bulan' ),
			'priority'    => 40,
			'panel'       => $color_panel
		);
		$options[$prefix . 'footer-bg-color'] = array(
			'id'          => $prefix . 'footer-bg-color',
			'label'       => __( 'Background color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#333333',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'footer-text-color'] = array(
			'id'          => $prefix . 'footer-text-color',
			'label'       => __( 'Text color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#888888',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'footer-link-color'] = array(
			'id'          => $prefix . 'footer-link-color',
			'label'       => __( 'Link color', 'bulan' ),
			'section'     => $section,
			'type'        => 'color',
			'default'     => '#ffffff',
			'transport'   => 'postMessage'
		);
		$options[$prefix . 'footer-social-color'] = array(
			'id'          => $prefix . 'footer-social-color',
			'label'       => __( 'Social color', 'bulan' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[$prefix . 'footer-social-bg-color'] = array(
				'id'          => $prefix . 'footer-social-bg-color',
				'label'       => __( 'Background color', 'bulan' ),
				'section'     => $section,
				'type'        => 'color',
				'default'     => '#ffffff',
				'transport'   => 'postMessage'
			);
			$options[$prefix . 'footer-social-bg-hover-color'] = array(
				'id'          => $prefix . 'footer-social-bg-hover-color',
				'label'       => __( 'Background Hover color', 'bulan' ),
				'section'     => $section,
				'type'        => 'color',
				'default'     => $color
			);
			$options[$prefix . 'footer-social-icon-color'] = array(
				'id'          => $prefix . 'footer-social-icon-color',
				'label'       => __( 'Icon color', 'bulan' ),
				'section'     => $section,
				'type'        => 'color',
				'default'     => '#454545',
				'transport'   => 'postMessage'
			);

	// Background Image Panels and Sections
	$bgimage_panel = 'bg_image';

	$panels[] = array(
		'id'       => $bgimage_panel,
		'title'    => __( 'Background Image', 'bulan' ),
		'priority' => 25
	);

	// Typography Panel and Sections
	$typo_panel = 'typography';

	$panels[] = array(
		'id'       => $typo_panel,
		'title'    => __( 'Typography', 'bulan' ),
		'priority' => 30
	);

		// Global typography
		$section = $prefix . 'global-typography';
		$font_choices = customizer_library_get_font_choices();

		$sections[] = array(
			'id'       => $section,
			'title'    => __( 'Global', 'bulan' ),
			'priority' => 5,
			'panel'    => $typo_panel
		);
		$options[$prefix . 'text-font'] = array(
			'id'          => $prefix . 'text-font',
			'label'       => __( 'Text font', 'bulan' ),
			'section'     => $section,
			'type'        => 'select2',
			'choices'     => $font_choices,
			'default'     => 'Crimson Text',
		);
		$options[$prefix . 'heading-font'] = array(
			'id'          => $prefix . 'heading-font',
			'label'       => __( 'Heading font', 'bulan' ),
			'section'     => $section,
			'type'        => 'select2',
			'choices'     => $font_choices,
			'default'     => 'Oswald',
		);

	// Content Panel and Sections
	$content_panel = 'content-layout';

	$panels[] = array(
		'id'       => $content_panel,
		'title'    => __( 'Content Layout', 'bulan' ),
		'priority' => 35
	);

		// Blog
		$section = $prefix . 'blog-layout-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Blog', 'bulan' ),
			'priority'    => 5,
			'panel'       => $content_panel
		);
		$options[$prefix . 'blog-content'] = array(
			'id'          => $prefix . 'blog-content',
			'label'       => __( 'Blog content', 'bulan' ),
			'section'     => $section,
			'type'        => 'radio',
			'default'     => 'content',
			'choices'     => array(
				'content' => __( 'Content', 'bulan' ),
				'excerpt' => __( 'Excerpt', 'bulan' )
			)
		);

		// Posts
		$section = $prefix . 'posts-layout-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Posts', 'bulan' ),
			'description' => __( 'Posts is a single post page. Please navigate the preview to the single post to see changes.', 'bulan' ),
			'priority'    => 10,
			'panel'       => $content_panel
		);
		$options[$prefix . 'post-meta-group'] = array(
			'id'          => $prefix . 'post-meta-group',
			'label'       => __( 'Post Meta', 'bulan' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[$prefix . 'post-date'] = array(
				'id'          => $prefix . 'post-date',
				'label'       => __( 'Show post date', 'bulan' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[$prefix . 'post-cat'] = array(
				'id'          => $prefix . 'post-cat',
				'label'       => __( 'Show post categories', 'bulan' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[$prefix . 'post-tag'] = array(
				'id'          => $prefix . 'post-tag',
				'label'       => __( 'Show post tags', 'bulan' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[$prefix . 'post-author'] = array(
				'id'          => $prefix . 'post-author',
				'label'       => __( 'Show post author box', 'bulan' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
		$options[$prefix . 'post-date-group'] = array(
			'id'          => $prefix . 'post-date-group',
			'label'       => __( 'Post Date', 'bulan' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[$prefix . 'post-date-style'] = array(
				'id'          => $prefix . 'post-date-style',
				'label'       => __( 'Style', 'bulan' ),
				'section'     => $section,
				'type'        => 'select',
				'default'     => 'absolute',
				'choices'     => array(
					'absolute' => __( 'Absolute (June 16, 2015)', 'bulan' ),
					'relative' => __( 'Relative (1 week ago)', 'bulan' )
				)
			);
		$options[$prefix . 'related-posts-group'] = array(
			'id'          => $prefix . 'related-posts-group',
			'label'       => __( 'Related Posts', 'bulan' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[$prefix . 'related-posts-title'] = array(
				'id'          => $prefix . 'related-posts-title',
				'label'       => __( 'Related Posts Title', 'bulan' ),
				'section'     => $section,
				'type'        => 'text',
				'default'     => __( 'Related Posts', 'bulan' )
			);
			$options[$prefix . 'related-posts'] = array(
				'id'          => $prefix . 'related-posts',
				'label'       => __( 'Show related posts', 'bulan' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[$prefix . 'related-posts-img'] = array(
				'id'          => $prefix . 'related-posts-img',
				'label'       => __( 'Show related posts thumbnail', 'bulan' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);

		// Page
		$section = $prefix . 'page-layout-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Page', 'bulan' ),
			'priority'    => 15,
			'panel'       => $content_panel
		);
		$options[$prefix . 'page-title'] = array(
			'id'          => $prefix . 'page-title',
			'label'       => __( 'Show page title', 'bulan' ),
			'section'     => $section,
			'type'        => 'switch',
			'default'     => 1
		);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

}
add_action( 'init', 'bulan_customizer_register' );
