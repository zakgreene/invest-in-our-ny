// Browser detection for when you get desperate. A measure of last resort.

// http://rog.ie/post/9089341529/html5boilerplatejs
// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }

// Uncomment the below to use:
// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);


function initPage(){
    var ww = $(window).width();

    $(".menu-open, .top__logo").click(function(){
        $(".menu").first().toggleClass('open');
    });
    $(".menu-close").click(function(){
        $(".menu").first().removeClass('open');
    });

    var swiperHome = {
        slidesPerView: 'auto', 
        spaceBetween: 0,
        loop: true,
        speed: 500,
        // freeMode: true,
        // freeModeSticky: true,
        centeredSlides: true,
        initialSlide: 0,
        navigation: {
            nextEl: '.next',
            prevEl: '.prev',
        },
        // autoplay: {
        //     delay: 5000,
        // },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        // breakpoints: {
        //     768: {
        //         spaceBetween: 60,
        //     }
        // },
        // mousewheel: {
        //     forceToAxis: true,
        //     releaseOnEdges: true,
        //     invert: true,
        //     sensitivity: 0,
        // },
    };

    if ($("main").hasClass("home")) {
        var swiper = new Swiper($('.home .swiper-container'), swiperHome);
    }


    // read more

    $(".more__expand").not(".members--names .more__expand").click(function(){
        var container = $(this).parent();
        var info = container.find(".more__text");
        var isOpen = false;

        container.toggleClass('open');
        if (container.hasClass("open")) {
            var maxHeight = 0;
            info.children().each( function() {
                maxHeight = maxHeight + $(this).outerHeight(true);
            });
            info.css("max-height", maxHeight);
        }
        else
            info.css("max-height", "");
    });


    $(".members--names .more__expand").click(function(){
        var container = $(this).parent();
        var info = container.find(".more__text");
        container.toggleClass('open');
        info.slideToggle();
    });



    // Select all links with hashes
    $('a[href*="#"]')
      // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        // On-page links
        if ( location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && 
          location.hostname == this.hostname ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });
}

