<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>About - {{ config('app.name') }}</title>
    
    <link href="{{ asset('images/swan-logob.png') }}" rel="shortcut icon" type="image/png">
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
                            <img src="/images/swan3.png" alt="" style="margin-top:0px;">
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-1 col-sm-6">
                        <div class="romana_story_text section_title">
                            <h2>Few words about us</h2>
                            <p>Cleanliness and care facility where you live or work is the greatest responsibility that may have the owner, therefore, aware of this gathering experience in one of the strongest states economically and developed, such as Denmark, have decided to bring the experience of quality work in our country. Swan, is the company that brings for you services such as: maintenance of houses, gardens and different buildings. The lack of similar companies conditioned us to establish this company, so that in our country, customers have the opportunity to serve with quality services. Care, commitment and responsibility are the features which characterize us, therefore, based on these points, we believe that our work for our clients, will ensure maximum success and will be uncompetive in the free market.</p>
                            <p>Swan, starting in 2017, to allow you to have less worry for your home or building. We are the ones who care about every detail, taking away any possible concern around the house. It is clear that every house or industrial facility requires dedication and care, therefore, Swan brings machinery, working team with experience and the best methods for maintaining and cleaning your house and with this we can say that we offer you reliable service and professional.</p>
                        </div>
                    </div>
                </div>
            </div>
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
                                <p>Convinced on our uncompetitive professionalism that we bring, we tend to be on the top of the pyramid of similar companies in our domestic market. With sincere work and complete dedication, we will always work to be a symbol name of the care and maintenance of facilities.</p>
                            </div>
                            <div class="romana_single_client_text section_title">
                                <h2>Our Mission</h2>
                                <p>We always work for customers and bring everything to them. Experience and innovation we bring to our country's market, are the strongest side in which we resist the competitors. Our sole aim is cleanliness, maintenance and the maximum liability for each object that we work for.</p>
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
    WHY US
=================================================== -->
        <section class="romana_team_area section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>Why Us?</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="team_slider section_padding_top">
                            <div class="single_staff">
                                <!--<a href="#"><img src="images/img1.jpg" alt=""></a>-->
                                <a href="#"><h3>Responsible</h3></a>
                                <p>For any duty that is part of our services, we have the maximum responsibility.</p>
                            </div>

                            <div class="single_staff">
                                <!--<a href="#"><img src="images/img1.jpg" alt=""></a>-->
                                <a href="#"><h3>Comprehensive</h3></a>
                                <p>We are always for everything. Every need of your house and your garden, regardless of the type, is supplemented by our tireless team.</p>
                            </div>

                            <div class="single_staff">
                                <!--<a href="#"><img src="images/img1.jpg" alt=""></a>-->
                                <a href="#"><h3>Experience</h3></a>
                                <p>Successful work in Denmark and many years of experience alone is brought to you, to be always at your service.</p>
                            </div>

                            <div class="single_staff">
                                <!--<a href="#"><img src="images/img1.jpg" alt=""></a>-->
                                <a href="#"><h3>Professional Team</h3></a>
                                <p>Every employee in our company is professionalized in the work they he/she is doing. All we commit details, so that everything is perfect.</p>
                            </div>
                            
                            <div class="single_staff">
                                <!--<a href="#"><img src="images/img1.jpg" alt=""></a>-->
                                <a href="#"><h3>Safety</h3></a>
                                <p>Swan Company was created on safety bases which always offers it to the Customers. Besides the usual services that the Swan Company offers to you, it is also known for the safety of the work it does. Complete safety for you and your house offers only the Swan Company.</p>
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