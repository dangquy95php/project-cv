$(function () {
    $(window).on('load resize', function () {
        var window_width = window.innerWidth;
        var ua = navigator.userAgent;
        if (!(ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)) {
            if (1000 < window_width && window_width < 1450) {
                $('meta[name="viewport"]').attr('content', 'width=1450,initial-scale=1.0,minimum-scale=1.0');
            } else {
                $('meta[name="viewport"]').attr('content', 'width=device-width');
            }
        } else {
        }
    });
});


var target = window.location.hash,
    target = target.replace('#', '');
window.location.hash = "";
$(window).on('load', function () {
    if (target) {
        var offsetTop = $("#" + target).offset().top - $(".c-header2").outerHeight();
        if($(".c-anchor3__sub").length){
            offsetTop =  $("#" + target).offset().top - $(".c-header2").outerHeight() - $(".c-anchor3__sub").outerHeight() ;
        }
        $('html, body').animate({ scrollTop: offsetTop }, 1000, 'swing', function () {});
    }
});

var $window = $(window);
var $bodyHtml = $("body,html");
var $html = $("html");
var $body = $("body");
var breakPoint1 = 767;

/* ======================================
body fix
====================================== */
var scrollPosi;

function bodyFix() {
    scrollPosi = $(window).scrollTop();
    $body.css({
        position: "fixed",
        width: "100%",
        "z-index": "1",
        top: -scrollPosi,
    });
}

function bodyFixReset() {
    $body.css({
        position: "relative",
        width: "auto",
        top: "auto",
    });
    $bodyHtml.scrollTop(scrollPosi);
}

/* ======================================
header
====================================== */
var navPos = $('nav').offset().top;
$(window).on('load scroll', function () {
    $('.c-header2').css("left", -$(window).scrollLeft());
    $('.subnav__cont').css("left", -$(window).scrollLeft());
    $('.c-header3').css("left", -$(window).scrollLeft());

    if (!$("body").hasClass("fixed")) {
        var value = $(this).scrollTop();

        if (value > navPos) {
            $('nav').addClass('is-fixed');
            $('.c-header').css('padding-bottom', $('nav').outerHeight());
            if ($(".c-contact3").length) {
                $(".c-contact3").addClass("is-show");
            }
        } else {
            $('nav').removeClass('is-fixed');
            $('.c-header').removeAttr("style");
            $(".c-contact3").removeClass("is-show");
        }

        if ($(".c-contact3").length) {
            var footerPos = $('.c-footer').offset().top;
            var contact3Pos = $(".c-contact3").offset().top;
            if (contact3Pos > footerPos) {
                $(".c-contact3").removeClass("is-show");
            }
        }

    }
    if ($(window).outerWidth() > 767) {
        if ($(window).scrollTop() > 100) {
            $(".c-header3").addClass("is-scroll");
        } else {
            $(".c-header3").removeClass("is-scroll");
        }
    } else {
        if ($(window).scrollTop() > 60) {
            $(".c-header3__nav").addClass("is-fixed");
        } else {
            $(".c-header3__nav").removeClass("is-fixed");
        }
    }
});

/* ======================================
header SP
====================================== */
var scrl_pos;
$(".c-icon1").click(function () {
    if ($(this).hasClass("is-active")) {
        $('body').removeClass('fixed').removeAttr("style");
        $("html, body").animate({ scrollTop: scrl_pos }, 0);
        $(this).removeClass("is-active");
        $(".c-headersp").removeClass("is-active");
    } else {
        var hheader;
        if ($(".c-header2").hasClass("is-fixed")) {
            hheader = $(".c-header2").height();
        } else {
            hheader = $(".c-header").height() - $(window).scrollTop();

        }
        $(".c-headersp").css({ "top": hheader, "height": "calc(100% - " + hheader + "px)" });
        scrl_pos = $(window).scrollTop();
        $('body').addClass('fixed').css({ 'top': -scrl_pos });
        $(this).addClass("is-active");
        $(".c-headersp").addClass("is-active");
    }
});
$(".c-headersp__close").click(function () {
    $(".c-icon1").trigger("click");
});

$(".c-headersp__nav2__bnt").click(function () {
    $(this).toggleClass("is-active");
    $(".c-headersp__nav2__item").slideToggle(300);
});

