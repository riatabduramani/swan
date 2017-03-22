<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>About - {{ config('app.name') }}</title>
    
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
    <div class="about_page">
        
    @include('frontend.header')
        
    <section class="romana_allPage_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="romana_page_text">
                            <h1>about us</h1>
                            <ol class="breadcrumb">
                                <li><a href="http://swan.mk">Home</a><span></span></li>
                                <li class="active"><a href="#">about us</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<!-- ==================================================
    5.*Service-Area Start 
=================================================== -->
        <section class="romana_our_story_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <div class="romana_story_img">
                            <img src="images/historymg.jpg" alt="">
                        </div>
                    </div>
                    <!-- column End -->
                    <div class="col-md-6 col-md-offset-1 col-sm-6">
                        <div class="romana_story_text section_title">
                            <h2>Few words about us</h2>
                            <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit </p>
                            <p>praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
                        </div>
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
        <section class="romana_client_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="romana_client_text hero_slider">
                            <div class="romana_single_client_text section_title">
                                <h2>Our Vision</h2>
                                <p>Duis autem vel eum iriure in putateesse molestie sequat, Hendrerit in vulputate vel illum dolore. </p>
                            </div>
                            <div class="romana_single_client_text section_title">
                                <h2>Our Missiony</h2>
                                <p>Duis autem vel eum iriure in putateesse molestie sequat, Hendrerit in vulputate vel illum dolore. </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5 col-sm-offset-3 col-xs-12">
                        <div class="row">
                            <!--<div class="col-xs-4">
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-emo-simple-smile"></i></a>
                                    <h2 class="counter"></h2>
                                    <h4></h4>
                                </div>
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-clock-time"></i></a>
                                    <h2 class="counter"></h2>
                                    <h4></h4>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-thumbs-up"></i></a>
                                    <h2><span class="counter"></span></h2>
                                    <h4></h4>
                                </div>
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-speech-comments"></i></a>
                                    <h2 class="counter"></h2>
                                    <h4></h4>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-paper-plane"></i></a>
                                    <h2 class="counter"></h2>
                                    <h4></h4>
                                </div>
                                <div class="single_counter">
                                    <a href="#"><i class="icofont icofont-coffee-cup"></i></a>
                                    <h2 class="counter"></h2>
                                    <h4></h4>
                                </div>
                            </div>-->

                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- ==================================================
    8.*Team_area start
=================================================== -->
        <section class="romana_team_area section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>our staff</h2>
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