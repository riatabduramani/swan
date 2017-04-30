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
   SERVICES
=================================================== -->
        <section class="romana_service_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">General cleaning</h2>
                            <ul>
                            <li class="service-text">    
                            <p>Bedroom – Dust cleaning – All floors of the house will be cleaned + ceiling – will be cleaned with vacuum cleaner and the floor will be cleaned with detergent;<br>
Bathroom – General cleaning such as floor tiles, sink etc.;<br>
Hallway – cleaning of dust with cloth and vacuum cleaner, sweeping around a wall in panels and things available to clean, will be cleaned with detergent;<br>
Kitchen – all the shelves of the kitchen, refrigerator, electrical appliancies, sink etc., will be cleaned with cloth, and the floor will be cleaned with detergent;<br>
Cellar - will be cleaned with vacuum cleaner and the floor will be cleaned with detergent.</p>
                            </li>
                            <li class="service-photo">    
                               <img src="{{ asset('images/general-cleaning.png') }}" style="border-radius: 15px;"/>
                            </li>    
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Preparation of the house before the client arrives</h2>
                            <ul>
                            <li class="service-text"> 
                            <p>It will be cleaned with vacuum cleaner and the floor will be cleaned with detergent;<br>
	Preparation of furniture - covers removed;<br>
	Refrigerator is turned on;<br>
	Reactivation of the water system; <br>
	Cooling air and opening the windows;<br>
	Checking the functionality of water and electricity.</p>
                            </li>
                            <li class="service-photo">    
                               <img src="{{ asset('images/client-arrives.png') }}" style="border-radius: 15px;"/>
                            </li>   
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4" id="services-list">
                         <div class="single_service text-center">
                            <h2 style="text-align:left;">Control every 14 days</h2>
                            <ul>
                            <li class="service-text"> 
                            <p>This control will be made when the client is abroad<br>
	Overall control where all the rooms, cellar and the ceiling will be checked<br>
	Cleaning of the insects</p>
                            </li> 
                            <li class="service-photo">    
                               <img src="{{ asset('images/control-week.png') }}" style="border-radius: 15px;"/>
                            </li>   
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Monthly check</h2>
                            <ul>
                            <li class="service-text"> 
                            <p>All wondows will be opened for about 30 minutes so the rooms are ventilated <br>
	Will be cleaned with vacuum cleaner and the floor will be cleaned with detergent<br>
	House control for any eventual defect<br>
	Filling the control report<br>
	Cheching the ceiling for any eventual defect.</p>
                            </li>
                            <li class="service-photo">    
                               <img src="{{ asset('images/monthly-check.png') }}" style="border-radius: 15px;"/>
                            </li>  
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Reporting of errors / defects</h2>
                            <ul>
                            <li class="service-text">    
                            <p>If any defect is detected, it will be reported to the office and then the office will report to the client and offering fault regulation before the defect grows, and all this for a special price. </p>
                            </li>
                             <li class="service-photo">    
                               <img src="{{ asset('images/report-errors.png') }}" style="border-radius: 15px;"/>
                            </li>  
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Winter package</h2>
                            <ul> 
                            <li class="service-text"> 
                            <p>Switching the heating system of the house, if the client arrives in the winter<br>
Switching off the water system<br>
Adding antifreeze in the toilet<br>
Cleaning of the snow</p>
                            </li>
                             <li class="service-photo">    
                               <img src="{{ asset('images/winter-package.png') }}" style="border-radius: 15px;"/>
                            </li>  
                            </ul>
                        </div>
                    </div>            
                </div>
                
                <div class="row">
                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Window washing</h2>
                            <ul> 
                            <li class="service-text">
                            <p>Twice a year the windows will be cleaned inside and out with detergent</p>
                            </li>
                             <li class="service-photo">    
                               <img src="{{ asset('images/window-washing.png') }}" style="border-radius: 15px;"/>
                            </li>  
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Coverage of furnitures</h2>
                            <ul>
                            <li class="service-text"> 
                            <p>Twice a year the furnitures will be covered to be protected from the dust and they will be uncovered before the client arrives at home. </p>
                            </li>
                           <li class="service-photo">    
                               <img src="{{ asset('images/furnitures.png') }}" style="border-radius: 15px;"/>
                            </li>  
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Payoment of Invoices</h2>
                            <ul> 
                            <li class="service-text"> 
                            <p>We will report to client if the client receives any unpaid Invoice, then the client will decide if we have to process and pay the Invoice or not. Invoice administration is free but the Invoice is paid by the Client.</p>
                            </li>
                           <li class="service-photo">    
                               <img src="{{ asset('images/payment-invoice.png') }}" style="border-radius: 15px;"/>
                            </li>  
                            </ul>
                        </div>
                    </div>            
                </div>
                
                 <div class="row">
                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Garden maintenance</h2>
                            <ul> 
                            <li class="service-text"> 
                            <p>Irrigation of flowers<br>