/* ======================================
aside
====================================== */
$(".c-aside__bnt").click(function () {
    if ($(".c-aside").hasClass("is-active")) {
        $(".c-aside").removeAttr("style");
        $(".c-aside").removeClass("is-active");
    } else {
        $(".c-aside").css("left", $(".c-aside__inner").width());
        $(".c-aside").addClass("is-active");

    }
});

/* ======================================
c-mv1 - 2
====================================== */
$(document).ready(function () {
    $('.c-mv1').slick({
        centerMode: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        centerPadding: '0px',
        dots: true,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 700,
        asNavFor: '.c-news3'
    });
    $(".c-mv1 .slick-dots").clone().addClass("clone").appendTo(".c-mv1").find("li").removeClass("slick-active");
    if ($(window).outerWidth() > 767) {
        $(".c-mv1 .slick-dots.clone").removeAttr("style").css("left", $(".c-mv1 .slick-dots").width() + 50);
    } else {
        var hnews3 = $(".c-news3").innerHeight();
        $(".c-mv1 .slick-dots.clone").removeAttr("style").css("bottom", -hnews3 - 43);
    }
    setTimeout(function () {
        $(".c-mv1 .slick-dots.clone").find("li:first-child").addClass("slick-active2");
    }, 1);
    $('.c-mv1').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        $(".c-mv1 .clone li").removeClass("slick-active slick-active2");
        $(".c-mv1 .clone li:nth-child(" + (nextSlide + 1) + ")").addClass("slick-active");
    });
    // ----------------------------------------
    $('.c-news3').slick({
        infinite: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        fade: true,
        cssEase: 'linear',
        asNavFor: '.c-mv1'
    });
    // ----------------------------------------
    $('.c-mv2').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        centerPadding: '0px',
        dots: true,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 700,
    });
    $(".c-mv2 .slick-dots").clone().addClass("clone").appendTo(".c-mv2").find("li").removeClass("slick-active");
    if ($(window).outerWidth() > 767) {
        $(".c-mv2 .slick-dots.clone").removeAttr("style").css("left", $(".c-mv2 .slick-dots").width() + 150);
    } else {
        $(".c-mv2 .slick-dots.clone").removeAttr("style");
    }
    setTimeout(function () {
        $(".c-mv2 .slick-dots.clone").find("li:first-child").addClass("slick-active2");
    }, 1);
    $('.c-mv2').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        $(".c-mv2 .clone li").removeClass("slick-active slick-active2");
        $(".c-mv2 .clone li:nth-child(" + (nextSlide + 1) + ")").addClass("slick-active");
    });
    // ----------------------------------------
    $('.c-list39__category').slick({
        variableWidth: true,
        infinite: false,
        speed: 300,
        swipeToSlide: true,
    });
    // ----------------------------------------
    $(".c-box24__txt1").dotdotdot();
    $(".c-box24__txt2").dotdotdot();
    // ----------------------------------------
    if ($(".u-detail").length) {
        if ($(".c-recommend2").length) {
            $(".c-side01__inner2").clone().addClass("is-clone sp-only").insertBefore(".c-recommend2 .c-btn12");
        } else {
            $(".c-side01__inner2").clone().addClass("is-clone is-clone2  sp-only").appendTo(".c-side01");
        }
    }
});

/* ======================================
c-list06
====================================== */
// ----------------------------------------
$(function () {
    $('.jsSlide06').slick({
        infinite: true,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 768,
            settings: {
                centerMode: false,
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 479,
            settings: {
                centerMode: false,
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
        ]
    });
});

/* ======================================
c-list07
====================================== */
$(function () {
    $('.c-list07:not(.noneslider)').slick({
        infinite: true,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 768,
            settings: {
                centerMode: false,
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 479,
            settings: {
                centerMode: false,
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
        ]
    });
});

/* ======================================
c-brand
====================================== */
$(document).ready(function () {
    $('.c-brand__row.is-type1').slick({
        autoplay: true,
        autoplaySpeed: 0,
        speed: 5000,
        arrows: false,
        infinite: true,
        variableWidth: true,
        cssEase: 'linear'
    });
    $('.c-brand__row.is-type2').slick({
        autoplay: true,
        autoplaySpeed: 0,
        speed: 5000,
        arrows: false,
        infinite: true,
        variableWidth: true,
        cssEase: 'linear',
        rtl: true
    });
});

/* ======================================
c-slide1
====================================== */
$('.c-slide1__wrap').slick({
    arrows: true,
    dots: false,
    infinite: true,
    autoplay: false,
    slidesToShow: 1,
    slidesToScroll: 1
});

/* ======================================
c-slide2
====================================== */
$('.c-slide2 .c-list12').slick({
    arrows: true,
    dots: false,
    infinite: true,
    autoplay: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 768,
        settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 479,
        settings: {
            slidesToShow: 1
        }
    }
    ]
});

