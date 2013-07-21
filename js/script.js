(function ($, document, window) {
	$(document).ready(function () {

	function SameHeight() {
		var maxHeight1 = -1;
		$('.footer-sidebar-inside').each(function() {
			$(this).height('auto');
			maxHeight1 = maxHeight1 > $(this).height() ? maxHeight1 : $(this).height();
			$(this).height(maxHeight1);
		});
		
		var maxHeight2 = -1;
		var footerList = $('#footer_navigation li').not('#footer_navigation li li');
		footerList.each(function() {
			$(this).height('auto');
			console.log(maxHeight2);
			maxHeight2 = maxHeight2 > $(this).height() ? maxHeight2 : $(this).height();
			$(this).height(maxHeight2);
		});
		/* Dynamic equal width in Footer-Menu */
		var c = footerList.length;
		var n = 100 / c;
		if(($(window).width() < 960) && ($(window).width() > 640)) {
			switch(c) {
				case (c = 4 || 8):
					footerList.css('width', '25%');
					break;
				case (c = 6 || 9):
					footerList.css('width', '33.333%');
					break;
				default:
					footerList.css('width', n + '%');
			}
		} else {
			switch(c) {
				case (c == 4 || 8):
					footerList.css('width', '25%');
					break;
				case (c == 12):
					footerList.css('width', '16.666%');
					break;
				case (c == 5 || 10 || 15):
					footerList.css('width', '20%');
					break;
				default:
					footerList.css('width', n + '%');
			}
		}
	}
	SameHeight();
	$(window).resize(SameHeight);

		/* Main Navigation Font Size */
		function navFontSize() {
			var fontSize;
			var nav = $('#main-nav')
			fontSize = 0.5 + (nav.width() / 1500);
			nav.css({'font-size': fontSize + 'em'});
		}
		navFontSize();
		$(window).resize(navFontSize);
	
		/* Cut the first image of the category description and set it as a featured image */
		/* This method is realy crappy, I guess */
		var catDes = $('.category-description');
		if (catDes.find('img') && catDes.length > 0) {
			$('#content').prepend('<figure class="post-image" id="category-image"></figure>');
			catDes.find('img').first().appendTo('#category-image');
			catDes.find('.meta-thumbnail-caption').appendTo('#category-image');
		}

		/* Toggle Menu */
		$('.menu-toggle').smoothScroll().click(function () {
			$('#main-nav div').slideToggle('200');
		});

		/* Responsive Youtube/Vimeo Videos */
		$('.article').fitVids();
	
		/* Check if Slider exists */
		if($('#front-page-slider').length>0) {
			/* Slider on Frontpage */
			$('#front-page-slider').flexslider({
				slideshow:		true,
				useCSS:			false,
				animation:		'slide',
				direction:		'horizontal',
				reverse:		false,
				touch:			true,
				pauseOnAction:	false,
				pauseOnHover:	false,
				pausePlay:		true,
				start:			function(slider) {
									$('body').removeClass('loading');
								}
			});
		}
	});
}(jQuery, document, window))