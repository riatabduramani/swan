<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@lang('front.invoices') - {{ $settings->company_name }}</title>
    
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
    <div class="price_page">

    @include('frontend.header')

    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="romana_page_text">
                        <h1>@lang('front.clientpanel')</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ env('APP_URL')}}/{{ App::getLocale() }}/panel">@lang('front.home')</a><span></span></li>
                            <li class="active"><a href="{{ env('APP_URL')}}/{{ App::getLocale() }}/panel/invoices">@lang('front.invoices')</a></li>
                            <li class="active"><a href="#">@lang('front.show')</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ==================================================
    PANEL FORM
=================================================== -->
            <div class="container" style="color: #000;">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-3">
                          @include('frontend.panel.menu')
                    </div>
                    <div class="col-md-7">

                        @if (Session::has('message-approved'))
                           <div class="alert alert-success">{{ Session::get('message-approved') }}</div>
                        @endif
                        @if (Session::has('message-notapproved'))
                           <div class="alert alert-danger">{{ Session::get('message-declined') }}</div>
                        @endif
                        @if (Session::has('message-declined'))
                           <div class="alert alert-danger">{{ Session::get('message-declined') }}</div>
                        @endif

                        <h3 style="margin-bottom: 10px;">@lang('front.invoice') #{{ $invoice->id }}/{{ date('Y',strtotime($invoice->invoice_date)) }}</h3>

                        <div class="well well-sm col-md-4">
                            <b>@lang('front.issuedate'):</b> {{ date('d.m.Y', strtotime($invoice->invoice_date)) }}<br />
                            <b>@lang('front.status'):</b> {!! $invoice->showPaidStatus($invoice) !!}<br />
                            @if($invoice->payment_status == 1)
                                <b>@lang('front.paymentmethod'):</b> {!! $invoice->showPaidMethod($invoice) !!}<br />
                                <b>@lang('front.paidat'):</b> {{ date('d.m.Y', strtotime($invoice->paid_at)) }}
                            @else
                                <b>@lang('front.duedate'):</b> {{ date('d.m.Y', strtotime($invoice->due_date)) }}
                            @endif
                            
                        </div>
                        
                        <table class="table table-bordered" style="margin-top: 10px;">
                            <thead style="background: #f5f5f5;">
                                <tr>
                                    <th>@lang('front.service')</th>
                                    <th>@lang('front.description')</th>
                                    <th>@lang('front.price')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($invoice->invoice_type == 2)
                                <tr>
                                    <td>{{ $invoice->customservice->name }}</td>
                                    <td>{!! $invoice->description !!}</td>
                                    <td>{{ $invoice->total_sum }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $invoice->packetservice->name }}</td>
                                     <td>{!! $invoice->description !!}</td>
                                    <td>{{ $invoice->price }}&euro;
                                        x {{ $invoice->months }} @lang('front.months')
                                    </td>
                                </tr>
                            @endif
                                <tr>
                                    <td colspan="2" class="text-right"><b>@lang('front.total'):</b></td>
                                    <td style="background: #f5f5f5;"><b>{{ number_format($invoice->total_sum, 2, '.', ',') }}&euro;</b>

                                        <br>
                                        <small style="font-size: 10pt; color: #adadad">
                                            {{ number_format(floor($invoice->total_sum_mkd), 2, ',', '.') }} MKD
                                        </small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        @if($invoice->payment_status == 2)
                            <div class="pull-right" style="margin-top: 30px;margin-bottom: 30px;">

                            <form method="post" action="https://epay.halkbank.mk/fim/est3Dgate">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="clientid" value="{{ $clientId }}" />
                                    <input type="hidden" name="amount" value="{{ $amount }}" />
                                    <input type="hidden" name="islemtipi" value="{{ $transactionType }}" />
                                    <input type="hidden" name="taksit" value="{{ $instalment }}" />
                                    <input type="hidden" name="oid" value="{{ $oid }}" />
                                    <input type="hidden" name="okUrl" value="{{request::Root()}}/en/paymentstatus" />
                                    <input type="hidden" name="failUrl" value="{{request::Root()}}/en/paymentstatus" />
                                    <input type="hidden" name="rnd" value="{{ $rnd }}" />
                                    <input type="hidden" name="hash" value="{{ $hash }}" />
                                    <input type="hidden" name="storetype" value="{{ $storetype }}" />
                                    <input type="hidden" name="lang" value="{{ $lang }}" />
                                    <input type="hidden" name="currency" value="807" />
                                     <input type="hidden" name="refreshtime" value="10" />
                                            
                                            <input type="hidden" name="encoding" value="utf-8" />     
                                            <input type="hidden" name="BillToName" value="{{ Auth::user()->name }} {{ Auth::user()->surname }}" /> 
                                            <input type="hidden" name="BillToStreet1" value="{{ Auth::user()->customer->address_out }}"/> 
                                            <input type="hidden" name="BillToCity" value="{{ Auth::user()->customer->city }}"/> 
                                            <input type="hidden" name="BillToCountry" value="{{ Auth::user()->customer->country_id }}"/>
                                            <input type="hidden" name="tel" value="{{ Auth::user()->customer->phone_out }}"/>
                                            <input type="hidden" name="email" value="{{ Auth::user()->email }}" />

                                            <button class="btn btn-danger">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> @lang('front.paynow')
                                            </button>
                                        </form>

                            </div>
                        @else
                            <div class="pull-right" style="margin-top: 30px;margin-bottom: 30px;">
                                <a href="/{{ App::getLocale() }}/panel/downloadinvoice/{{ $invoice->id }}" class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Invoice</a>
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>


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
    </div>
</body>
</html>