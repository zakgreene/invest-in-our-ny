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
        breakpoints: {
            768: {
                spaceBetween: 60,
            }
        },
        // mousewheel: {
        //     forceToAxis: true,
        //     releaseOnEdges: true,
        //     invert: true,
        //     sensitivity: 0,
        // },
        // autoplay: {
        //     delay: 5000,
        // },
    };

    var swiperCaseStudy = {
        slidesPerView: 1, 
        spaceBetween: 0,
        loop: true,
        speed: 500,
        centeredSlides: true,
        initialSlide: 0,
        navigation: {
            nextEl: '.next',
            prevEl: '.prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 'auto', 
                spaceBetween: 20,
                autoHeight: false,
                mousewheel: {
                    forceToAxis: true,
                    releaseOnEdges: true,
                    invert: true,
                    sensitivity: 0,
                }
            }
        }
    };

    if ($("main").hasClass("project")) {
        var swiper = new Swiper($('.project .swiper-container'), swiperCaseStudy);
        
        if (ww >= 768) {
            $(".swiper-container").imagesLoaded( function() {
                swiper.slideToLoop(0);
            });
        }

        $(".project .swiper-slide img").click( function() {
            $(".image-expand figure").html( $(this).clone() );
            $(".image-expand").addClass("open").attr("aria-hidden", "false");
            $("body").addClass("noscroll");
        });

        $(".image-expand").click( function() {
            $(".image-expand").removeClass("open").attr("aria-hidden", "true");
            $("body").removeClass("noscroll");
        });
    }
    else if ($("main").hasClass("home")) {
        var swiper = new Swiper($('.home .swiper-container'), swiperHome);
    }


    // read more

    if (window.location.hash == '#more') {
        openMore();
    }

    $("main.about + .footer .riba a").click( function() {
        openMore();
    });

    function openMore() {
        $("#more").addClass("open");

        var maxHeight = 0;
        $("#more .more__text").children().each( function() {
            maxHeight = maxHeight + $(this).outerHeight(true);
        });
        $("#more .more__text").css("max-height", maxHeight);

        window.setTimeout( function() {
            $(window).scrollTop(0); //$('#more').offset().top - 80
        }, 100);
    }

    $(".more__expand").click(function(){
        var container = $(this).parent();
        var info = container.find(".more__text");
        var isOpen = false;

        if ($(this).hasClass("thought")) {
            // close read more if thought clicked
            if (container.hasClass("open")) {
                container.removeClass("open");
                info.css("max-height", "");
            }
            info = container.find(".more__thought-text");
            container.toggleClass('thought-open');
            if (container.hasClass("thought-open"))
                isOpen = true;
        }
        else {
            // close thought if read more clicked
            if (container.hasClass("thought-open")) {
                container.removeClass("thought-open");
                container.find(".more__thought-text").css("max-height", "");
            }
            container.toggleClass('open');
            if (container.hasClass("open"))
                isOpen = true;
        }
        
        if (isOpen) {
            var maxHeight = 0;
            info.children().each( function() {
                maxHeight = maxHeight + $(this).outerHeight(true);
            });
            info.css("max-height", maxHeight);
        }
        else
            info.css("max-height", "");
    });

    if (typeof target != 'undefined') {
        target.each(function() {
            path.push(this.src);
        });
    }

    if ($(".teaser__figure").length) {
        $(".teaser__figure").imagesLoaded( function() {
            storeDimensions();
        });
    }
}

// animate gifs when they come into view

if ($('.home .teaser__figure img').length)
    var target = $('.home .teaser__figure img');
else if ($('.services__item').length)
    var target = $('.services__item');
var path = [], zenith, nadir, current,
modern = window.requestAnimationFrame;

function preload(arrayOfImages) {
    $(arrayOfImages).each(function(){
        $('<img/>')[0].src = this;
    });
}

$(window).on('load', function() {
    preload(target);
});

$(window).on('load resize', storeDimensions).on('load scroll', function(e) {

    if (typeof target != 'undefined') {
        current = $(this).scrollTop();

        if (e.type == 'load') setTimeout(inMotion, 150);
        else inMotion();

        function inMotion() {
            if (modern) requestAnimationFrame(checkFade);
            else checkFade();
        }
    }
});

function storeDimensions() {

    if (typeof target != 'undefined') {
        clearTimeout(redraw);

        var redraw = setTimeout(function() {

            zenith = []; nadir = [];

            target.each(function() {

                var placement = $(this).offset().top;

                zenith.push(placement-($(window).height()*2/3));
                nadir.push(placement+$(this).outerHeight());
            });
        }, 150);
    }
}

function checkFade() {

    target.each(function(i) {

        var initiated = $(this).hasClass('active');

        if (current > zenith[i] && current < nadir[i]) {
            var src = $(this).attr('src');
            if (!initiated) {
                if ($('.home .teaser__figure img').length) $(this).attr('src', src.replace('_static.gif', '.gif'));
                $(this).addClass('active');
            }
        }
    });
}
