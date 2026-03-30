(function ($) {
	"use strict";

	
	$(window).load(function() {
      var menu      =  $('#portfoliox-menu');
        menu.slicknav({
        	'allowParentLinks': true,
        	'nestedParentLinks': false,
			'closeOnClick': true,
			'closedSymbol': '&#9658;', // Character after collapsed parents.
			'openedSymbol': '&#9660;', // Character after expanded parents.
        });
	
		// First append the close button
		$(".slicknav_menu .slicknav_nav").append('<a id="menu-close" class="slicknav_arrow portfoliox-carrow" href="#menuclose"><i class="fas fa-times"></i></a>');
		
		// Then bind the click event
		$(document).on("click", "#menu-close", function(e) {
			e.preventDefault();
			e.stopPropagation(); // Prevent event bubbling
			$(".slicknav_nav").addClass('slicknav_hidden mhide');
		});

});    //document ready function
    jQuery(document).ready(function($){
		
		// Body click should only remove mhide if clicking outside the menu
		$('body').on("click", function(e) {
			// Check if the click is not on the menu close button or the menu itself
			if (!$(e.target).closest('#menu-close').length && !$(e.target).closest('.slicknav_nav').length) {
				$(".slicknav_nav").removeClass('mhide');
			}
		});

		 $("#portfoliox-menu").portfolioxAccessibleDropDown();

        }); // end document ready
		
    	

    	    $.fn.portfolioxAccessibleDropDown = function () {
			    var el = $(this);

			    /* Make dropdown menus keyboard accessible */

			    $("a", el).focus(function() {
			        $(this).parents("li").addClass("hover");
			    }).blur(function() {
			        $(this).parents("li").removeClass("hover");
			    });
			}

}(jQuery));	