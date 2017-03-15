<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>Jharu-HTML 5 Template</title>

    <!-- ================================================================
        ***Favicon***
    ================================================================= -->

    <link rel="shortcut icon" type="image/png" href="images/fevicon.png">

    <!-- ================================================================
        ***CSS File***
    ================================================================= -->

    <!-- ================= ***Animate CSS *** ======================= -->
    <link href="css/front/animate.min.css" rel="stylesheet" type="text/css">

    <!-- ================= ***Bootstrap CSS *** ===================== -->
    <link href="css/front/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- ================= ***camera CSS *** ======================== -->
    <link href="css/front/hover-min.css" rel="stylesheet" type="text/css">

    <!-- ================= ***Font-awesome CSS *** ================== -->
    <link href="css/front/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- ================= ***icofont CSS *** ======================= -->
    <link href="css/front/icofont.css" rel="stylesheet" type="text/css">

    <!-- ================= ***meanmenu CSS *** ====================== -->
    <link href="css/front/meanmenu.css" rel="stylesheet" type="text/css">

    <!-- ================= ***Owl Carousel CSS *** ================== -->
    <link href="css/front/owl.carousel.css" rel="stylesheet" type="text/css">

    <!-- ================= ***Font CSS *** ========================== -->
    <link href="fonts/webfonts/fonts.css" rel="stylesheet" type="text/css">

    <!-- ================= ***Main CSS *** ========================== -->
    <link href="css/style.css" rel="stylesheet" type="text/css">

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
                                    <li><span class="fa fa-envelope"></span>crazycafe@gmail.com</li>
                                    <li><span class="fa fa-map-marker"></span>123, Sismpur, West Indies</li>
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
                        <div class="hero_slider">
                            <div class="single_text single_text1">
                                <h1>We are cleaning manager<br>always at your service.</h1>
                                <p>Typi non habent claritatem insitam est usus legentis in iis qui facit</p>
                                <a href="#">learn more</a>
                            </div>
                            <!-- single text -->
                            <div class="single_text single_text2">
                                <h1>We are cleaning manager<br>always at your service.</h1>
                                <p>Typi non habent claritatem insitam est usus legentis in iis qui facit</p>
                                <a href="#">learn more</a>
                            </div>
                            <!-- single text -->
                            <div class="single_text single_text3">
                                <h1>We are cleaning manager<br>always at your service.</h1>
                                <p>Typi non habent claritatem insitam est usus legentis in iis qui facit</p>
                                <a href="#">learn more</a>
                            </div>
                            <!-- single text -->
                        </div>
                    </div>
                    <!-- column End -->
                </div>
                <!-- row End -->
            </div>
            <!-- container End -->
        </section>
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
                        <!-- single service -->
                    </div>
                    <!-- column End -->
                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon2.png" alt="">
                            <h2>house cleaning</h2>
                            <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip commodo consequat. </p>
                        </div>
                        <!-- single service -->
                    </div>
                    <!-- column End -->
                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon3.png" alt="">
                            <h2>house cleaning</h2>
                            <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip commodo consequat. </p>
                        </div>
                        <!-- single service -->
                    </div>
                    <!-- column End -->
                </div>
                <!-- row End -->
            </div>
            <!-- container End -->
        </section>
<!-- ==================================================
    4.*Explore_Area Start
=================================================== -->
        <section class="romana_explore_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="explore_img hidden-sm hidden-xs">
                            <img src="images/explore-im.png" alt="">
                        </div>
                    </div>
                    <!-- column End -->
                    <div class="col-md-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="explore_text">
                                    <p>Duis autem vel eum iriure dolor hendrerit vulputate esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto augue duis dolore te feugait.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="explore_text explore_text_padding">
                                    <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming. </p>
                                    <a href="#" class="common_btn">explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column End -->
                </div>
                <!-- row End -->
            </div>
            <!-- container End -->
        </section>
<!-- ==================================================
    5.*Team_area start
=================================================== -->
        <section class="romana_team_area section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>our staff</h2>
                            <p>Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. </p>
                        </div>
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="team_slider section_padding_top">
                            <div class="single_staff">
                                <a href="#"><img src="images/img1.jpg" alt=""></a>
                                <a href="#"><h3>merry han</h3></a>
                                <h4>Cleaning Staff</h4>
                                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
                            </div>
                            <!-- single_staff end -->
                            <div class="single_staff">
                                <a href="#"><img src="images/img2.jpg" alt=""></a>
                                <a href="#"><h3>dan brown</h3></a>
                                <h4>Cleaning Staff</h4>
                                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
                            </div>
                            <!-- single_staff end -->
                            <div class="single_staff">
                                <a href="#"><img src="images/img3.jpg" alt=""></a>
                                <a href="#"><h3>miky jones</h3></a>
                                <h4>Cleaning Staff</h4>
                                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
                            </div>
                            <!-- single_staff end -->
                            <div class="single_staff">
                                <a href="#"><img src="images/img4.jpg" alt=""></a>
                                <a href="#"><h3>jenny dep</h3></a>
                                <h4>Cleaning Staff</h4>
                                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
                            </div>
                            <!-- single_staff end -->
                        </div>
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </section>
<!-- =================================================================
    6.*testimonials_area  start
