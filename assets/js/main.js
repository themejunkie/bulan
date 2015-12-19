( function ( $ ) {

	$( function () {

		/**
		 * Responsive Video
		 */
		$( '.hentry, .widget' ).fitVids();

		/**
		 * Mobile Menu
		 */
		$( '#menu-primary-items' ).slicknav( {
			prependTo: '#site-navigation',
			allowParentLinks: true
		} );

		/**
		 * Search Toggle
		 */
		var $container = $( '.search-area' );

		$( '.search-toggle' ).on( 'click', function ( e ) {
			e.stopPropagation();
			$container.slideToggle( 'slow' );
		} );

		$( document ).on( 'click', function ( e ) {
			e.stopPropagation();
			if ( $container.is( ':visible' ) && !$container.is( e.target ) && $container.has( e.target ).length === 0 ) {
				$container.slideToggle( 'slow' );
			}
		} );

		/**
		 * Scroll Top
		 */
		$.scrollUp( {
			scrollText: '<i class="fa fa-chevron-up"></i>'
		} );

	} );

}( jQuery ) );
