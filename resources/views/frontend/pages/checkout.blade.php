<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@lang('front.checkoutitle') - {{ $settings->company_name }}</title>
    
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
</head>
<body>
    <div id="preloader">
        <div class="preloader_spinner"></div>
    </div>
    <div class="price_page">

    @include('frontend.header')

    <section class="romana_allPage_area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="romana_page_text">
                            <h1>@lang('front.checkoutitle')</h1>
                        </div>
                    </div>
                    
                </div>
            </div>
    </section>
<!-- ==================================================
    CONTACT FORM
=================================================== -->
        <section class="section_padding" style="background-image:none;">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12">
<div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="active" style="font-weight: bold; font-size: 14pt; color: #000;">
                                <td>@lang('front.title')</td>
                                <td>@lang('front.description')</td>
                                <td>@lang('front.price')</td>
                                <td></td>
                                <td style="text-align: right">@lang('front.total')</td>
                            </tr>
                            </thead>
                            <tbody style="font-size: 12pt">
                                <tr>
                                    <td>{{ $services->name }}</td>
                                    <td>
                                        @foreach($services->service as $service)
                                            <li><i class="fa fa-check" aria-hidden="true"></i> {{ $service->name}}</li>
                                        @endforeach
                                    </td>
                                    <td>{{ $services->new_price }} &euro;</td>
                                    <td>x {{ $services->months }} @lang('front.months')</td>
                                    <td style="text-align: right;color: #000;font-size: 15pt;">{{ number_format($services->new_price * $services->months, 2, '.', ',') }} &euro;
                                        <br />
                                        <small style="font-size: 10pt; color: #adadad">
                                            {{ number_format(round(($services->new_price * $services->months)*env('CURRENCY')), 2, '.', ',') }} MKD
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td style="text-align: right">

                                        <form method="post" action="http://swan.mk/en/payment-status">
                                            <input type="hidden" name="clientid" value="180000188" />
                                            <input type="hidden" name="amount" value="{{ $gateway['amount-mk'] }}" />
                                            <input type="hidden" name="islemtipi" value="{{ $gateway['transactionType'] }}" />
                                            <input type="hidden" name="taksit" value="{{ $gateway['instalment'] }}" />
                                            <input type="hidden" name="oid" value="{{ $gateway['oid'] }}" />
                                            <input type="hidden" name="okUrl" value="https://epay.halkbank.mk/fim/est3Dgate" />
                                            <input type="hidden" name="failUrl" value="http://swan.mk/en/payment-status" />
                                            <input type="hidden" name="rnd" value="{{ $gateway['rnd'] }}" />
                                            <input type="hidden" name="hash" value="{{ $hash }}" />
                                            <input type="hidden" name="storetype" value="3D_PAY_HOSTING" />
                                            <input type="hidden" name="lang" value="en" />
                                            <input type="hidden" name="currency" value="807" />
                                            <input type="hidden" name="refreshtime" value="3" />
                                         
                                            <input type="hidden" name="BillToName" value="{{ Auth::user()->name }} {{ Auth::user()->surname }}" /> 
                                            <input type="hidden" name="BillToStreet1" value="{{ Auth::user()->customer->address_out }}"/> 
                                            <input type="hidden" name="BillToCity" value="{{ Auth::user()->customer->city }}"/> 

                                            <input type="hidden" name="BillToCountry" value="{{ Auth::user()->customer->country_id }}"/>
                                            <input type="hidden" name="tel" value="{{ Auth::user()->customer->phone_out }}"/>
                                            <input type="hidden" name="email" value="{{ Auth::user()->email }}" />

                                            <button class="btn btn-danger"><i class="fa fa-shopping-cart" aria-hidden="true"></i> @lang('front.checkoutitle')</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
</div>

                    </div>

                  
                </div>
            </div>
        </section>


       @include('frontend.footer')

        <script src="{{ asset('js/front/jquery-3.1.0.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script src="{{ asset('js/front/gmap.js') }}"></script>
        <script src="{{ asset('js/front/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/front/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/front/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('js/front/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/front/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/front/active.js') }}"></script>
        @include('sweet::alert')
    </div>
</body>
</html>