<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Welcome to Swan</title>

    <link href="{{ asset('images/fevicon.png') }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset('css/front/animate.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/hover-min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/icofont.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/meanmenu.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/front/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('fonts/webfonts/fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="preloader">
        <div class="preloader_spinner"></div>
    </div>
    <!-- preloader end -->
    <div class="home_page">
<!-- ==========================================================
    1.*header_area start
============================================================ -->
        <header class="romana_header">
            <div class="hrader_top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-xs-12">
                            <div class="logo">
                                <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                            </div>
                        </div>
                        <!-- column End -->
                        <div class="col-sm-7 col-md-offset-1">
                            <div class="header_top_left">
                                <ul>
                                    <li><span class="fa fa-phone"></span>(000) 11 222 3333</li>
                                    <li><span class="fa fa-envelope"></span>info@swan.mk</li>
                                    <!--<li><span class="fa fa-map-marker"></span></li>-->
                                </ul>
                            </div>
                        </div>
                        <!-- column End -->
                        <div class="col-md-2 col-sm-3 col-xs-12">
                            <div class="header_top_right">
                             @if (Auth::check())
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ url('/login') }}">Login</a> | 
                                <a href="{{ url('/register') }}">Register</a>
                            @endif
                            </div>
                        </div>
                        <!-- column End -->
                    </div>
                    <!-- row End -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="searchbox">
                                <input type="text" id="serch" class="search-box" placeholder="Search">
                                <label for="serch" class="fa fa-search mainsearch"></label>
                                <i class="fa fa-close close-button"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container End -->
            </div>
            <!-- Header_Top End -->
            <div class="header_bottom_area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mainmenu">
                                <nav>
                                    <ul>
                                        <li class="active"><a href="index.html">home</a>
                                            <ul class="sub-menu">
                                                <li><a href="index.html">HOME ONE</a></li>
                                                <li><a href="index-2.html">home two</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">about us</a></li>
                                        <li><a href="service.html">our services</a>
                                            <ul class="sub-menu">
                                                <li><a href="service.html">service page</a></li>
                                                <li><a href="single-service.html">single service</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="portfolio.html">portfolio</a>
                                            <ul class="sub-menu">
                                                <li><a href="portfolio.html">portfolio page</a></li>
                                                <li><a href="single-portfolio.html">single portfolio</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">our blog</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog.html">blog page</a></li>
                                                <li><a href="single-blog.html">single blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="price.html">pricing page</a></li>
                                                <li><a href="testimonial.html">testimonial page</a></li>
                                                <li><a href="404.html">404 page</a></li>
                                                <li><a href="thanks.html">thank you page</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">shop</a>
                                            <ul class="sub-menu">
                                                <li><a href="cart.html">cart page</a></li>
                                                <li><a href="checkout.html">Checkout page</a></li>
                                                <li><a href="single-product.html">single product</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- column End -->
                    </div>
                    <!-- row End -->
                </div>
                <!-- container End -->
            </div>
            <!-- Header_Bottom End -->
        </header>
        <!-- Header End -->
<!-- ==================================================
    2.*Hero-Area Start
