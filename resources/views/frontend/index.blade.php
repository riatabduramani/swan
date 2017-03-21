<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Welcome to {{ config('app.name') }}</title>

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
    <div class="home_page">

    @include('frontend.header')

<!-- ==================================================
    PACKAGES
=================================================== -->
    <section class="romana_hero_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <!--DO NOT DELETE 
                          <div class="hero_slider">
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
                <!--<div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>Our Packages</h2>
                            <p></p>
                        </div>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="romana_single_price text-center" style="margin-top: 392px;">
                            <h3>basis</h3>
                            <h4>29  €<span>/mo</span></h4>
                            <ul>
                                <li><i class="fa fa-check"></i>&nbsp Thorough cleaning 1 time</li>
                                <li><i class="fa fa-check"></i>&nbsp Preparation 1 time</li>
                                <li><i class="fa fa-check"></i>&nbsp Control every 14 Days</li>
                                <li><i class="fa fa-check"></i>&nbsp Monthly control </li>
                                <li><i class="fa fa-check"></i>&nbsp Problem report</li>
                            </ul>
                            <a href="#">Read more</a>
                        </div>

                        <div class="romana_single_price price_current_item text-center" style="margin-top: 260px;">
                            <h3>ekstra</h3>
                            <h4>49 € <span>/mo</span></h4>
                            <ul>
                                <li><i class="fa fa-check"></i>&nbsp Thorough cleaning 2 times</li>
                                <li><i class="fa fa-check"></i>&nbsp Preparation 2 times</li>
                                <li><i class="fa fa-check"></i>&nbsp Control every 14 Days</li>
                                <li><i class="fa fa-check"></i>&nbsp Monthly control </li>
                                <li><i class="fa fa-check"></i>&nbsp Problem report</li>
                                <li><i class="fa fa-check"></i>&nbsp Winter package </li>
                                <li><i class="fa fa-check"></i>&nbsp Window cleaning</li>
                                <li><i class="fa fa-check"></i>&nbsp Covering of furnitures</li>
                            </ul>
                            <a href="#">Read more</a>
                        </div>

                        <div class="romana_single_price text-center" style="margin-top: 186px;">
                            <h3>eksklusiv</h3>
                            <h4>69 € <span>/mo</span></h4>
                            <ul>
                                <li><i class="fa fa-check"></i>&nbsp Thorough cleaning 2 times</li>
                                <li><i class="fa fa-check"></i>&nbsp Preparation 2 times</li>
                                <li><i class="fa fa-check"></i>&nbsp Control every 14 Daysl</li>
                                <li><i class="fa fa-check"></i>&nbsp Monthly control </li>
                                <li><i class="fa fa-check"></i>&nbsp Problem report</li>
                                <li><i class="fa fa-check"></i>&nbsp Winter package </li>
                                <li><i class="fa fa-check"></i>&nbsp Window cleaning</li>
                                <li><i class="fa fa-check"></i>&nbsp Covering of furnitures</li>
                                <li><i class="fa fa-check"></i>&nbsp Bill payment </li>
                                <li><i class="fa fa-check"></i>&nbsp Buying groceries</li>
                                <li><i class="fa fa-check"></i>&nbsp Maintenance of garden</li>
                            </ul>
                            <a href="#">Read more</a>
                        </div>

                        <div class="romana_single_price text-center">
                            <h3>eksklusiv +</h3>
                            <h4>119 € <span>/mo</span></h4>
                            <ul>
                                <li><i class="fa fa-check"></i>&nbsp Thorough cleaning 5 times</li>
                                <li><i class="fa fa-check"></i>&nbsp Preparation 5 times</li>
                                <li><i class="fa fa-check"></i>&nbsp Control every 14 Days</li>
                                <li><i class="fa fa-check"></i>&nbsp Monthly control </li>
                                <li><i class="fa fa-check"></i>&nbsp Problem report</li>
                                <li><i class="fa fa-check"></i>&nbsp Winter package </li>
                                <li><i class="fa fa-check"></i>&nbsp Window cleaning</li>
                                <li><i class="fa fa-check"></i>&nbsp Covering of furnitures</li>
                                <li><i class="fa fa-check"></i>&nbsp Bill payment </li>
                                <li><i class="fa fa-check"></i>&nbsp Buying groceries</li>
                                <li><i class="fa fa-check"></i>&nbsp Maintenance of garden</li>
                                <li><i class="fa fa-check"></i>&nbsp Plant work</li>
                                <li><i class="fa fa-check"></i>&nbsp Internet (Wi-Fi)</li>
                                <li><i class="fa fa-check"></i>&nbsp Car package</li>
                            </ul>
                            <a href="#">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
                        
                    </div>
                </div>
            </div>
        </section>

<!-- ==================================================
    BANNER
=================================================== -->
        <!--DO NOT DELETE 
        <section class="romana_counter_area">
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
  SERVICES
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
   VISSION AND MISSION
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
   OUR TEAM
=================================================== -->
        <!--DO NOT DELETE
          <section class="romana_team_area section_padding">
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
   CONTACT FORM
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
    BRANDS
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
                </div>
            </div>
        </section>

       @include('frontend.footer')

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