// Browser detection for when you get desperate. A measure of last resort.

// http://rog.ie/post/9089341529/html5boilerplatejs
// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }

// Uncomment the below to use:
// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);


function initPage(){
    var ww = $(window).width();

    $(".menu-open").click(function(){
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
        autoplay: {
            delay: 5000,
        },
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
}

