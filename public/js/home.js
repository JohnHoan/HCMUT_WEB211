(function ($) {
    'use Strict';
    $('.electronics-pro-active')
        .on('changed.owl.carousel initialized.owl.carousel', function (event) {
            $(event.target)
                .find('.owl-item')
                .removeClass('last')
                .eq(event.item.index + event.page.size - 1)
                .addClass('last');
        })
        .owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            smartSpeed: 1000,
            navText: [
                "<i class='lnr lnr-arrow-left'></i>",
                "<i class='lnr lnr-arrow-right'></i>",
            ],
            margin: 10,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true,
                    smartSpeed: 500,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 3,
                },
            },
        });

    $('.latest-blog-active').owlCarousel({
        loop: false,
        nav: false,
        dots: true,
        smartSpeed: 1500,
        navText: [
            "<i class='lnr lnr-arrow-left'></i>",
            "<i class='lnr lnr-arrow-right'></i>",
        ],
        margin: 20,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                smartSpeed: 500,
            },
            450: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 2,
            },
        },
    });
})(jQuery);
