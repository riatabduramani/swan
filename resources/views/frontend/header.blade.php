        <header class="romana_header">
            <div class="hrader_top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-xs-12">
                            <div class="logo">
                                <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-sm-7 col-md-offset-1">
                            <div class="header_top_left">
                                <ul>
                                    <li><span class="fa fa-phone"></span>+389 (0) 70 123 4563</li>
                                    <li><span class="fa fa-envelope"></span>info@swan.mk</li>
                                    <!--<li><span class="fa fa-map-marker"></span></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-12">
                            <div class="header_top_right">
                             @if (Auth::check())
                                @role('admin')
                                <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                @endrole
                            @else
                                <a href="{{ url('/login') }}"><i class="fa fa-user-circle-o"></i>

  Login</a> | 
                                <a href="{{ url('/register') }}">Register</a>
                            @endif
                            </div>
                        </div>
                    </div>
                    <!--<div class="row">
                        <div class="col-xs-12">
                            <div class="searchbox">
                                <input type="text" id="serch" class="search-box" placeholder="Search">
                                <label for="serch" class="fa fa-search mainsearch"></label>
                                <i class="fa fa-close close-button"></i>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="header_bottom_area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mainmenu">
                                <nav>
                                    <ul>
                                        <li class="active"><a href="index.html">home</a></li>
                                        <li><a href="about.html">about us</a></li>
                                        <li><a href="service.html">our services</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>