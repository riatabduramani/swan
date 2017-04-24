<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Welcome to {{ config('app.name') }}</title>

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
                    <div class="col-sm-12" style="padding-top: 50px; padding-bottom: 50px;">
                        <div class="romana_single_price text-center" style="margin-top: 392px;">
                            <h3 style="background-image: url(images/standard.png);padding-top: 20px;margin-top: -41px;">standard</h3>
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
                            <h3 style="color:#303d41;border-bottom: #858888 1px solid; background-image: url(images/ekstra.png);padding-top: 20px;margin-top: -41px;">ekstra</h3>
                            <h4 style="color: #04699a;">49 € <span>/mo</span></h4>
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
                            <h3 style="    background-image: url(images/eksklusiv.png);
    padding-top: 20px;
    margin-top: -41px;">eksklusiv</h3>
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
                            <h3 style="    background-image: url(images/eksklusivp.png);
    padding-top: 20px;
    margin-top: -41px;">eksklusiv +</h3>
                            <h4><span>Negotiable</span></h4>
                            <ul style="line-height: 28px;">
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
                    <div class="col-sm-4s">
                        <div class="single_service text-center">
                            <img src="{{ asset('images/general-cleaning.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Yeary general cleaning</h2>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-sm-4s">
                        <div class="single_service text-center">
                            <img src="{{ asset('images/client-arrives.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>House preparation</h2><br>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-sm-4s">
                        <div class="single_service text-center">
                             <img src="{{ asset('images/control-week.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Control every 14 days</h2><br>
                            <p></p>
                        </div>
                    </div>
                    
                     <div class="col-sm-4s">
                        <div class="single_service text-center">
                           <img src="{{ asset('images/monthly-check.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Monthly check</h2><br>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-sm-4s">
                        <div class="single_service text-center">
                           <img src="{{ asset('images/report-errors.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Reporting of errors / defects</h2>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-sm-4s">
                        <div class="single_service text-center">
                            <img src="{{ asset('images/winter-package.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Winter package</h2><br>
                            <p></p>
                        </div>
                    </div>
                     <div class="col-sm-4s">
                        <div class="single_service text-center">
                           <img src="{{ asset('images/window-washing.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Window washing</h2><br>
                            <p></p>
                        </div>
                    </div>
                     <div class="col-sm-4s">
                        <div class="single_service text-center">
                            <img src="{{ asset('images/furnitures.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Coverage of furnitures</h2><br>
                            <p></p>
                        </div>
                    </div>
                     <div class="col-sm-4s">
                        <div class="single_service text-center">
                           <img src="{{ asset('images/payment-invoice.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Payoment of Invoices</h2><br>
                            <p></p>
                        </div>
                    </div>
                     <div class="col-sm-4s">
                        <div class="single_service text-center">
                            <img src="{{ asset('images/garden-maintenance.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Garden maintenance</h2><br>
                            <p></p>
                        </div>
                    </div>
                     <div class="col-sm-4s">
                        <div class="single_service text-center">
                           <img src="{{ asset('images/invoices.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Invoice information that do not come from the Municipality</h2>
                            <p></p>
                        </div>
                    </div>
                     <div class="col-sm-4s">
                        <div class="single_service text-center">
                            <img src="{{ asset('images/planting.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Planting</h2><br><br>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-sm-4s">
                        <div class="single_service text-center">
                            <img src="{{ asset('images/grocery.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Buying household items</h2>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-sm-4s">
                        <div class="single_service text-center">
                           <img src="{{ asset('images/internet.png') }}" alt="" style="width:55%; border-radius: 15px; border: #04699a 3px solid;margin-top: 6%;">
                            <h2>Internet</h2>
                            <p></p>
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
                            <!--<img src="http://static.wixstatic.com/media/e634ef_f3bf3b4500144c55a73cdcc6aa4ec5f7.png_srz_144_171_85_22_0.50_1.20_0.00_png_srz" alt="" style="width:100%;">-->
                                 <img src="images/swan2.png" alt="" style="width:100%;">
                        </div>
                    </div>
                    <div class="col-md-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12" style="border-right: white 1px solid;margin-top: 10px;padding-right: 30px;">
                                <div class="explore_text">
                                    <h3>Vision</h3>
                                    <p>Convinced on our uncompetitive professionalism that we bring, we tend to be on the top of the pyramid of similar companies in our domestic market. With sincere work and complete dedication, we will always work to be a symbol name of the care and maintenance of facilities.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12" style="margin-top: 10px;">
                                <div class="explore_text explore_text_padding">
                                    <h3>Mission</h3>
                                    <p>We always work for customers and bring everything to them. Experience and innovation we bring to our country's market, are the strongest side in which we resist the competitors. Our sole aim is cleanliness, maintenance and the maximum liability for each object that we work for.</p>
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
         <h2 style="text-align: center;color: #04699a;font-weight: bold;margin-top: 0px;padding-bottom: 60px;">Need more help?</h2>
     </div>
