<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SWAN') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

   <script type="text/javascript">
        function enable() {
                var e = document.getElementById("invoice_status");
                var value = e.options[e.selectedIndex].value;
                var text = e.options[e.selectedIndex].text;
               
                if(value==1) {
                        document.getElementById('payment_method_opt').style.display = 'block';
                        document.getElementById('due_date_opt').style.display = 'none';
                    } else {
                        document.getElementById('payment_method_opt').style.display = 'none';
                        document.getElementById('due_date_opt').style.display = 'block';
                        document.getElementById('duedate').disabled = true;
                    }
                }
        </script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
})
</script>
<style type="text/css">
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('/images/page-loader.gif') 50% 50% no-repeat rgb(249,249,249);
    }
</style>

</head>
<body>
<!-- <div class="loader"></div> -->
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @role('admin')
                    <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
                    {{ config('app.name', 'SWAN') }}
                    </a>
                    @endrole
                    @role('agent')
                    <a class="navbar-brand" href="{{ url('/agent/dashboard') }}">
                    {{ config('app.name', 'SWAN') }}
                    </a>
                    @endrole
                     @if (Auth::guest())
                        <a class="navbar-brand" href="{{ url('/login') }}">
                            {{ config('app.name', 'SWAN') }}
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                     @role('admin')
                        <li><a href="/admin/dashboard">Dashboard</a></li>
                        <li><a href="/admin/customer-status">Settings</a></li>
                        <li><a href="/admin/users">Employees</a></li>
                        <li><a href="/admin/packet">Packets</a></li>
                        <li><a href="/admin/service-items">Services</a></li>
                        <li><a href="/admin/potential">Potential Customers</a></li>
                        <li><a href="/admin/customer">Customers</a></li>
                    @endrole
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">
        $("#packets").on('change', function(e) {
                var packet_id = e.target.value;

                $.get('/admin/product_prices?packet_id=' + packet_id, function(data) {
                    //console.log(data);
                    $('#price').empty();
                    $('#total_price').empty();
                    $.each(data, function(index, priceObj) {
                        $('#price').append('<input type="text" value="'+priceObj.price+'&euro;/month"class="form-control text-right" disabled>');

                        $('#total_price').append('<b>Total:</b> <input type="text" value="'+priceObj.price*12+'.00&euro;"class="form-control text-right">');

                        $('#service_price').append('<input id="service_price" name="service_price" type="hidden" value="'+priceObj.price*12+'>');
                        
                        $.each(data, function(index, serviceObj) {
                            $('#description').empty();
                            for (var i = 0; i < serviceObj.service.length; i++) {
                                $('#description').append(serviceObj.service[i].name+"\n");                        
                            }
                        });

                    });
                    
                });

                
        });
    </script>

<script type="text/javascript">

function deleteArticle(id) {
    var ok = confirm("Are you sure to Delete?");
    if(ok) {
    $("#listinvoice").load(location.href+" #listinvoice>*","");
    $.ajax({
            url: '/admin/invoice/'+id,
            data: { "_token": "{{ csrf_token() }}" },
            type: 'DELETE',
            success: function(result) {
                    console.log(result);
                }
            });
        }   
    }
</script>
</body>
</html>