/* ======================================
c-slide3
====================================== */
$(document).ready(function () {

    $rootNav = $('.c-slide3__nav');
    $rootSingle = $('.c-slide3__main');
    $afterTransform = false;
    $clickDirection = null;
    $initGoto = false;
    $getDirection = function (slick, currentSlide, nextSlide, clickDirection) {
        var direction;
        var slideCount = slick.slideCount - 1;
        if (nextSlide === currentSlide) {
            direction = "same";
        } else if (Math.abs(nextSlide - currentSlide) === 1) {
            direction = (nextSlide - currentSlide > 0) ? "next" : "prev";
        } else {
            if (clickDirection !== null) {
                if (slick.activeBreakpoint === 768) {
                    if (clickDirection < currentSlide) {
                        if (currentSlide === slideCount && clickDirection === 0) {
                            direction = 'next';
                        } else {
                            direction = 'prev';
                        }
                    } else if (clickDirection > currentSlide) {
                        if (currentSlide === 0 && clickDirection === slideCount) {
                            direction = 'prev';
                        } else {
                            direction = 'next';
                        }
                    }
                } else {
                    if (clickDirection < currentSlide) {
                        direction = 'prev';
                    } else if (clickDirection > currentSlide) {
                        direction = 'next';
                    }
                }
            } else {
                if (currentSlide === 0 && nextSlide === slideCount) {
                    direction = 'prev';
                } else if (currentSlide === slideCount && nextSlide === 0) {
                    direction = 'next';
                }
            }
        }
        return direction;
    };
    $('.c-slide3__navItem', $rootNav).on('click', function () {
        $clickDirection = $(this).data('slick-index');
    });
    $('.c-slide3__mainItem', $rootSingle).on('click', function () {
        $clickDirection = $(this).data('slick-index');
    });
    //======================================================================//
    $rootNav.slick({
        // slide: '.c-slide3__navItem',
        dots: false,
        arrows: false,
        infinite: true,
        centerMode: true,
        centerPadding: 0,
        variableWidth: true,
        focusOnSelect: true,
        initialSlide: 0,
        slidesToScroll: 1,
        slidesToShow: 3,
        asNavFor: '.c-slide3__main',
        responsive: [{
            breakpoint: 768,
            settings: {
                vertical: true,
                verticalScrolling: true,
                slidesToShow: 5,
            }
        }]
    });
    $rootNav.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        //console.log('============BeforeChange Nav============');
        var direction = $getDirection(slick, currentSlide, nextSlide, $clickDirection);
        var slideCount = slick.slideCount - 1;
        if (direction === "prev" && (currentSlide === 0 || nextSlide > currentSlide)) {
            $('.slick-cloned[data-slick-index="' + (nextSlide - slideCount - 1) + '"]', event.target).addClass('nav-cloned');
        } else if (direction === 'next' && (currentSlide === slideCount || nextSlide < currentSlide)) {
            $('.slick-cloned[data-slick-index="' + (nextSlide + slideCount + 1) + '"]', event.target).addClass('nav-cloned');
        }
    });
    $rootNav.on('afterChange', function (event, slick, currentSlide) {
        //console.log('============AfterChange Nav============');
        $('.nav-cloned', event.target).removeClass('nav-cloned');
        $clickDirection = null;
    });
    //======================================================================//
    $rootSingle.on('init reInit', function (event, slick) {
        $('.slick-slide', event.target).addClass('item-full');
        setTimeout(function () {
            // $('.slick-slide', event.target).css({ "height": event.target.offsetHeight });
            $('.slick-slide', event.target).not('.slick-current').removeClass('item-full').addClass('item-small');
            $initGoto = true;
            $rootSingle.slick('slickGoTo', slick.currentSlide);
        }, 100);
    }).slick({
        // slide: '.c-slide3__mainItem',
        dots: false,
        arrows: true,
        infinite: true,
        centerMode: true,
        centerPadding: 0,
        variableWidth: true,
        focusOnSelect: true,
        useTransform: false,
        initialSlide: 0,
        slidesToScroll: 1,
        slidesToShow: 3,
        asNavFor: '.c-slide3__nav',
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                variableWidth: false,
                centerPadding: '10px',
            }
        }]
    });
    $rootSingle.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        //console.log('============BeforeChange Item============');
        var direction = $getDirection(slick, currentSlide, nextSlide, $clickDirection);
        var slideCount = slick.slideCount - 1;
        var nextSlideIndex = nextSlide;

        if (direction === "prev") {
            //console.log('Direction prev');
            if (currentSlide === 0 || nextSlide > currentSlide) {
                nextSlideIndex = nextSlide - slideCount - 1;
                $('.slick-cloned[data-slick-index="' + nextSlideIndex + '"]', event.target).removeClass('item-small').addClass('item-full item-cloned');
                $afterTransform = nextSlide;
            }
        } else if (direction === "next") {
            //console.log('Direction next');
            if (currentSlide === slideCount || nextSlide < currentSlide) {
                nextSlideIndex = nextSlide + slideCount + 1;
                $('.slick-cloned[data-slick-index="' + (nextSlideIndex) + '"]', event.target).removeClass('item-small').addClass('item-full item-cloned');
                $afterTransform = nextSlide;
            }
        }

        // console.log('Direction: ' + direction);
        // console.log('currentSlide: ' + currentSlide);
        // console.log('nextSlide: ' + nextSlide);
        // console.log('nextSlideIndex: ' + nextSlideIndex);
        // console.log('$afterTransform: ' + $afterTransform);

        $('.slick-slide[data-slick-index="' + currentSlide + '"]', event.target).removeClass('item-full').addClass('item-small');
        if ($afterTransform === false) {
            $('.slick-slide[data-slick-index="' + nextSlide + '"]', event.target).removeClass('item-small').addClass('item-full');
        }

        $('.slick-track', event.target).css({ "transform": "translate3d(" + $rootSingle.slick('getLeft', nextSlideIndex) + "px, 0px, 0px)" });
        $('.slick-track', event.target).css({ "transition": "transform 500ms ease 0s" });
    });
    $rootSingle.on('afterChange', function (event, slick, currentSlide) {
        //console.log('============AfterChange Item============');
        if ($initGoto === true) {
            $('.slick-slide', event.target).addClass('show');
            $initGoto = false;
            return true;
        }
        $('.item-cloned', event.target).removeClass('item-full item-cloned').addClass('item-small');
        if ($afterTransform !== false) {
            $('.slick-slide[data-slick-index="' + currentSlide + '"]', event.target).removeClass('item-small').addClass('item-full');
            $('.slick-track', event.target).css({ "transform": "translate3d(" + $rootSingle.slick('getLeft', $afterTransform) + "px, 0px, 0px)" });
            $('.slick-track', event.target).css({ "transition": false });
            $afterTransform = false;
        }
        $clickDirection = null;
    });
});

