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







});