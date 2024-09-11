jQuery(document).ready(function ($) {
    

    // animated text function
    $(document).ready(function () {
        if ($('.animated-text').length > 0) {
            const typedSpan = $('.visible-animated-text');
            let totype = [];

            $('.animated-text').each(function (index, value) {
                totype.push($(this).data('text'));
            });

            const typed = new Typed(".visible-animated-text", {
                strings: totype,
                typeSpeed: 75,
                backSpeed: 75,
                backDelay: 2000,
                loop: true
            });
        }
    });

    // slick slider
    $(document).ready(function () {
        $('.portfolio-slider').slick({
            dots: true,
            infinite: true,
            fade: false,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1300,
            slidesToShow: 2,
            slidesToScroll: 1,
            // prevArrow: "<span class='arrow arrow-prev'></span>",
            // nextArrow: "<span class='arrow arrow-next'></span>",
            prevArrow: false,
            nextArrow: false,
            swipeToSlide: true,
            cssEase: 'ease-in-out'
        });
    })

    $(document).ready(function () {
        	// Vertical Scroller fade effect
	$(document).ready(function () {
		if ($('.timeline-wrapper').length > 0) {

            var parentContainer = $('.position-details-wrapper');
            
            //var lastElement = $('.position-details-3');
            // Get the height of the bottom element
            //var lastElementHeight = lastElement.outerHeight();
            // Scroll to the bottom element
            //parentContainer.scrollTop(parentContainer.prop('scrollHeight') - lastElementHeight);
            
            




			var positionDetails = $('.position-details');
			var highlightCircle = $('.timeline-scroller .scroller');
			//var scrollerOffset = $('.highlight-circle').data('offset');
			var lastScrollTop = 0;
			
			parentContainer.on('scroll', function (e) {	
                var scrollTop = parentContainer.scrollTop();
				//var highlightScroll = (-scrollerOffset) + ((($('.position-1').offset().top - parentContainer.offset().top) / (parentContainer.offset().top) ) * -100)
				
				//if (highlightScroll < 100) {
					highlightCircle.css('top', parentContainer.scrollTop() + 'px');
				// } else {
				// 	highlightCircle.css('top', '100%');
				// }
				
				positionDetails.each(function (index, element) {
					var distanceFromTop = $(element).offset().top - parentContainer.offset().top;
					var dataSummary = $(element).data('summary');
                    var dataYear = $(element).data('year');
                    console.log(distanceFromTop)
					if (distanceFromTop < 0) { 
						$(element).css('opacity', 1 + distanceFromTop / parentContainer.height());
					} else {
						$(element).css('opacity', 1 - distanceFromTop / parentContainer.height());
					}

					if (scrollTop > lastScrollTop) {
					
						if (distanceFromTop < 0) {
                            $(`.${dataSummary}`).fadeOut();
                            //$(`.${dataYear}`).fadeOut();
						} else if( distanceFromTop < 100) {
							$(`.${dataSummary}`).fadeIn()
                            $(`.${dataYear}`).fadeIn().css({
                                'display': 'flex',
                                'left': '-185px'
                            });
						}

					} else {
						if (distanceFromTop > 30) {
							$(`.${dataSummary}`).fadeOut();
							//$(`.${dataYear}`).fadeOut().css('display', 'flex');
						}
						else if (distanceFromTop > -50) {
							$(`.${dataSummary}`).fadeIn();
							//$(`.${dataYear}`).fadeIn().css('display', 'flex');
						}
					}
				})
				lastScrollTop = scrollTop;
			});

		}		

	});
    })







});