//===================================================
// IE
//===================================================
var userAgent, ieReg, ie;
userAgent = window.navigator.userAgent;
ieReg = /msie|Trident.*rv[ :]*11\./gi;
ie = ieReg.test(userAgent);

if (ie) {
    $(".c-mv1__item, .c-mv2__img, .c-list02__img, .c-list03__img, .c-list12__img, .c-imgtext04__bg, .c-box9__img, .c-list24__img, .c-list26__img, .c-list27__img, .c-list07__img, .c-list30__img, .c-list33__img, .c-imgtext05__img, .c-popup__open").each(function () {
        var $container = $(this),
            imgUrl = $container.find("img").prop("src");
        if (imgUrl) {
            $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("custom-object-fit");
        }
    });
}

/* ======================================
format
====================================== */
$(window).on("load resize", function (e) {
    $(".c-list07__ttl").matchHeight();
    $(".c-list06__ttl").matchHeight();
    $(".c-list10__heading").matchHeight();
    $(".c-list12__info").matchHeight();
    $(".c-list15__txt").matchHeight();
    $(".c-list23__img").matchHeight();
    $(".c-list15__info").matchHeight();
    $(".c-news3__txt").matchHeight();
    $(".c-list29__ttl").matchHeight();
    $(".c-list29__des").matchHeight();
    $(".c-list30__ttl").matchHeight();
    $(".c-list30__txt").matchHeight();
    $(".c-list19__detail").matchHeight();
    $(".c-list33__ttl").matchHeight();
    $(".c-list02__ttl").matchHeight();
    $(".c-list03__ttl").matchHeight();
    $(".subnav__item2 .icon").matchHeight();
    $(".subnav__item2 .txt").matchHeight();
    $(".subnav__item3 .logo").matchHeight();
    $(".subnav__item3 .txt").matchHeight();
    $(".c-list005__item .c-bl002__img").matchHeight();
    $(".c-box19__list li p").matchHeight();
    $(".c-box21__list__img").matchHeight();
    $(".c-list40__box").matchHeight();
    $(".c-list43__inner").matchHeight();
    $(".c-list45__box").matchHeight();
    $(".c-list41__item:nth-child(1)").matchHeight();
    $(".c-list41__item:nth-child(2)").matchHeight();
    $(".c-list41__item:nth-child(3)").matchHeight();
    $(".c-list52__img").matchHeight();

    //list23
    var widthItem = $('.c-list23__item').outerWidth();
    $('.c-list23__item').css('height', widthItem);

    if ($(window).outerWidth() > 767) {
        //pc
        $(".c-mv1 .slick-dots:not(.clone), .slick-arrow").removeAttr("style");
        $(".c-mv1 .slick-dots.clone").removeAttr("style").css("left", $(".c-mv1 .slick-dots").width() + 50);
        $(".c-mv2 .slick-dots.clone").removeAttr("style").css("left", $(".c-mv2 .slick-dots").width() + 150);
        $(".c-list20__txt").matchHeight();
        $(".c-list20__img").matchHeight();
    } else {
        //sp
        var hnews3 = $(".c-news3").innerHeight();
        var wslickdots = ($(".c-mv1 .slick-dots:not(.clone)").innerWidth() / 2) + 30;
        $(".c-mv1 .slick-prev").css({ "left": "calc(50% - " + wslickdots + "px)", "bottom": -hnews3 - 20 });
        $(".c-mv1 .slick-next").css({ "right": "calc(50% - " + wslickdots + "px)", "bottom": -hnews3 - 20 });
        $(".c-mv1 .slick-dots:not(.clone)").css("bottom", -hnews3 - 12)
        $(".c-mv1 .slick-dots.clone").removeAttr("style").css("bottom", -hnews3 - 43);
        var wslickdots2 = ($(".c-mv2 .slick-dots:not(.clone)").innerWidth() / 2) + 30;
        $(".c-mv2 .slick-dots.clone").removeAttr("style");
        $(".c-mv2 .slick-prev").css({ "left": "calc(50% - " + wslickdots2 + "px)" });
        $(".c-mv2 .slick-next").css({ "right": "calc(50% - " + wslickdots2 + "px)" });
    }
});

