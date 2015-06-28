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

	// Gallery popup
	$(".gallery-icon a[href$='.jpg'], .gallery-icon a[href$='.jpeg'], .gallery-icon a[href$='.png'], .gallery-icon a[href$='.gif']").magnificPopup({
		type:'image',
		gallery: {
			enabled: true
		},
		retina: {
			ratio: 2,
			replaceSrc: function(item, ratio) {
				return item.src.replace(/\.\w+$/, function(m) { return '@2x' + m; });
			}
		}
	});

});