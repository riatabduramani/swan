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

</head>
<body>

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
                   @if (Auth::user())
                        <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
                        {{ config('app.name', 'SWAN') }}
                        </a>
                    @endif

                     @if (Auth::guest())
                        <a class="navbar-brand" href="{{ url('/login') }}">
                            {{ config('app.name', 'SWAN') }}
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    @role(['admin','superadmin','employee'])
                        <li {{{ (Request::is('admin/dashboard') ? 'class=active' : '') }}}>
                            <a href="/admin/dashboard">Dashboard</a>
                        </li>
                    @endrole
                    @role('superadmin')
                        <li {{{ (Request::is('admin/roles*') ? 'class=active' : '') }}}><a href="/admin/roles">Roles & Permissions</a></li>
                    @endrole
                    @role(['admin','superadmin'])
                         <li {{{ (Request::is('admin/users*') ? 'class=active' : '') }}}>
                            <a href="/admin/users">Employees</a>
                        </li>
                        <li {{{ (Request::is('admin/packet*') ? 'class=active' : '') }}}>
                            <a href="/admin/packet">Packets</a>
                        </li>
                    @endrole
                    @role(['admin','superadmin','employee'])
                        @permission('manage-potential-customer')
                        <li {{{ (Request::is('admin/potential*') ? 'class=active' : '') }}}>
                            <a href="/admin/potential">Potential Customers</a>
                        </li>
                        @endpermission
                        <li {{{ (Request::is('admin/customer*') ? 'class=active' : '') }}}>
                            <a href="/admin/customer">Actual Customers</a>
                        </li>
                        <li {{{ (Request::is('admin/tasks*') ? 'class=active' : '') }}}>
                            <a href="/admin/tasks">Tasks</a>
                        </li>
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
                                    <li {{{ (Request::is('admin/profile') ? 'class=active' : '') }}}>
                                        <a href="/admin/profile">My Profile</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
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

    <script>
        $(document).ready(function(){
            $('.allowlogin').on('change', function(event){
                id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::route('allowLogin') }}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function(data) {
                        //alert('OK works!');
                        location.reload();
                    },
                });
            });
        });
    </script>

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

                        $('#total_price').append('<b>Total:</b> <input type="text" name="total_sum" value="'+priceObj.price*12+'.00" class="form-control text-right" required>');

                        $('#service_price').append('<input id="service_price" name="service_price" type="hidden" value="'+priceObj.price*12+'" required>');
                        
                        $.each(data, function(index, serviceObj) {
                            $('#service_description').empty();
                            for (var i = 0; i < serviceObj.service.length; i++) {
                                $('#service_description').append(serviceObj.service[i].name+"\n");                        
                            }
                        });

                    });
                    
                });

                
        });
</script>


</body>
</html>