/* ======================================
tab
====================================== */
$('.c-tab__links').on('click', function () {

    var tabThis = $(this);
    var tabParent = $(this).parents('.c-tab__wrap');
    var tabContent = $(this).data('tab');
    var objContent = $('#' + tabContent);

    $('.c-tab__links', tabParent).removeClass('is-active');
    tabThis.addClass('is-active');

    if (objContent.length) {
        $('.c-tab__content', tabParent).hide();
        objContent.show();
    }
    $(".c-block07 .c-list30__txt").matchHeight();
});

/* ======================================
c-accordion
====================================== */
$('.c-accordion').each(function () {
    $('.c-accordion__heading', this).on('click', function () {
        $(this).toggleClass('is-open');
        $(this).next().slideToggle();
    });

    $('.c-accordion__close', this).on('click', function () {
        $(this).parent().prev().toggleClass('is-open');
        $(this).parent().slideToggle();
    });
});


$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $(".c-aside").addClass("is-show");
    } else {
        $(".c-aside").removeClass("is-show");
    }
});

/* ======================================
c-faq
====================================== */
$(function () {
    $('.c-faq__question').on('click', function (e) {
        e.preventDefault();
        if ($(this).hasClass('is-active')) {
            $(this).removeClass('is-active');
            $(this).next()
                .stop()
                .slideUp(300);
        } else {
            $(this).addClass('is-active');
            $(this).next()
                .stop()
                .slideDown(300);
        }
    });
})

