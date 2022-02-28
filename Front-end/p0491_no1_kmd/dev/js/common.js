'use strict';

/**
 * Binds to the document ready event.
 *
 * @since 3.2.1
 *
 * @param {jQuery} $ The jQuery object.
 */
jQuery(document).ready(function($) {
    /* スクロールが300に達したらボタン表示
    /*---------------------------------------------------------*/
    var topBtn = $('#pagetop');
    if (topBtn.length) {
        topBtn.hide();
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                topBtn.fadeIn();
            } else {
                topBtn.fadeOut();
            }
        });

        // ヘッダー固定
        $(window).scroll(function() {
            if ($(window).scrollTop() > $('#header').innerHeight()) {
                $('#header').addClass('fix');
            } else {
                $('#header').removeClass('fix');
            }
        }).trigger('scroll');
    }

    // menu
    var state = false;
    $('.sp_menu_btn').on('click', function() {
        if (state == false) {
            $(this).addClass('active');
            $('#gnav').addClass('open');
            state = true;
            $('body').css('overflow', 'hidden');
        } else {
            $(this).removeClass('active');
            $('#gnav').removeClass('open').addClass('close');
            $('body').css('overflow', '');
            setTimeout(function() {
                $('#gnav').removeClass('close');
            }, 500);
            state = false;
        }
    });

    /* スムーズスクロール
    /*---------------------------------------------------------*/
    $('a[href*="#"]').on('click', function() {
        var str = $(this).attr('href');
        var href = str.substring(str.indexOf('#'));
        var target = $(href == '#' || href == '' ? 'html' : href);
        var headerHeight = $('#header').innerHeight();
        var targetPosition = $(target).offset().top;
        $('body, html').animate({ scrollTop: targetPosition - headerHeight }, 1000, 'swing');
        var scrollStop = function() {
            $('body, html').stop(true);
        };
        window.addEventListener('DOMMouseScroll', scrollStop, false);
        window.onmousewheel = document.onmousewheel = scrollStop;
        return false;
    });

    /* URL要素に移動
    /*---------------------------------------------------------*/
    $(window).on('load', function() {
        var localLink = window.location + '';
        if (localLink.indexOf("#") != -1) {
            var headerHeight = $('#header').innerHeight();
            localLink = localLink.slice(localLink.indexOf("#") + 1);
            $('html,body').animate({ scrollTop: $('#' + localLink).offset().top - headerHeight }, 500);
        }
    });

    /* Animsition
    /*---------------------------------------------------------*/
    $('.animsition').animsition({
        inClass: 'fade-in', //ここにアニメーションの指定をします。
        outClass: 'fade-out', //ここにアニメーションの指定をします。
        inDuration: 3000, //スピード調整
        outDuration: 1000, //スピード調整
        linkElement: '.animsition-link', //リンクのaに左のclassをつけます。
        // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
        loading: true, //ローディングアニメーションの有無
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        unSupportCss: ['animation-duration', '-webkit-animation-duration', '-o-animation-duration'],
        //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'body'
    });



});