<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<input type="search" class="search-field field" placeholder="<?php echo esc_attr_x( 'Press enter to search &hellip;', 'placeholder', 'bulan' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'bulan' ) ?>" />
	</div>
</form>