=================================================== -->
        <section class="romana_hero_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <!--<div class="hero_slider">
                            <div class="single_text single_text1">
                                <h1></h1>
                                <p></p>
                                <a href="#"></a>
                            </div>

                            <div class="single_text single_text2">
                                <h1></h1>
                                <p></p>
                                <a href="#"></a>
                            </div>

                            <div class="single_text single_text3">
                                <h1></h1>
                                <p></p>
                                <a href="#"></a>
                            </div>
                        </div>-->
                        
        <section class="romana_pricing_area section_padding_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>our pricing</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-12">
                        <div class="romana_single_price text-center">
                            <h3>basis</h3>
                            <h4>29  €<span>/mo</span></h4>
                            <ul>
                                <li><i class="fa fa-check"></i>&nbsp Hovendregoring</li>
                                <li><i class="fa fa-check"></i>&nbsp Klargoring</li>
                                <li><i class="fa fa-check"></i>&nbsp 14 dags kontrol</li>
                                <li><i class="fa fa-check"></i>&nbsp Manedlig kontrol</li>
                                <li><i class="fa fa-check"></i>&nbsp Fajlrapportering</li>
                            </ul>
                            <a href="#">order</a>
                        </div>

                        <div class="romana_single_price price_current_item text-center">
                            <h3>ekstra</h3>
                            <h4>49 € <span>/mo</span></h4>
                            <ul>
                                <li><i class="fa fa-check"></i>&nbsp Hovendregoring</li>
                                <li><i class="fa fa-check"></i>&nbsp Klargoring</li>
                                <li><i class="fa fa-check"></i>&nbsp 14 dags kontrol</li>
                                <li><i class="fa fa-check"></i>&nbsp Manedlig kontrol</li>
                                <li><i class="fa fa-check"></i>&nbsp Fajlrapportering</li>
                                <li><i class="fa fa-check"></i>&nbsp Vinterpakke</li>
                                <li><i class="fa fa-check"></i>&nbsp Vinduespolering</li>
                                <li><i class="fa fa-check"></i>&nbsp Afdakning af mobler</li>
                            </ul>
                            <a href="#">order</a>
                        </div>

                        <div class="romana_single_price text-center">
                            <h3>eksklusiv</h3>
                            <h4>69 € <span>/mo</span></h4>
                            <ul>
                                <li><i class="fa fa-check"></i>&nbsp Hovendregoring</li>
                                <li><i class="fa fa-check"></i>&nbsp Klargoring</li>
                                <li><i class="fa fa-check"></i>&nbsp 14 dags kontrol</li>
                                <li><i class="fa fa-check"></i>&nbsp Manedlig kontrol</li>
                                <li><i class="fa fa-check"></i>&nbsp Fajlrapportering</li>
                                <li><i class="fa fa-check"></i>&nbsp Vinterpakke</li>
                                <li><i class="fa fa-check"></i>&nbsp Vinduespolering</li>
                                <li><i class="fa fa-check"></i>&nbsp Afdakning af mobler</li>
                                <li><i class="fa fa-check"></i>&nbsp Betalinger af regninger</li>
                                <li><i class="fa fa-check"></i>&nbsp Indkob</li>
                                <li><i class="fa fa-check"></i>&nbsp Have</li>
                            </ul>
                            <a href="#">order</a>
                        </div>

                        <div class="romana_single_price text-center">
                            <h3>eksklusiv +</h3>
                            <h4>119 € <span>/mo</span></h4>
                            <ul>
                                <li><i class="fa fa-check"></i>&nbsp Hovendregoring</li>
                                <li><i class="fa fa-check"></i>&nbsp Klargoring</li>
                                <li><i class="fa fa-check"></i>&nbsp 14 dags kontrol</li>
                                <li><i class="fa fa-check"></i>&nbsp Manedlig kontrol</li>
                                <li><i class="fa fa-check"></i>&nbsp Fajlrapportering</li>
                                <li><i class="fa fa-check"></i>&nbsp Vinterpakke</li>
                                <li><i class="fa fa-check"></i>&nbsp Vinduespolering</li>
                                <li><i class="fa fa-check"></i>&nbsp Afdakning af mobler</li>
                                <li><i class="fa fa-check"></i>&nbsp Betalinger af regninger</li>
                                <li><i class="fa fa-check"></i>&nbsp Indkob</li>
                                <li><i class="fa fa-check"></i>&nbsp Have</li>
                                <li><i class="fa fa-check"></i>&nbsp Plantning af planter</li>
                                <li><i class="fa fa-check"></i>&nbsp Internet</li>
                                <li><i class="fa fa-check"></i>&nbsp Bilpalle</li>
                            </ul>
                            <a href="#">order</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                        
                    </div>
                </div>
            </div>
        </section>
<!--=============================================
    9.*Pricing_area  start
===============================================-->
<!-- ==================================================
    BANNER
=================================================== -->
        <!--<section class="romana_counter_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="single_counter">      
                        </div>
                        
                        <div class="single_counter">           
                        </div>

                        <div class="single_counter">          
                        </div>

                        <div class="single_counter">              
                        </div>

                        <div class="single_counter">
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
<!-- ==================================================
    3.*Service-Area Start
=================================================== -->
        <section class="romana_service_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon1.png" alt="">
                            <h2>house cleaning</h2>
                            <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip commodo consequat. </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon1.png" alt="">
                            <h2>house cleaning</h2>
                            <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip commodo consequat. </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon1.png" alt="">
                            <h2>house cleaning</h2>
                            <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip commodo consequat. </p>
                        </div>
                    </div>
                    
                     <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon1.png" alt="">
                            <h2>house cleaning</h2>
                            <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip commodo consequat. </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon1.png" alt="">
                            <h2>house cleaning</h2>
                            <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip commodo consequat. </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon1.png" alt="">
                            <h2>house cleaning</h2>
                            <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip commodo consequat. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- ==================================================
    4.*Explore_Area Start
=================================================== -->
        <section class="romana_explore_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="explore_img hidden-sm hidden-xs">
                            <img src="http://static.wixstatic.com/media/e634ef_f3bf3b4500144c55a73cdcc6aa4ec5f7.png_srz_144_171_85_22_0.50_1.20_0.00_png_srz" alt="" style="width:100%;">
                        </div>
                    </div>
                    <div class="col-md-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="explore_text">
                                    <h3>Vision</h3>
                                    <p>Duis autem vel eum iriure dolor hendrerit vulputate esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto augue duis dolore te feugait.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="explore_text explore_text_padding">
                                    <h3>Mission</h3>
                                    <p>Duis autem vel eum iriure dolor hendrerit vulputate esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto augue duis dolore te feugait.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- ==================================================
    5.*Team_area start
