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
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: false,
            nextArrow: false,
            swipeToSlide: true,
            cssEase: 'ease-in-out',
            responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 800,
                  settings: {
                    slidesToShow: 1,
                  }
                }
              ]
        });
    })

    
    // Vertical Scroller fade effect
	$(document).ready(function () {
        var windowWidth = $(window).width();
        if ($('.timeline-wrapper').length > 0 && windowWidth > 1200) {
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
        var windowWidth = $(window).width();
        if( windowWidth > 1200 ) {
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
        }
    });


    $(document).ready(function () {
        var technicalPosActive = false;

        function createScrollListener(initialValue) {
            let positionActive = initialValue;
            return {
                get: () => positionActive,
                set: (newValue) => {
                    positionActive = newValue;
                }
            }
        }

        const { get, set } = createScrollListener(false);

        $(window).on('scroll', () => {
            var sectionPos = $('#skills').offset().top - $(window).scrollTop();
            if (sectionPos < 50 && !get()) {
                set(true);
                terminalLoad();
            }
        })
        
        function terminalLoad() {
            if ( $('.terminal').length > 0  ) {
                let skills = [];
                let prompts = ['ls -a', 'cd skills', 'ls -a', 'cd ..', 'cd wordpress', 'ls -a', 'cd ..', 'cd api-integrations', 'ls -a', ' '];
                let developmentFolders = '<div class="folder-list"><p class="folder">skills</p><p class="folder">wordpress</p><p class="folder">api-integrations</p></div>';
                let skillsFolders = '<div class="folder-list"><p class="folder">HTML5</p><p class="folder">CSS3</p><p class="folder">JavaScript</p><p class="folder">jQuery</p><p class="folder">SASS</p><p class="folder">PHP</p><p class="folder">MySQL</p></div> ';
                let wordpressFolders = '<div class="folder-list"><p class="folder">Custom Themes</p><p class="folder">Custom Plugins</p><p class="folder">WP Rest API</p><p class="folder">ACF Pro</p><p class="folder">ACF Blocks</p><p class="folder">Gravity Forms/SMTP</p><p class="folder">Yoast SEO</p><p class="folder">Multi-Site</p><p class="folder">Woocommerce</p><p class="folder">WP Rocket/Imagify</p><p class="folder">Wordfence Security</p></div>';
                let apiFolders = '<div class="folder-list"><p class="folder">Salesforce/Litify</p><p class="folder">Docusign</p><p class="folder">Zapier</p><p class="folder">Google Sheets</p><p class="folder">Google Maps</p><p class="folder">Postman</p></div>'
                $('.console-text').each(function (index, value) {
                    skills.push($(this).data('text'));
                });

                prompts.forEach((value, index) => {
                    if (index == 0) { 
                        $(`.typed-text-${index + 1} .user-text`).prepend('<span>alexdarmos@MacBook-Pro ~ %</span>');
                        const typed = new Typed(".visible-console-text", {
                            strings: [value],
                            typeSpeed: 100,
                            backSpeed: 75,
                            backDelay: 2000,
                            loop: false
                        });
                    } else {
                        setTimeout(function () {
                            $(`.typed-text-${index} .typed-cursor `).remove();
                            $(`.typed-text-${index + 1} .user-text`).prepend(`<span class="directory-${index + 1}">alexdarmos@MacBook-Pro ~ %</span>`);
                            const typed = new Typed(`.typed-text-${index + 1} .visible-console-text`, {
                                strings: [value],
                                typeSpeed: 100,
                                backSpeed: 75,
                                backDelay: 2000,
                                loop: false
                            });
                            if (index == 1) {
                                $('.typed-text-1').append(developmentFolders);
                            }
                            if (index == 2) { 
                                $(`.directory-3`).html('alexdarmos@MacBook-Pro skills %');
                            }
                            if (index == 3) { 
                                $('.typed-text-3').append(skillsFolders);
                                $(`.directory-4`).html('alexdarmos@MacBook-Pro skills %');
                            }
                            if (index == 5) {
                                $(`.directory-6`).html('alexdarmos@MacBook-Pro wordpress %');
                            }
                            if (index == 6) {
                                $('.typed-text-6').append(wordpressFolders);
                                $(`.directory-7`).html('alexdarmos@MacBook-Pro wordpress %');
                            }
                            if (index == 8) {
                                $(`.directory-9`).html('alexdarmos@MacBook-Pro api-integrations %');
                                
                            }
                            if (index == 9) { 
                                $('.typed-text-9').append(apiFolders);
                                $(`.directory-10`).html('alexdarmos@MacBook-Pro api-integrations %');
                            }
                        }, index * 2200);
                    }
                })
            }

        }
            
        
        
    });
    



});