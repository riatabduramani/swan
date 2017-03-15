(function ($) {
    "use strict";
    jQuery(document).ready(function () {
        //meanmenu
        jQuery('header nav').meanmenu();
        $('.openbox').click(function () {
            $('.searchbox').slideDown();
        });
        $('.close-button').click(function () {

            $('.searchbox').slideUp();

        });
        //This code is for owl Carousel
        if ($.fn.owlCarousel) {
            //this code is for hero slider
            $('.hero_slider').owlCarousel({
                items: 1,
                nav: false,
                autoplay: true,
                loop: true,
                dots: true,
                smartSpeed: 1000,
            });
            //tihs code is for slider effect
            $(".hero_slider").on('translate.owl.carousel', function() {
                $('.single_text1 h1').removeClass('fadeInDown animated').hide();
                $('.single_text1 p').removeClass('fadeInDown animated').hide();
                $('.single_text1 a').removeClass('fadeInDown animated').hide();
            });
            $(".hero_slider").on('translated.owl.carousel', function() {
                $('.owl-item.active .single_text1 h1').addClass('fadeInDown animated').show();
                $('.owl-item.active .single_text1 p').addClass('fadeInDown animated').show();
                $('.owl-item.active .single_text1 a').addClass('fadeInDown animated').show();
            });
            //tihs code is for slider effect
            $(".hero_slider").on('translate.owl.carousel', function() {
                $('.single_text2 h1').removeClass('flipInX animated').hide();
                $('.single_text2 p').removeClass('flipInX animated').hide();
                $('.single_text2 a').removeClass('flipInX animated').hide();
            });
            $(".hero_slider").on('translated.owl.carousel', function() {
                $('.owl-item.active .single_text2 h1').addClass('flipInX animated').show();
                $('.owl-item.active .single_text2 p').addClass('flipInX animated').show();
                $('.owl-item.active .single_text2 a').addClass('flipInX animated').show();
            });
            //tihs code is for slider effect
            $(".hero_slider").on('translate.owl.carousel', function() {
                $('.single_text3 h1').removeClass('zoomIn animated').hide();
                $('.single_text3 p').removeClass('zoomIn animated').hide();
                $('.single_text3 a').removeClass('zoomIn animated').hide();
            });
            $(".hero_slider").on('translated.owl.carousel', function() {
                $('.owl-item.active .single_text3 h1').addClass('zoomIn animated').show();
                $('.owl-item.active .single_text3 p').addClass('zoomIn animated').show();
                $('.owl-item.active .single_text3 a').addClass('zoomIn animated').show();
            });
            //This code is for client_crsl
            $('.client_crsl').owlCarousel({
                nav: false,
                dots: false,
                autoplay: false,
                loop: true,
                margin: 30,
                smartSpeed: 1000,
                navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
                responsiveClass: true,
                responsive: {
                    300: {
                        items: 1,
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    1170: {
                        items: 3,
                    },
                }
            });
            //This code is for client_crsl_two
            $('.client_crsl2').owlCarousel({
                nav: false,
                dots: false,
                autoplay: false,
                loop: true,
                margin: 30,
                smartSpeed: 1000,
                navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
                responsiveClass: true,
                responsive: {
                    300: {
                        items: 1,
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    1170: {
                        items: 4,
                    },
                }
            });
            //This code is for  Team_crsl
            $('.team_slider').owlCarousel({
                nav: true,
                dots: false,
                autoplay: false,
                loop: true,
                margin: 30,
                smartSpeed: 1000,
                navText: ["<i class='icofont icofont-long-arrow-left'></i>", "<i class='icofont icofont-long-arrow-right'></i>"],
                responsiveClass: true,
                responsive: {
                    300: {
                        items: 1,
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 3,
                    },
                    1170: {
                        items: 4,
                    },
                }
            });
            //This code is for blog_crsl
            $('.blog_crsl').owlCarousel({
                items: 3,
                nav: true,
                autoplay: true,
                loop: true,
                dots: false,
                margin: 30,
                smartSpeed: 1000,
                navText: ["<i class='icofont icofont-rounded-left'></i>", "<i class='icofont icofont-rounded-right'></i>"],
                responsiveClass: true,
                responsive: {
                    300: {
                        items: 1,
                    },
                    480: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1170: {
                        items: 3,
                    },
                }
            });
            //This code is for brand_crsl
            $('.brand_crsl').owlCarousel({
                items: 6,
                nav: false,
                autoplay: true,
                loop: true,
                dots: false,
                margin: 30,
                smartSpeed: 1000,
                navText: ["<i class='icofont icofont-rounded-left'></i>", "<i class='icofont icofont-rounded-right'></i>"],
                responsiveClass: true,
                responsive: {
                    300: {
                        items: 2,
                    },
                    480: {
                        items: 3,
                    },
                    768: {
                        items: 4,
                    },
                    992: {
                        items: 5,
                    },
                    1170: {
                        items: 6,
                    },
                }
            });
        }
        //This code is for singlePrice Hover effect
        $('.single_table').hover(function () {
            $('.single_table').removeClass('active');
            $(this).addClass('active');
        });
        //scrollTop
        jQuery('#scrollTop').on('click', function () {
            jQuery("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
// This code is for isotope
        if ($.fn.isotope) {
            //This code is for isotope    
            $(".isotopeActive").isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false,
                }
            });
            $('.isotop-nav li').click(function () {
                $(".isotop-nav li").removeClass("active");
                $(this).addClass("active");
                var selector = $(this).attr('data-filter');
                $(".isotopeActive").isotope({
                    filter: selector,
                });
                return false;
            });
        }

    });
   //cart page     
        $(".plus").click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.siblings('input');
        var value = parseInt($input.val());
        if (value < 30) {
            value = value + 1;
        } else {
            value = 30;
        }
        $input.val(value);
    });
    $(".minus").click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.siblings('input');
        var value = parseInt($input.val());
        if (value > 1) {
            value = value - 1;
        } else {
            value = 1;
        }
        $input.val(value);
    });
// This code is for CounterUp
    if ($.fn.counterUp) {
        //counterUp
        $('.counter').counterUp({
            delay: 10,
            time: 1000,
        });
    }
// makes sure the whole site is loaded
    $('#preloader').fadeOut(); // will first fade out the loading animation
    $('.preloader_spinner').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $("body").removeClass("preloader_active");
//or preloder
    //$('#preloader').remove();  
})(jQuery);