/* ======================================
smooth scroll
====================================== */

if ($(".c-header3").length) {
    $('a[href*=\\#]:not([href=\\#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            && location.hostname == this.hostname) {
            var $target = $(this.hash);
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
            var offsetTop = $(window).width() > 767 ? 80 : 60;
            if ($target.length) {
                var targetOffset = $target.offset().top - offsetTop;
                $('html,body').animate({ scrollTop: targetOffset }, 1000);
                return false;
            }
        }
    });
} else {
    $('a[href*=\\#]:not([href=\\#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
            location.hostname == this.hostname) {
            var $target = $(this.hash);
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
            var offsetTop = $(".c-header2").outerHeight();
            var anchor = $('.c-anchor2__sub').outerHeight();
            var anchor2 = $('.c-anchor3__sub').outerHeight();
            if ($target.length) {
                if (anchor > 0) {
                    var targetOffset = $target.offset().top - offsetTop - anchor;
                } else if (anchor2 > 0) {
                    var targetOffset = $target.offset().top - offsetTop - anchor2;
                } else {
                    var targetOffset = $target.offset().top - offsetTop;
                }
                $('html,body').animate({ scrollTop: targetOffset }, 1000);
                return false;
            }
        }
    });
}
/* ======================================
fixed anchor
====================================== */
$(window).scroll(function () {
    var scrollDistance = $(window).scrollTop();
    var offsetTop = $(".c-header2").outerHeight();
    var anchorBar = $(".c-anchor2__sub").outerHeight() + 30;
    var anchorBar2 = $(".c-anchor3__sub").outerHeight() + 30;

    if ($('.c-anchor2').length > 0) {
        if (scrollDistance > $('.c-anchor2').position().top - offsetTop) {
            $('.c-anchor2').addClass('fixed');
        } else {
            $('.c-anchor2').removeClass('fixed');
        }

        $(".jsAnchor").each(function () {
            var el = $(this),
                className = el.attr("id");
            if (el.offset().top - offsetTop - anchorBar < scrollDistance) {
                $('.c-anchor2__item').removeClass('is-active');
                $('.c-anchor2__txt[href=#' + className + ']').parent().addClass('is-active');
            } else {
            }
        });
    }

    if ($('.c-anchor3').length > 0) {
        if (scrollDistance > $('.c-anchor3').position().top - offsetTop) {
            $('.c-anchor3').addClass('fixed');
        } else {
            $('.c-anchor3').removeClass('fixed');
        }

        $(".jsAnchor2").each(function () {
            var el2 = $(this),
                className = el2.attr("id");
            if (el2.offset().top - offsetTop - anchorBar2 < scrollDistance) {
                $('.c-anchor3__item').removeClass('is-active');
                $('.c-anchor3__txt[href=#' + className + ']').parent().addClass('is-active');
            } else {
            }
        });
    }
}).scroll();

/* ======================================
popup
====================================== */
$('.c-popup__open').click(function (event) {
    event.preventDefault();
    var elem = $(this).data('id');
    $(elem).css('display', 'flex');
    $('body').addClass('popup-open');
    $('body').attr('curent-popup', elem);
    bodyFix();

    $('.c-popup__close', $(elem)).click(function (event) {
        event.preventDefault();
        $(elem).hide();
        $('body').removeClass('popup-open');
        $('body').attr('curent-popup', null);
        bodyFixReset();
    });
});

/* ======================================
mouseup
====================================== */
$(document).mouseup(function (e) {
    var $container = $($('body').attr('curent-popup') + ' .c-modal__content');
    if ($container.length && !$container.is(e.target) && $container.has(e.target).length === 0) {
        $container.parent().hide();
        $('body').removeClass('popup-open');
        $('body').attr('curent-popup', null);
        bodyFixReset();
    }
});

