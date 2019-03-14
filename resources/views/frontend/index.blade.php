<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{ $settings->company_shortdescription }}">
    <meta name="keywords" content="{{ $settings->company_keywords }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@lang('front.welcometo') {{ $settings->company_name }}</title>

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
    <script src="{{ asset('sweetalert/dist/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert/dist/sweetalert.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {!! $settings->googleanalytics !!}

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
        <section class="romana_pricing_area section_padding_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php 
                            $ids = [
                                'box-standard-home',
                                'box-ekstra-home',
                                'box-eksklusiv-home',
                                'box-exlusive'
                            ];

                            $headers = [
                                'header-standard',
                                'header-ekstra',
                                'header-eksklusiv',
                                'header-eksklusivp'
                            ];

                            $i = 0;
                        ?>
                        @foreach($packets as $packet)

                        <div class="romana_single_price @if($headers[$i] == 'header-ekstra') price_current_item @endif text-center" id="{{ $ids[$i] }}">
                             @if (App::getLocale()=='sq')
                            <h3 class="{{ $headers[$i] }}">{{ $packet->translate('sq')->name }}</h3>
                            @else
                            <h3 class="{{ $headers[$i] }}">{{ $packet->translate('en')->name }}</h3>
                            @endif
                           
                            
                            @if($packet->options == 3)
                                <a href="/{{App::getLocale()}}/contact" style="margin-bottom: 67px;margin-top: 32px;">@lang('front.negotiable')</a>
                            @endif
                            @if($packet->options != 3)
                            <h4>{{ floatval($packet->new_price) }}€<span>/@lang('front.monthly')</span></h4>
                            @endif
                            <ul class="offer-rows">
                                @foreach($packet->service as $service)
                                
                            @if (App::getLocale()=='sq')
                            <li><i class="fa fa-check"></i>&nbsp {{ $service->translate('sq')->name }}</li>
                            @else
                            <li><i class="fa fa-check"></i>&nbsp {{ $service->translate('en')->name }}</li>
                            @endif

                                @endforeach
                            </ul>
                            @if ($packet->id == 1)
                            <a href="/{{App::getLocale()}}/services/{{ $packet->id }}" style="background: #d19a1f none repeat scroll 0 0;">@lang('front.readmore')</a>
                            @else 
                            <a href="/{{App::getLocale()}}/services/{{ $packet->id }}" style="background: #0a587f none repeat scroll 0 0;">@lang('front.readmore')</a>
                            @endif
                            
                            <!--if($packet->options != 3)
                                <a style="background: #d02379" href="/{App::getLocale()}}/checkout/{ $packet->id }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> lang('front.buy')</a>
                            endif-->
                        </div>
                        <?php $i++; ?>
                        @endforeach

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
                
                @foreach($services as $service)
                    
                    <div class="col-sm-4s">
                    <a href="/{{ App::getLocale() }}/services#goto{{ $service->id}}">
                        <div class="single_service text-center">
                            <img src="/uploads/services/{{ $service->image }}" alt="">
                            @if (App::getLocale()=='sq')
                              <h2>{{ $service->translate('sq')->name }}</h2>
                            @else
                           <h2>{{ $service->translate('en')->name }}</h2>
                            @endif
                            
                            <p></p>
                        </div>
                    </a>
                    </div>

                @endforeach
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
                             <img src="images/swan2.png" alt="" style="width:100%;">
                        </div>
                    </div>
                    <div class="col-md-7 col-xs-12">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12" id="vision-text">
                                <div class="explore_text">
                                    <h3>@lang('front.vision')</h3>
                            @if (App::getLocale()=='sq')
                              <p>{!! $pages->translate('sq')->vision !!}</p>
                            @else
                            <p>{!! $pages->translate('en')->vision !!}</p>
                            @endif
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12" id="mission-text">
                                <div class="explore_text explore_text_padding">
                                    <h3>@lang('front.mission')</h3>
                                    <p>{!! $pages->mission !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!-- ==================================================
   CONTACT FORM
=================================================== -->
 
 <section class="romana_service_booking_area section_padding_top">
     <div class="container">
         <h2 class="help-text">@lang('front.morehelp')</h2>
     </div>
</section>
        
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'needhelp')"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp; @lang('front.writeus')</button>
  <button class="tablinks" onclick="openCity(event, 'callus')"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp;&nbsp; @lang('front.callus')</button>
  <button class="tablinks" onclick="openCity(event, 'findus')"><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;&nbsp; @lang('front.findus')</button>
</div>

<div id="needhelp" class="tabcontent">
   <section class="romana_service_booking_area section_padding_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_title">
                            <h2>@lang('front.writeus')</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="romana_booking_form">
                        <ul>
                            @foreach($errors->all() as $error)
                                
                                <script type="text/javascript">
                                    
                                    swal({
                                      title: "{{ __('front.error') }}",
                                      text: "{{ $error }}",
                                      type: "error",
                                      confirmButtonText: "OK"
                                    });
                                </script>
                            @endforeach
                        </ul>

                            {!! Form::open(array('method'=>'POST', 
                          'action'=>'HomeController@contactus')) !!}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name">@lang('front.name')*</label>
                                        <br>
                                        <input type="text" name="name" placeholder="@lang('front.entername')" id="name" required>
                                        <label for="Phone">@lang('front.phone')*</label>
                                        <input type="text" name="phone" placeholder="@lang('front.phone')" id="phone" required>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email">E-mail*</label>
                                        <br>
                                        <input type="text" name="email" placeholder="@lang('front.enteremail')" id="email" required>
                                        <label for="Date">@lang('front.address')*</label>
                                        <br>
                                        <input type="text" name="address" placeholder="@lang('front.enteraddress')" id="address" required>
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="Message">@lang('front.message')*</label>
                                        <br>
                                        <textarea rows="4" placeholder="@lang('front.entermessage')" name="message" id="Message" required></textarea>
                                        <br>
                                        <input type="submit" value="@lang('front.send')">
                                    </div>
                                </div>
                            {!! Form::close() !!}
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
                <h2>@lang('front.mobile')</h2>
            </div>
            <p>@lang('front.urgentcalls')</p>
            <h2><a href="tel: {{ $settings->mob }} ">{{ $settings->mob }}</a></h2>
      </div>
      <div class="rightside">
           <div class="section_title">
                <h2>@lang('front.office')</h2>
           </div>
           <p>@lang('front.workdays') ( 09:00 - 17:00 )</p>
           <h2><a href="tel: {{ $settings->phone }} ">{{ $settings->phone }}</a></h2>
      </div>
 </div>
 </section>
</div>

<div id="findus" class="tabcontent">
  {!! $settings->googlemap !!}
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

        <!-- Include this after the sweet alert js file -->
        @include('sweet::alert')
    </div>
</body>
</html>