/**
 * Premium notice for theme
 */

( function( $ ) {

	premium = $( '<a href="https://www.theme-junkie.com/themes?utm_source=customizer&utm_medium=button&utm_campaign=bulan" class="premium-link accordion-section-title" target="_blank">Check Out Our Premium Themes</a>' )
		.css({
			'display' : 'block',
			'background-color' : '#2EA2CC',
			'color' : '#fff',
			'font-weight' : 600,
			'font-size' : '14px',
			'cursor' : 'pointer',
			'margin-bottom' : 0,
			'padding-right' : '50px',
			'text-decoration' : 'none'
		})
	;

	setTimeout(function () {
		$( '#customize-theme-controls #accordion-section-themes' ).append( premium );
	}, 200);

	// Remove accordion click event
	$( '.premium-link' ).on( 'click', function( e ) {
		e.stopPropagation();
	});

} )( jQuery );