/* ======================================
外部リンクアイコン
is-outlinkicon のクラス内のコンテンツに対し
外部リンク全てにアイコンをつける
====================================== */
$(function () {
    var iconarea = $('.is-outlinkarea');
    var iconarealink = $('.is-outlinkarea a');

    if (iconarea.length) {
        iconarealink.each(function (index, value) {
            var href = $(this).attr("href");
            if (
                href.match(/http/) &&
                !href.match(/amano.cd/) &&
                !href.match(/tis.amano/) &&
                !href.match(/amano.inboundtools.com/) &&
                !href.match(/go.amano.co.jp/) &&
                !href.match(/open0384.test20008/)) {
                console.log(href);
                $(this).addClass("is-outlink");
                $(this).attr("target", "_blank");
                $(this).attr("rel", "noopener noreferrer");
            }
        });
    }
});

/* ======================================
c-box17
====================================== */
$(window).on("load resize", function (e) {
    if ($(window).outerWidth() > 767) {
        $('.c-box17 .c-box17__heading').addClass('is-open');
        $('.c-box17__info > .c-box17__ttl').removeAttr('style');
    }

    $('.c-box17').each(function () {
        $('.c-box17__heading', this).on('click', function () {
            $(this).toggleClass('is-open');
            $(this).parent().find('.c-box17__expand').slideToggle();
            if ($(window).outerWidth() < 768) {
                $(this).parent().find('.c-box17__info > .c-box17__ttl').slideToggle();
            }
        });
        if ($('.c-box17__heading', this).hasClass('is-open')) {
            $(this).parent().find('.c-box17__expand').show();
            if ($(window).outerWidth() < 768) {
                $(this).parent().find('.c-box17__info > .c-box17__ttl').hide();
            }
        }
    });
});

$(window).scroll(function () {
    var point = $('.c-mv4').height() / 2;
    var point2 = $('.c-mv5').height() / 2;
    var point3 = $('.c-mv6').height() / 2;

    if ($(this).scrollTop() > point || $(this).scrollTop() > point2 || $(this).scrollTop() > point3) {
        $(".c-sideDL").addClass("is-show");
        $(".c-downloadfile").addClass("is-show");
    } else {
        $(".c-sideDL").removeClass("is-show");
        $(".c-downloadfile").removeClass("is-show");
    }
});

$(window).on("load resize scroll", function (e) {
    if ($(window).outerWidth() > 767) {
        var hHeader2 = 65;
        var hHeader = 170;
        $('.c-header2__nav__link>li').each(function () {
            if ($(this).closest('.c-header2').hasClass('is-fixed')) {
                $(this).find('.subnav').css('top', hHeader2);
            } else {
                if ($(this).hasClass('solutions')) {
                    $(this).find('.subnav').css('top', 80);
                } else {
                    $(this).find('.subnav').css('top', hHeader);
                }
            }
        });

        $(".subnav__wrap").hover(function () {
            $(this).closest('.subnav').addClass('show');
            $(this).closest('.subnav').prev().addClass('show');
            $(".c-header").addClass("is-event11");
        }, function () {
            $(this).closest('.subnav').removeClass('show');
            $(this).closest('.subnav').prev().removeClass('show');
            $(".c-header").removeClass("is-event11");
        });

        $(".c-header2__nav__link li>a,.c-header2__nav__link li>span").hover(function () {
            if ($(this).parent().find('.subnav').length > 0) {
                $(this).addClass('show');
                $(".c-header").addClass("is-event11");
            }
            $(this).next().addClass('show');
        }, function () {
            if ($(this).parent().find('.subnav').length > 0) {
                $(this).removeClass('show');
                $(this).next().removeClass('show');
                $(".c-header").removeClass("is-event11");
            }
        });
    }
});

$('.c-headersp__nav1__item.submenu').each(function () {
    $('.text', this).on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('is-open');
        $(this).next().slideToggle();
    });
});

var pagetop = $(".c-footer3__gotop");
$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        pagetop.addClass("show");
    } else {
        pagetop.removeClass("show");
    }
});


$(".c-footer3__gotop").click(function () {
    $('body, html').animate({
        scrollTop: 0
    }, 500);
});


$('.c-downloadfile__status').on('click' , function(){
    $('.c-downloadfile').toggleClass('is-active');
});

$('.c-downloadfile__close').on('click' , function(){
    $('.c-downloadfile').addClass('hide');
});