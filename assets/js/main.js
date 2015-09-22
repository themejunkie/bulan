var $ = jQuery.noConflict();
$(document).ready(function(){

	// Responsive video
	$(".hentry, .widget").fitVids();

	// Mobile menu
	$('#menu-primary-items').slicknav({
		prependTo: '#site-navigation',
		allowParentLinks: true
	});
	
	// Search toggle
	var container = $(".search-area");
	$(".search-toggle").click(function(e){
		e.stopPropagation();
		container.slideToggle("slow");
		$(".search-toggle").toggleClass("active");
	});
	$(document).click(function(e) {
		if (container.is(":visible") && !container.is(e.target) && container.has(e.target).length === 0) {
			container.slideToggle("slow");
			$(".search-toggle").toggleClass("active");
		}
	});

	// Scroll to top
	$.scrollUp({
		scrollText: '<i class="fa fa-chevron-up"></i>'
	});
	
});