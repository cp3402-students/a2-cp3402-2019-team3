/**
 * Various functions for this theme
 * @package Aberration Lite
*/	


(function($) {

   'use strict';	
 
		
/* Go back to the top of the page
 * Special thanks to the Sydney WordPress theme for this awesome function.
 */
		var backTop = function() {
		$(window).scroll(function() {
			if ( $(this).scrollTop() > 800 ) {
				$('.back-to-top').addClass('show');
			} else {
				$('.back-to-top').removeClass('show');
			}
		}); 

		$('.back-to-top').on('click', function() {
			$("html, body").animate({ scrollTop: 0 }, 1000);
			return false;
		});
	};

		
// Dom Ready
	$(function() {
		backTop();	
		
	   	});
		
})(jQuery);





// Lets add some classes to theme elements
jQuery(document).ready(function($){
  $('article').addClass('clearfix');
});