=================================================== -->
        <!--<section class="romana_team_area section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2></h2>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="team_slider section_padding_top">
                            <div class="single_staff">
                                <a href="#"><img src="images/img1.jpg" alt=""></a>
                                <a href="#"><h3></h3></a>
                                <h4></h4>
                                <p></p>
                            </div>
                            <div class="single_staff">
                                <a href="#"><img src="images/img2.jpg" alt=""></a>
                                <a href="#"><h3></h3></a>
                                <h4></h4>
                                <p></p>
                            </div>
                            <div class="single_staff">
                                <a href="#"><img src="images/img3.jpg" alt=""></a>
                                <a href="#"><h3></h3></a>
                                <h4></h4>
                                <p></p>
                            </div>
                            <div class="single_staff">
                                <a href="#"><img src="images/img4.jpg" alt=""></a>
                                <a href="#"><h3></h3></a>
                                <h4></h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

<!-- ==================================================
    7.*Service_booking_area Start
=================================================== -->
        <section class="romana_service_booking_area section_padding_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>service booking</h2>
                            <p>Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="romana_booking_form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name">Name*</label>
                                        <br>
                                        <input type="text" name="name" placeholder="Enter your name here" id="name">
                                        <label for="Phone">Phone*</label>
                                        <input type="text" name="Phone" placeholder="Enter phone no name here" id="Phone">
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email">E-mail*</label>
                                        <br>
                                        <input type="text" name="email" placeholder="Enter your E-mail here" id="email">
                                        <label for="Date">Date*</label>
                                        <br>
                                        <input type="text" name="Date" placeholder="Enter your date here" id="Date">
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="Message">Message*</label>
                                        <br>
                                        <textarea rows="4" placeholder="Your message here" name="message" id="Message"></textarea>
                                        <br>
                                        <input type="submit" value="send">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="romana_booking_image hidden-sm hidden-xs">
                    <img src="images/booking-man.png" alt="">
                </div>
            </div>
        </section>

<!-- ==================================================
    11.*Contact_area start
=================================================== -->
        <section class="romana_brand_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="brand_crsl">
                            <div class="single_brand">
                                <a href="#"><img src="images/brand-1.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/brand-2.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/brand-3.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/brand-4.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/brand-5.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/brand-6.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/brand-4.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- column end-->
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </section>
<!-- ==================================================
    12.*Footer_area start
===================================================== -->
        <footer class="romana_footer">
            <div class="footer_top_area footer_top clearfix">
                <div id="scrollTop">
                    <a href="#" class="hvr-icon-bob"></a>
                </div>
                <div class="container">
                    <div class="row ">
                        <div class="col-sm-3 col-xs-12">
                            <div class="widget widget_text">
                                <div class="footer_logo">
                                    <a href="index.html"><img src="images/footer_logo.png" alt="footer logo"></a>
                                </div>
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
                                <div class="footer_social_icon">
                                    <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                                    <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                    <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                                    <a href="#"><i class="icofont icofont-brand-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- column end -->
                        <div class="col-sm-2 col-xs-6">
                            <div class="widget footer_top_menu">
                                <h2>Quick Link</h2>
                                <ul>
                                    <li><a href="">home</a></li>
                                    <li><a href="">about us</a></li>
                                    <li><a href="">our services</a></li>
                                    <li><a href="">portfolio</a></li>
                                    <li><a href="">our blog</a></li>
                                    <li><a href="">shop</a></li>
                                    <li><a href="">contact us</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- column end -->
                        <div class="col-md-2 col-md-offset-1 col-sm-3 col-xs-6">
                            <div class="widget footer_top_menu margin_top_tablet">
                                <h2>Services</h2>
                                <ul>
                                    <li><a href="">Apartment Cleaning</a></li>
                                    <li><a href="">bulding Cleaning</a></li>
                                    <li><a href="">Wooden Floor Cleaning</a></li>
                                    <li><a href="">glass Cleaning</a></li>
                                    <li><a href="">office Cleaning</a></li>
                                    <li><a href="">vehicle Cleaning</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- column end -->
                        <div class="col-md-3 col-md-offset-1 col-sm-4 col-xs-12">
                            <div class="widget footer_top_menu margin_top_tablet single_footer">
                                <ul class="address">
                                    <li><span class="fa fa-map-marker"></span>Tetovo, Macedonia</li>
                                    <li> <span class="fa fa-envelope"></span><a href="#">info@swan.mk</a></li>
                                    <li><span class="fa fa-phone"></span><a href="#">(000) 11 222 3333</a></li>
                                </ul>
                                <div class="subscrib">
                                    <h3>subscribe our newsletter</h3>
                                    <input type="text" name="email" placeholder="Your mail">
                                    <input type="submit" name="submit" value="send">
                                    <p>We don’t share your info with anyone</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer_bottom_area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-xs-12">
                            <div class="footer_bottom footer_top text-left">
                                <p><span>{{ config('app.name') }} © <?php echo date("Y"); ?> | All Rights Reserved</span></p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="footer_bottom footer_bottom_text text-right">
                                <p><a href="#">Private Policy</a> | <a href="#">Terms & Conditions</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="{{ asset('js/front/jquery-3.1.0.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('js/front/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/front/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/front/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('js/front/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/front/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/front/active.js') }}"></script>
    </div>

</body>

</html>