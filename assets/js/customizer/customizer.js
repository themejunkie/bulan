/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Theme prefix.
	var prefix = "bulan-";

	// Base color
	var base_color = "#cc8900";

	/**
	 * Live preview site title & site description
	 */
	wp.customize( "blogname", function( value ) {
		value.bind( function( to ) {
			$( ".site-title a" ).text( to );
		} );
	} );

	/**
	 * Search color
	 */
	wp.customize( prefix + "search-icon-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#ffffff';
			$( '.search-toggle' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "search-bg-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : base_color;
			$( '.search-toggle' ).css('background-color', to);
		} );
	} );

	/**
	 * Header color
	 */
	wp.customize( prefix + "site-title-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#ffffff';
			$( '#masthead .site-title a' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "site-title-border-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#ffffff';
			$( '#masthead .site-title a' ).css('border-color', to);
		} );
	} );

	/**
	 * Menu color
	 */
	wp.customize( prefix + "menu-link-bg-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#ffffff';
			$( '.main-navigation' ).css('background-color', to);
		} );
	} );
	wp.customize( prefix + "menu-link-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '#site-navigation ul li a' ).css('color', to);
		} );
	} );

	/**
	 * Posts colors
	 */
	wp.customize( prefix + "post-text-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.single .entry-content' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "post-heading-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.single .entry-title, .single .entry-content h1, .single .entry-content h2, .single .entry-content h3, .single .entry-content h4, .single .entry-content h5, .single .entry-content h6' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "post-excerpt-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#999999';
			$( '.page-header p' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "post-link-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : base_color;
			$( '.single .entry-content a, .cat-links a' ).css('color', to);
		} );
	} );

	/**
	 * Page colors
	 */
	wp.customize( prefix + "page-text-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.page .entry-content' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "page-heading-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.page .page-title, .page .entry-content h1, .page .entry-content h2, .page .entry-content h3, .page .entry-content h4, .page .entry-content h5, .page .entry-content h6' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "page-link-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : base_color;
			$( '.page .entry-content a' ).css('color', to);
		} );
	} );

	/**
	 * Widget color
	 */
	wp.customize( prefix + "widget-bg-title-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#333333';
			$( '.widget-title' ).css('background-color', to);
		} );
	} );
	wp.customize( prefix + "widget-title-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#ffffff';
			$( '.widget-title' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "widget-text-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.widget' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "widget-link-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.widget a, .widget li a' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "widget-border-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#e0e0e0';
			$( '.widget li' ).css('border-color', to);
		} );
	} );

	/**
	 * Footer color
	 */
	wp.customize( prefix + "footer-bg-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#333333';
			$( '.site-footer' ).css('background-color', to);
		} );
	} );
	wp.customize( prefix + "footer-text-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#888888';
			$( '.site-info' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "footer-link-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#ffffff';
			$( '.site-info a' ).css('color', to);
		} );
	} );
	wp.customize( prefix + "footer-social-bg-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#ffffff';
			$( '.social-links a' ).css('background-color', to);
		} );
	} );
	wp.customize( prefix + "footer-social-icon-color", function( value ) {
		value.bind( function( to ) {
			to = to ? to : '#454545';
			$( '.social-links a' ).css('color', to);
		} );
	} );

} )( jQuery );
