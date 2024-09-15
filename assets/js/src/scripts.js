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

    
        	// Vertical Scroller fade effect
	$(document).ready(function () {
        if ($('.timeline-wrapper').length > 0) {
            var parentContainer = $('.position-details-wrapper');
			var positionDetails = $('.position-details');
			var highlightCircle = $('.timeline-scroller .scroller');
			var lastScrollTop = 0;
			
			parentContainer.on('scroll', function (e) {	
                var scrollTop = parentContainer.scrollTop();
                highlightCircle.css('top', parentContainer.scrollTop() + 'px');

				
				positionDetails.each( elementFx = (index, element) => {
					var distanceFromTop = $(element).offset().top - parentContainer.offset().top;
					var dataSummary = $(element).data('summary');
                    var dataYear = $(element).data('year');

					if (distanceFromTop < 0) { 
						$(element).css('opacity', 1 + distanceFromTop / parentContainer.height());
					} else {
						$(element).css('opacity', 1 - distanceFromTop / parentContainer.height());
					}

                    if (scrollTop > lastScrollTop) {

						if (distanceFromTop < 0) {
                            $(`.${dataSummary}`).fadeOut();
						} else if( distanceFromTop < 100) {
                            $(`.${dataSummary}`).fadeIn()
                            $(`.${dataYear}`).fadeIn().css({
                                'display': 'flex',
                                'left': '0'
                            });
						}

                    } else {
						if (distanceFromTop > 30) {
							$(`.${dataSummary}`).fadeOut();
						}
						else if (distanceFromTop > -50) {
							$(`.${dataSummary}`).fadeIn();
						}
					}
				})
				lastScrollTop = scrollTop;
			});

		}		

    });
    
    // User window position - used to load first short year tab
    $(document).ready(function () {
        $(window).on('scroll', () => {
            var sectionPos = $('#timeline').offset().top - $(window).scrollTop();
            if (sectionPos < 300) {
                $(`.short-year-1`).fadeIn().css({
                    'display': 'flex',
                    'left': '0'
                });
                $('.bar').css('right', '0');
            }

            (function() {
                var skillsPos = $('#skills').offset().top - $(window).scrollTop();
                var $skills = $('.skill');

                //console.log($skills)

                //console.log('container: ' + skillsPos);
                $skills.each((index, element) => { 
                    var elementPos = $(element).offset().top - $(window).scrollTop();
                    console.log('skill-' + index + ': ' + elementPos);
                    if (elementPos <= 100) {
                        $(element).find('img').addClass('active');
                    }
                })
            })();
        })

    });
    



});