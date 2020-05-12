;
(function ($) {

    function handleFirstTab(e) {
        var key = e.key || e.keyCode;
        if (key === 'Tab' || key === '9') {
            $('body').removeClass('no-outline');

            window.removeEventListener('keydown', handleFirstTab);
            window.addEventListener('mousedown', handleMouseDownOnce);
        }
    }

    function handleMouseDownOnce() {
        $('body').addClass('no-outline');

        window.removeEventListener('mousedown', handleMouseDownOnce);
        window.addEventListener('keydown', handleFirstTab);
    }

    window.addEventListener('keydown', handleFirstTab);

    // Fit slide video background to video holder
    function resizeVideo() {
        var $holder = $('.videoHolder');
        $holder.each(function () {
            var $that = $(this);
            var ratio = $that.data('ratio') ? $that.data('ratio') : '16:9',
                width = parseFloat(ratio.split(':')[0]),
                height = parseFloat(ratio.split(':')[1]);
            $that.find('.video').each(function () {
                if ($that.width() / width > $that.height() / height) {
                    $(this).css({'width': '100%', 'height': 'auto'});
                } else {
                    $(this).css({'width': $that.height() * width / height, 'height': '100%'});
                }
            });
        });
    }

    // Scripts which runs after DOM load

    $(document).on('ready', function () {

        // click popup

        $('.btn').on('click', function () {
            $(this).parent().find('#video')[0].src += "&autoplay=1";
            $(this).css('display', 'none');
        });

        $('.popup-area').on('click', function (e) {
            var target = $(e.target);
            if (target.hasClass('open-popup')) {
                var parentImg = target.parent('.grid-item__wrapper').data('img');
                var parentVideo = target.parent('.grid-item__wrapper').data('video');
                var videoPopupImg = $('.video-popup .video-popup__image');
                var iframeVideo = $('#yt');
                $('.fancybox-stage').show();
                videoPopupImg.attr('src', parentImg).show();
                iframeVideo.attr('src', parentVideo + "?autoplay=1");

                console.log(parentVideo);
            }
        });


        $('#play-video').on('click', function () {
            $('.video-popup .video-popup__image').hide();
            $('.video-popup .video-image').hide();
            $('#play-video').hide();

            $("#yt")[0].src += "?autoplay=1";
            $("#yt").show();
        });

        $('.popup-close').on('click', function () {
            $('#crane-popup').hide();
            $('#banner-popup').hide();
            $('#yt').hide();
        });

        $('.open-popup').click(function () {
            $("#crane-popup").show();
        });
        /* Popup Banner */

        $('#open-banner-popup').on('click', function () {
            $('#play-video').show();
            $('#banner-popup').show();
            $('.video-image').show();
        });


        // Team slider

        $('#team-slider').slick({
            dots: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,

        });
        // Init LazyLoad
        var lazyLoadInstance = new LazyLoad({
            elements_selector: 'img[data-lazy-src],.pre-lazyload',
            data_src: "lazy-src",
            data_srcset: "lazy-srcset",
            data_sizes: "lazy-sizes",
            skip_invisible: false,
            class_loading: "lazyloading",
            class_loaded: "lazyloaded",
        });
        // Add tracking on adding any new nodes to body to update lazyload for the new images (AJAX for example)
        window.addEventListener('LazyLoad::Initialized', function (e) {
            // Get the instance and puts it in the lazyLoadInstance variable
            if (window.MutationObserver) {
                var observer = new MutationObserver(function (mutations) {
                    mutations.forEach(function (mutation) {
                        mutation.addedNodes.forEach(function (node) {
                            if (typeof node.getElementsByTagName !== 'function') {
                                return;
                            }
                            imgs = node.getElementsByTagName('img');
                            if (0 === imgs.length) {
                                return;
                            }
                            lazyLoadInstance.update();
                        });
                    });
                });
                var b = document.getElementsByTagName("body")[0];
                var config = {childList: true, subtree: true};
                observer.observe(b, config);
            }
        }, false);

        // Update LazyLoad images before Slide change
        $('.slick-slider').on('beforeChange', function () {
            lazyLoadInstance.update();
        });

        // Detect element appearance in viewport
        var scrollOut = ScrollOut({
            threshold: 0.3,
            once: true,
            onShown: function (element) {
                if ($(element).is('.ease-order')) {
                    $(element).find('.ease-order__item').each(function (i) {
                        var $this = $(this);
                        $(this).attr('data-scroll', '');
                        window.setTimeout(function () {
                            $this.attr('data-scroll', 'in');
                        }, 300 * i);
                    });
                }
            }
        });


        // Init parallax
        /*$('.jarallax').jarallax({
            speed: 0.5,
        });

        $('.jarallax-inline').jarallax({
            speed: 0.5,
            keepImg: true,
            onInit : function() { lazyLoadInstance.update(); }
        });*/

        // IE Object-fit cover polyfill
        if ($('.of-cover').length) {
            objectFitImages('.of-cover');
        }

        //Remove placeholder on click
        $('input,textarea').each(function () {
            $(this).data('holder', $(this).attr('placeholder'));

            $(this).on('focusin', function () {
                $(this).attr('placeholder', '');
            });

            $(this).on('focusout', function () {
                $(this).attr('placeholder', $(this).data('holder'));
            });
        });

        //Make elements equal height
        $('.matchHeight').matchHeight();


        // Add fancybox to images
        $('.gallery-item').find('a[href$="jpg"], a[href$="png"], a[href$="gif"]').attr('rel', 'gallery').attr('data-fancybox', 'gallery');
        $('a[rel*="album"], .fancybox, a[href$="jpg"], a[href$="png"], a[href$="gif"]').fancybox({
            minHeight: 0,
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });

        /**
         * Scroll to Gravity Form confirmation message after form submit
         */
        $(document).on('gform_confirmation_loaded', function (event, formId) {
            var $target = $('#gform_confirmation_wrapper_' + formId);
            if ($target.length) {
                $('html, body').animate({
                    scrollTop: $target.offset().top - 50,
                }, 500);
                return false;
            }
        });

        /**
         * Hide gravity forms required field message on data input
         */
        $('body').on('change keyup', '.gfield input, .gfield textarea', function () {
            var $field = $(this).closest('.gfield');
            if ($field.hasClass('gfield_error') && $(this).val().length) {
                $field.find('.validation_message').hide();
            } else if ($field.hasClass('gfield_error') && !$(this).val().length) {
                $field.find('.validation_message').show();
            }
        });

        /**
         * Add `is-active` class to menu-icon button on Responsive menu toggle
         * And remove it on breakpoint change
         */
        $(window).on('toggled.zf.responsiveToggle', function () {
            $('.menu-icon').toggleClass('is-active');
        }).on('changed.zf.mediaquery', function (e, value) {
            $('.menu-icon').removeClass('is-active');
        });

        /**
         * Close responsive menu on orientation change
         */
        $(window).on('orientationchange', function () {
            setTimeout(function () {
                if ($('.menu-icon').hasClass('is-active') && window.innerWidth < 641) {
                    $('[data-responsive-toggle="main-menu"]').foundation('toggleMenu')
                }
            }, 200);
        });

        resizeVideo();


    });


    // Scripts which runs after all elements load

    $(window).on('load', function () {

        //jQuery code goes here
        if ($('.preloader').length) {
            $('.preloader').addClass('preloader--hidden');
        }

    });

    // Scripts which runs at window resize

    $(window).on('resize', function () {

        //jQuery code goes here

        resizeVideo();

    });

    // Scripts which runs on scrolling

    $(window).on('scroll', function () {

        //jQuery code goes here

    });

    $(".search__icon").click(function () {
        $(".search__toggle").toggleClass('opacity');
    });

    $('#projects-slider').slick({
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    dots: true,
                    arrows: false
                }
            }
        ],
    });

    $('#testimonials-slider').slick({
        dots: true
    });

    $(function () {
        $('a[href*=#]').on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 1000, 'linear');
        });
    });

    // init Isotope
    var $grid = $('.grid').isotope({
        // options
    });
// filter items on button click
    $('.filter-button-group').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter: filterValue});
    });


}(jQuery));