</section>
        
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'needhelp')" style="width: 33%;"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp; Write us</button>
  <button class="tablinks" onclick="openCity(event, 'callus')" style="width: 33%;"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp;&nbsp; Call us</button>
  <button class="tablinks" onclick="openCity(event, 'findus')" style="width: 33%;"><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;&nbsp; Find us</button>
</div>

<div id="needhelp" class="tabcontent">
   <section class="romana_service_booking_area section_padding_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>Write us</h2>
                            <p></p>
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
                                        <label for="Date">Address*</label>
                                        <br>
                                        <input type="text" name="address" placeholder="Enter your address here" id="address">
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
                    <img src="images/contactbg.png" alt="">
                </div>
            </div>
        </section>
</div>

<div id="callus" class="tabcontent">
 <section class="romana_service_booking_area section_padding_top">
  <div class="container">
      <div class="leftside">
                        <div class="section_title">
                           <h2 style="color:#04699a;font-weight:bold;padding-bottom: 10px;">Mobile Phone</h2>
                        </div>
         <p>Urgent Calls!</p>
         <h2 style="padding-bottom: 70px;">+389 (0) 70 123 456</h2>
      </div>
      <div class="rightside">
        <div class="section_title">
                           <h2 style="color:#04699a;font-weight:bold;padding-bottom: 10px;">Office</h2>
                        </div>
      <p>Monday - Friday ( 09:00 - 17:00 )</p>
      <h2 style="padding-bottom: 70px;">+389 (0) 70 123 456</h2>
      </div>
 </div>
 </section>
</div>

<div id="findus" class="tabcontent">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1442.9213453971747!2d21.07165264549887!3d42.094434957994906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDLCsDA1JzQwLjAiTiAyMcKwMDQnMjEuOCJF!5e1!3m2!1smk!2smk!4v1491590997859" style="width:100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
        
        
        
        
        
        
        
        
        
        
        
       

<!-- ==================================================
    BRANDS
=================================================== -->
        <!--<section class="romana_brand_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="brand_crsl">
                            <div class="single_brand">
                                <a href="#"><img src="images/logonilfisk.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/cloroxlogo.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/logoabena.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/logoajax.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/logodiversey.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/logofiskars.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/logogreencare.png" alt=""></a>
                            </div>
                             <div class="single_brand">
                                <a href="#"><img src="images/logonilfisk.png" alt=""></a>
                            </div>
                             <div class="single_brand">
                                <a href="#"><img src="images/logotana.png" alt=""></a>
                            </div>
                             <div class="single_brand">
                                <a href="#"><img src="images/logounger.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        
        <section class="romana_team_area section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="team_slider section_padding_top" style="padding-top:0px;">
                          <div class="single_brand">
                                <a href="#"><img src="images/logonilfisk.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/logodiversey.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/logogreencare.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/logoajax.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/cloroxlogo.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/logofiskars.png" alt=""></a>
                            </div>
                            <div class="single_brand">
                                <a href="#"><img src="images/logoabena.png" alt=""></a>
                            </div>
                             <div class="single_brand">
                                <a href="#"><img src="images/logonilfisk.png" alt=""></a>
                            </div>
                             <div class="single_brand">
                                <a href="#"><img src="images/logotana.png" alt=""></a>
                            </div>
                             <div class="single_brand">
                                <a href="#"><img src="images/logounger.png" alt=""></a>
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
        <script>
         var all_links = Array.from( document.querySelectorAll(".romana_hero_area a[href='contact']") )

         // using the anonymous function of Array.prototype.forEach() rather
         // than Arrow functions, given the work being done here:
         .forEach(function(all_links){

           // while the <a> element has a firstChild:
           while(all_links.firstChild) {

             // we access the parentNode of the <a> and
             // use the insertBefore() method to insert
             // the firstChild of the <a> before the <a>:
             all_links.parentNode.insertBefore(all_links.firstChild, all_links);
           }

           // once the <a> is emptied of its content,
           // we again access the parentNode and remove
           // the <a> element itself:
           all_links.parentNode.removeChild(all_links);

           });
       </script>
    </div>
</body>
</html>