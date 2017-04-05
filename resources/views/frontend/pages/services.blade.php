<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Services - {{ config('app.name') }}</title>
    
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
    <div class="service_page">

      @include('frontend.header')

    <section class="romana_allPage_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="romana_page_text">
                            <h1>services</h1>
                            <ol class="breadcrumb">
                                <li><a href="http://swan.mk">Home</a><span></span></li>
                                <li class="active"><a href="#">service</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<!-- ==================================================
    3.*Service-Area Start 
=================================================== -->
        <section class="romana_service_area">
            <div class="container">
                <div class="row">
                    <!--<h2 class="services-title">Basis</h2><br>-->
                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon1.png" alt="">
                            <h2>1 stk. Hovedrengøring årligt</h2>
                            <p>Efter kunden er rejst skal huset gøres hovedrent, som indbefatter følgende:
	Værelserne – Støv af – Aftørre alle lodrette og vandrette flader – støvsug og vask af gulv
	Badeværelserne – Rengør brusekabine /badekar, toiletkummen, håndvask, gulv og fliser
	Gang – Afstøvning, støvsugning, aftørring af paneler og tilgængelige flader, vask af gulv
	Køkken – Alle køkkenskabe aftørres udvendigt, køleskab, komfur, mikroovn, kogeplade, 	håndvasken rengøres . Gulvet støvsuges og vaskes.
	Kælder m.m.
 </p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon2.png" alt="">
                            <h2>1 stk. Klargøring inden ankomst</h2>
                            <p>Støver hele huset af <br>
	Støvsuger og vasker gulv <br>
	Fjerner overdækning af møbler<br>
	Tænder køleskab<br>
	Åbner op for vandet <br>
	Udlufter <br>
	Kontroller at vand og el virker 
 </p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon3.png" alt="">
                            <h2>14 dags kontrol </h2>
                            <p>Dette bliver udført når kunden ikke er der<br>
	Går hele huset igennem (alle værelser)<br>
	Tager evt. spindelvæv
</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon4.png" alt="">
                            <h2>Månedlig kontrol </h2>
                            <p>Åbner alle vinduer i min 30 min <br>
	Støver af mere grundigt <br>
	Gennemgår huset for evt. fejl.<br>
	Udfyld kontrolrapport<br>
	Loft kontrol
 </p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="single_service text-center">
                            <img src="images/icon5.png" alt="">
                            <h2>Fejlrapportering</h2>
                            <p>Hvis der bliver fundet fejl, bliver kunden kontaktet med et tilbud for at udbedre dem.
 </p>
                        </div>
                    </div>
                    
                </div>


            </div>
        </section>
<!-- ==================================================
    BANNER
=================================================== -->
        <section class="romana_clean_theme_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8">
                        <div class="romana_clean_theme_text">
                            <h3>Some text here</h3>
                            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--=============================================
    SERVICES
===============================================-->
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
                            <a href="#">Order now</a>
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
                            <a href="#">Order now</a>
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
                            <a href="#">Order now</a>
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
                            <a href="#">Order now</a>
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