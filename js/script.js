$(function () {
    'use strict';
    //Slider
    var $owl = $('.owl');
    $owl.each(function () {
        var $carousel1 = $(this);
        $carousel1.owlCarousel({
            items: $carousel1.attr('data-items'),
            itemsDesktop: [1199, $carousel1.attr('data-itemsDesktop')],
            itemsDesktopSmall: [979, $carousel1.attr('data-itemsDesktopSmall')],
            itemsTablet: [797, $carousel1.attr('data-itemsTablet')],
            itemsMobile: [479, $carousel1.attr('data-itemsMobile')],
            navigation: JSON.parse($carousel1.attr('data-buttons')),
            pagination: JSON.parse($carousel1.attr('data-pag')),
            slideSpeed: 1000,
            paginationSpeed: 1000,
            navigationText: false
        });
    });
    $(window).load(function () {
        $('.preloader p').fadeOut();
        $('.preloader').delay(500).fadeOut('slow');
        $('body').delay(600).css({
            'overflow': 'visible'
        });
    });
    //Image zoom
    $('.image-zoom').magnificPopup({
        delegate: 'div a',
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    //Menu
    $('.navbar-toggle').on('click', function () {
        height_w();
    });

    function height_w() {
        $('.navbar-nav').css('max-height', $(window).height() - 165);
    }

    window.onresize = function () {
        height_w();
    }
    //Slider
    $(".slider-range").slider({
        range: true,
        min: 5000,
        max: 200000,
        step: 1000,
        values: [60000, 130000],
        slide: function (event, ui) {
            $(".slider_amount").val("$" + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + " - $" + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        }
    });
    $(".slider_amount").val("$" + $(".slider-range").slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + " - $" + $(".slider-range").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));

    //Search
    $('.select-wrapper li').on('click', function () {
        $(this).parents('.select-wrapper').find('button').text($(this).text());
    });

    initFlexSlider();

});

function initFlexSlider() {
    $('#flexslider-hero').flexslider({
        animation: "fade",
        controlNav: true,
        directionNav: false,
        touch: true,
        slideshow: true,
        slideshowSpeed: 4500,
        prevText: ["<i class='fa fa-angle-left'></i>"],
        nextText: ["<i class='fa fa-angle-right'></i>"]
    });

    // Flexslider
    $('#flexslider').flexslider({
        animation: "slide",
        directionNav: true,
        controlNav: false,
        touch: true,
        slideshow: false,
        prevText: ["<i class='fa fa-angle-left'></i>"],
        nextText: ["<i class='fa fa-angle-right'></i>"]
    });

    $('#sidenav01 li').click(function () {
        $("#sidenav01 li").removeClass("active");
        $(this).addClass("active");
    })
}
