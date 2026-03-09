/**
 * Gallery Slider Component — Initialisation
 * Shared by: Temple Details, News Details
 * Deps: jQuery, slick.min.js, jquery.magnific-popup.min.js
 */
(function ($) {
    'use strict';

    $(document).ready(function () {

        // --- Slick carousel for each .photo-gallery-slider on the page ---
        $('.photo-gallery-slider').each(function () {
            var $slider = $(this);
            var count   = $slider.children('.gallery-card').length;

            if (count > 3) {
                $slider.slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    arrows: true,
                    dots: false,
                    centerMode: false,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                centerMode: false
                            }
                        }
                    ]
                });
            } else {
                $slider.addClass('gallery-grid-layout');
            }
        });

        // --- Magnific Popup lightbox for gallery images ---
        if ($.fn.magnificPopup && $('.gallery-zoom').length) {
            $('.gallery-zoom').magnificPopup({
                type: 'image',
                gallery: { enabled: true },
                mainClass: 'mfp-with-zoom',
                zoom: {
                    enabled: true,
                    duration: 300,
                    easing: 'ease-in-out'
                }
            });
        }
    });

})(jQuery);
