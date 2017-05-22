<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Contact - {{ config('app.name') }}</title>
    
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
                            <h1>Client Panel</h1>
                            <ol class="breadcrumb">
                                <li><a href="http://swan.mk">Home</a><span></span></li>
                                <li class="active"><a href="#">PANEL</a></li>
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
                        <h3 style="margin-bottom: 10px;">Invoice #{{ $invoice->id }}/{{ date('Y',strtotime($invoice->invoice_date)) }}</h3>

                        <div class="well well-sm col-md-4">
                            <b>Issue Date:</b> {{ date('d.m.Y', strtotime($invoice->invoice_date)) }}<br />
                            <b>Status:</b> {!! $invoice->showPaidStatus($invoice) !!}<br />
                            @if($invoice->payment_status == 1)
                                <b>Payment method:</b> {!! $invoice->showPaidMethod($invoice) !!}<br />
                                <b>Paid at:</b> {{ date('d.m.Y', strtotime($invoice->paid_at)) }}
                            @else
                                <b>Due date:</b> {{ date('d.m.Y', strtotime($invoice->due_date)) }}
                            @endif
                            
                        </div>
                         
                        <table class="table table-bordered" style="margin-top: 10px;">
                            <thead style="background: #f5f5f5;">
                                <tr>
                                    <th>Service</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $invoice->customservice->name }}</td>
                                    <td>{{ $invoice->customservice->description }}</td>
                                    <td>{{ $invoice->total_sum }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right"><b>Total:</b></td>
                                    <td style="background: #f5f5f5;"><b>{{ $invoice->total_sum }}</b></td>
                                </tr>
                            </tbody>
                        </table>

                        @if($invoice->payment_status == 2)
                            <div class="pull-right" style="margin-top: 30px;margin-bottom: 30px;">
                                <button class="btn btn-danger">Pay now</button>
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