=================================================================== -->
        <section class="romana_testimonials_area section_padding_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title client_title">
                            <h2>testimonials</h2>
                            <p>Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. </p>
                        </div>
                    </div>
                    <!-- column end-->
                </div>
                <!-- row end -->
                <div class="row">
                    <div class="col-sm-9">
                        <div class="client_crsl">
                            <div class="single_c_crsl">
                                <div class="crsl_text">
                                    <p>Duis autem vel eum iriure dolor hendrerit in vulputate esse molestie sequat, vel illum dolore </p>
                                </div>
                                <h4>tonny joe</h4>
                                <h5>manager, OPT</h5>
                            </div>
                            <!-- single_c_crsl end -->
                            <div class="single_c_crsl">
                                <div class="crsl_text">
                                    <p>Duis autem vel eum iriure dolor hendrerit in vulputate esse molestie sequat, vel illum dolore </p>
                                </div>
                                <h4>peterson</h4>
                                <h5>manager, OPT</h5>
                            </div>
                            <!-- single_c_crsl end -->
                            <div class="single_c_crsl">
                                <div class="crsl_text">
                                    <p>Duis autem vel eum iriure dolor hendrerit in vulputate esse molestie sequat, vel illum dolore </p>
                                </div>
                                <h4>angelina tim</h4>
                                <h5>manager, OPT</h5>
                            </div>
                            <!-- single_c_crsl end -->
                        </div>
                        <!-- client_crsl_two end -->
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
            <div class="testi_img">
                <img src="images/testi-man.png" alt="">
            </div>
        </section>
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
                    <!-- column end-->
                </div>
                <!-- row end -->
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
                                    <!-- column end -->
                                    <div class="col-sm-6">
                                        <label for="email">E-mail*</label>
                                        <br>
                                        <input type="text" name="email" placeholder="Enter your E-mail here" id="email">
                                        <label for="Date">Date*</label>
                                        <br>
                                        <input type="text" name="Date" placeholder="Enter your date here" id="Date">
                                    </div>
                                    <!-- column end-->
                                    <div class="col-xs-12">
                                        <label for="Message">Message*</label>
                                        <br>
                                        <textarea rows="4" placeholder="Your message here" name="message" id="Message"></textarea>
                                        <br>
                                        <input type="submit" value="send">
                                    </div>
                                    <!-- column end-->
                                </div>
                                <!-- row end -->
                            </form>
                        </div>
                    </div>
                    <!-- column end-->
                </div>
                <!-- row end -->
                <div class="romana_booking_image hidden-sm hidden-xs">
                    <img src="images/booking-man.png" alt="">
                </div>
            </div>
        </section>
<!-- ==================================================
    8.*Counter_Area Start
=================================================== -->
        <section class="romana_counter_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="single_counter">
                            <a href="#"><i class="icofont icofont-emo-simple-smile"></i></a>
                            <h2 class="counter">2048</h2>
                            <h4>satisfied customer</h4>
                        </div>
                        <div class="single_counter">
                            <a href="#"><i class="icofont icofont-thumbs-up"></i></a>
                            <h2><span class="counter">100</span>%</h2>
                            <h4>quality</h4>
                        </div>
                        <!-- single_counter end-->
                        <div class="single_counter">
                            <a href="#"><i class="icofont icofont-paper-plane"></i></a>
                            <h2 class="counter">3000</h2>
                            <h4>project finished</h4>
                        </div>
                        <!-- single_counter end-->
                        <div class="single_counter">
                            <a href="#"><i class="icofont icofont-clock-time"></i></a>
                            <h2 class="counter">10</h2>
                            <h4>years of experience</h4>
                        </div>
                        <!-- single_counter end-->
                        <div class="single_counter">
                            <a href="#"><i class="icofont icofont-speech-comments"></i></a>
                            <h2 class="counter">4466</h2>
                            <h4>cleaning tip advices</h4>
                        </div>
                        <!-- single_counter end-->
                    </div>
                    <!-- column end-->
                </div>
                <!-- row end-->
            </div>
            <!-- container end-->
        </section>
<!--=============================================
    9.*Pricing_area  start
