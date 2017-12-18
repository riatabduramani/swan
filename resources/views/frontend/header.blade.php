
        <header class="romana_header">
            <div class="hrader_top_area">
                <div class="container">
                    <div class="row" id="header-box">
                        <div class="col-sm-2 col-xs-12" id="logo-box">
                            <div class="logo">
                                <a href="{{ env('APP_URL') }}/{{ App::getLocale() }}"><img src="/images/swan-logoh.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-sm-7 col-md-offset-1">
                            <div class="header_top_left">
                                <ul>

                                    <li><span class="fa fa-phone"></span>{{ $settings->phone }}</li>
                                    <li><span class="fa fa-envelope"></span>{{ $settings->email }}</li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-12">
                            <div class="dropdown header_top_right">
                                @if (Auth::check())
                                @role(['admin','superadmin','employee'])
                                <a id="dLabel" data-target="#" href="{{ url('/admin/dashboard') }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-tachometer"></i>
                                    @lang('front.dashboard')
                                    <span class="caret"></span>
                                </a>

                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li><a href="/admin/dashboard"><i class="fa fa-eye" aria-hidden="true"></i>
                                 @lang('front.adminpanel')</a>  
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="list-group-item" style="border: 0px; border-radius: 0; background: red; color: #fff">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> @lang('front.logout')
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                </li>
                              </ul>

                                @endrole
                                @role(['client'])
     
                                <a id="dLabel" data-target="#" href="/{{ App::getLocale() }}/panel" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-tachometer"></i>
                                    @lang('front.dashboard')
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li><a href="/{{ App::getLocale() }}/panel"><i class="fa fa-eye" aria-hidden="true"></i>
                                 @lang('front.clientpanel')</a>  
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="list-group-item" style="border: 0px; border-radius: 0; background: red; color: #fff">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> @lang('front.logout')
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                </li>
                              </ul>
                              
                                @endrole
                              @else
            <a href="/{{ App::getLocale() }}/login"><i class="fa fa-user"></i>&nbsp @lang('front.login')</a> | 
            <!--<a href=""><i class="fa fa-user"></i>&nbsp Login</a> | -->
            <a href="/{{ App::getLocale() }}/register">@lang('front.register')</a>
                            @endif
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom_area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mainmenu">
                                <nav>
                                    <ul>
                                        <li {{ (Request::is(App::getLocale().'/') ? 'class=active' : '') }}><a href="{{ env('APP_URL') }}/{{App::getLocale()}}">@lang('front.home')</a></li>
                                        <li {{ (Request::is(App::getLocale().'/about') ? 'class=active' : '') }}><a href="/{{App::getLocale()}}/about">@lang('front.about')</a></li>
                                        <li {{ (Request::is(App::getLocale().'/services') ? 'class=active' : '') }}><a href="/{{App::getLocale()}}/services">@lang('front.services')</a></li>
                                        <li {{ (Request::is(App::getLocale().'/contact') ? 'class=active' : '') }}><a href="/{{App::getLocale()}}/contact">@lang('front.contact')</a></li>

                                    @foreach (Config::get('app.languages') as $lang => $name)
                                        @if ($lang == App::getLocale())
                                            <li style="float:right;padding-right: 18px;margin-top: 14px;"><span lang="{{ $lang }}" style="color: #888;margin-left: 10%;">{{ $name }}</span></li>
                                        @else
                                            <?php
                                                $url = URL::to($lang);
                                                $url = str_replace(App::getLocale(), $lang, env('APP_URL').'/'.$lang.'/'.Request::segment(2).'/'.Request::segment(3).'/'.Request::segment(4));
                                            ?>
                                            <li style="float:right;"><a lang="{{ $lang }}" href="{{ $url }}">{{ $name }}</a></li>
                                        @endif
                                    @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>