Mowing pastures<br>
Cleaning of garden road</p>
                            </li>
                           <li class="service-photo">    
                               <img src="{{ asset('images/garden-maintenance.png') }}" style="border-radius: 15px;"/>
                            </li>  
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Invoice information that do not come from the Municipality</h2>
                            <ul> 
                            <li class="service-text">
                            <p>We will inform the client for the invoices they receive such as: Invoices from Mosque or any other institution.<br>
Administration of these documents will be done for free from SWAN.</p>
                            </li>
                              <li class="service-photo">    
                               <img src="{{ asset('images/invoices.png') }}" style="border-radius: 15px;"/>
                            </li>  
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Planting</h2>
                            <ul> 
                            <li class="service-text"> 
                            <p>In our web site, we have a plant catalog where the client can choose flowers that prefers in his garden.<br>
In the price is included that we will sow the flowers but the client should buy the flowers</p>
                            </li>
                            <li class="service-photo">    
                               <img src="{{ asset('images/planting.png') }}" style="border-radius: 15px;"/>
                            </li> 
                            </ul>
                        </div>
                    </div>            
                </div>
                
                <div class="row">
                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Buying household articles</h2>
                            <ul>
                            <li class="service-text">
                            <p>Client will receive a package with articles such as:<br>
Bread, 
Drinks, 
Coffee, 
Cheese
etc.<br>
With these articles the house will be supplied before the client arrives and all these articles will be free from SWAN Company
</p>
                            </li>
                           <li class="service-photo">    
                               <img src="{{ asset('images/grocery.png') }}" style="border-radius: 15px;"/>
                            </li> 
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4" id="services-list">
                        <div class="single_service text-center">
                            <h2 style="text-align:left;">Internet</h2>
                            <ul>  
                            <li class="service-text"> 
                            <p>Full Internet where the entire house will be equiped with Internet (WIFI)<br>
Vehicle control<br>
Turn on the car<br>
Washing the car<br>
Reporting if there is any defect to the car.
</p>
                             <li class="service-photo">    
                               <img src="{{ asset('images/internet.png') }}" style="border-radius: 15px;"/>
                            </li> 
                            </ul>
                        </div>
                    </div>          
                </div>

            </div>
        </section>
<!-- ==================================================
    BANNER
=================================================== -->
        <section class="romana_clean_theme_area" style="background: rgba(0, 0, 0, 0) url(../images/homebg2.jpg) no-repeat scroll center center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8">
                        <div class="romana_clean_theme_text">
                            <h3></h3>
                            <p></p>
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
                <div class="row" style="margin-top: -110px;">
                    <div class="col-sm-12">
                        <div class="romana_single_price text-center" id="box-standard">
                            <h3 class="header-standard">standard</h3>
                            <h4>29  €<span>/mo</span></h4>
                            <ul style="text-align: left;padding-left: 13%;">
                                <li><i class="fa fa-check"></i>&nbsp Thorough cleaning 1 time</li>
                                <li><i class="fa fa-check"></i>&nbsp Preparation 1 time</li>
                                <li><i class="fa fa-check"></i>&nbsp Control every 14 Days</li>
                                <li><i class="fa fa-check"></i>&nbsp Monthly control </li>
                                <li><i class="fa fa-check"></i>&nbsp Problem report</li>
                            </ul>
                            <a href="#">Order now</a>
                        </div>

                        <!--<div class="romana_single_price price_current_item text-center" style="margin-top: 260px;">-->
                        <div class="romana_single_price text-center" id="box-ekstra">
                            <h3 class="header-ekstra">ekstra</h3>
                            <h4>49 € <span>/mo</span></h4>
                            <ul style="text-align: left;padding-left: 13%;">
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

                        <div class="romana_single_price text-center" id="box-eksklusiv">
                            <h3 class="header-eksklusiv">eksklusiv</h3>
                            <h4>69 € <span>/mo</span></h4>
                            <ul style="text-align: left;padding-left: 13%;">
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
                            <h3 class="header-eksklusivp">eksklusiv +</h3>
                            <h4><span>Negotiable</span></h4><br><br>
                            <ul style="text-align: left;padding-left: 13%;">
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
                            <a href="#">Contact us</a>
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