===============================================-->
        <section class="romana_pricing_area section_padding_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>our pricing</h2>
                            <p>Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. </p>
                        </div>
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="romana_single_price text-center">
                            <h3>basic</h3>
                            <h4>$300 <span>/mo</span></h4>
                            <ul>
                                <li>Apartment Cleaning</li>
                                <li>Building Cleaning</li>
                                <li>Wooden Floor Cleaning</li>
                            </ul>
                            <a href="#">order</a>
                        </div>
                        <!-- romana_single_price end-->
                        <div class="romana_single_price price_current_item text-center">
                            <h3>standard</h3>
                            <h4>$500 <span>/mo</span></h4>
                            <ul>
                                <li>Apartment Cleaning</li>
                                <li>Building Cleaning</li>
                                <li>Wooden Floor Cleaning</li>
                            </ul>
                            <a href="#">order</a>
                        </div>
                        <!-- romana_single_price end-->
                        <div class="romana_single_price text-center">
                            <h3>ultimate</h3>
                            <h4>$700 <span>/mo</span></h4>
                            <ul>
                                <li>Apartment Cleaning</li>
                                <li>Building Cleaning</li>
                                <li>Wooden Floor Cleaning</li>
                            </ul>
                            <a href="#">order</a>
                        </div>
                        <!-- romana_single_price end-->
                        <div class="romana_single_price text-center">
                            <h3>gold</h3>
                            <h4>$900 <span>/mo</span></h4>
                            <ul>
                                <li>Apartment Cleaning</li>
                                <li>Building Cleaning</li>
                                <li>Wooden Floor Cleaning</li>
                            </ul>
                            <a href="#">order</a>
                        </div>
                        <!-- romana_single_price end-->
                    </div>
                    <!-- column end-->
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </section>
<!-- ==================================================
    10.*Latest_News_area start
=================================================== -->
        <section class="romana_blog_area section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>latest blog post</h2>
                            <p>Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. </p>
                        </div>
                    </div>
                    <!-- column end -->
                </div>
                <!-- row end -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="blog_crsl">
                            <article class="single_post">
                                <div class="post_thumb">
                                    <a href="single-blog.html"><img src="images/blog-1.jpg" alt=""></a>
                                </div>
                                <div class="post_date">
                                    <h2>22 <span>january</span></h2>
                                </div>
                                <div class="post_text">
                                    <h2>cleaning glasses</h2>
                                    <p>Lobortis aliquip ex ea commodo consequat.Duis autem vel eum iriure dolor hendrerit vulputate velit esse onsequat, vel illum</p>
                                </div>
                                <div class="blog_btn">
                                    <a href="#">Read more</a>
                                </div>
                            </article>
                            <!-- single_post end-->
                            <article class="single_post">
                                <div class="post_thumb">
                                    <a href="single-blog.html"><img src="images/blog-2.jpg" alt=""></a>
                                </div>
                                <div class="post_date">
                                    <h2>22 <span>january</span></h2>
                                </div>
                                <div class="post_text">
                                    <h2>cleaning glasses</h2>
                                    <p>Lobortis aliquip ex ea commodo consequat.Duis autem vel eum iriure dolor hendrerit vulputate velit esse onsequat, vel illum</p>
                                </div>
                                <div class="blog_btn">
                                    <a href="#">Read more</a>
                                </div>
                            </article>
                            <!-- single_post end-->
                            <article class="single_post">
                                <div class="post_thumb">
                                    <a href="single-blog.html"><img src="images/blog-3.jpg" alt=""></a>
                                </div>
                                <div class="post_date">
                                    <h2>22 <span>january</span></h2>
                                </div>
                                <div class="post_text">
                                    <h2>cleaning glasses</h2>
                                    <p>Lobortis aliquip ex ea commodo consequat.Duis autem vel eum iriure dolor hendrerit vulputate velit esse onsequat, vel illum</p>
                                </div>
                                <div class="blog_btn">
                                    <a href="#">Read more</a>
                                </div>
                            </article>
                            <!-- single_post end-->
                        </div>
                    </div>
                    <!-- column end-->
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
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
                                <h2>iservices</h2>
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
                                    <li><span class="fa fa-map-marker"></span>123, Sisimpur West Indies</li>
                                    <li> <span class="fa fa-envelope"></span><a href="#">crazycafe@gmail.com</a></li>
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
                        <!-- column end -->
                    </div>
                    <!-- row end -->
                </div>
                <!-- container end -->
            </div>
            <!-- Footer_Top_area end -->
            <div class="footer_bottom_area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-xs-12">
                            <div class="footer_bottom footer_top text-left">
                                <p><span>jharu © 2016 / All Rights Reserved</span> design by <a href="#">CrazyCafe</a></p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="footer_bottom footer_bottom_text text-right">
                                <p><a href="#">Private Policy</a> | <a href="#">Terms & Conditions</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
                <!-- container end -->
            </div>
            <!-- Footer_bottom_area end -->
        </footer>
<!-- ======================================================
    ***Js Files***
=========================================================== -->

        <!-- ================= Main Js ==================== -->
        <script src="js/front/jquery-3.1.0.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->

        <!-- ================= Bootstrap min Js =========== -->
        <script src="js/front/bootstrap.min.js"></script>

        <!-- ================= owl carousel min Js ======== -->
        <script src="js/front/owl.carousel.min.js"></script>

        <!-- ================= Meanmenu Js ================ -->
        <script src="js/front/jquery.meanmenu.js"></script>

        <!-- ================= counterup min Js ============== -->
        <script src="js/front/jquery.counterup.min.js"></script>

        <!-- ================= waypoints min Js ============== -->
        <script type="text/javascript" src="js/front/waypoints.min.js"></script>

        <!-- ================= Active Js ================== -->
        <script src="js/front/active.js"></script>
    </div>

</body>

</html>