

<footer class="romana_footer">
            <div class="footer_top_area footer_top clearfix">
                <div id="scrollTop">
                    <a href="#" class="hvr-icon-bob"></a>
                </div>
                <div class="container">
                    <div class="row ">
                        <div class="col-sm-3 col-xs-12">
                            <div class="widget widget_text">
                                <div class="footer_logo">
                                    <a href="{{ env('APP_URL') }}/{{App::getLocale()}}"><img src="/images/swan-logohw.png" alt="footer logo"></a>
                                </div>
                                <p>{{ $settings->company_shortdescription }}</p>
                                <div class="footer_social_icon">

                        <a href="{{ $settings->facebook }}"><i class="icofont icofont-social-facebook" style="font-size: 30px;"></i></a>
                        <a href="{{ $settings->youtube }}"><i class="icofont icofont-social-youtube" style="font-size: 30px;"></i></a>
                        <a href="{{ $settings->twitter }}"><i class="icofont icofont-social-twitter" style="font-size: 30px;"></i></a>
                        <a href="{{ $settings->instagram }}"><i class="icofont icofont-social-instagram" style="font-size: 30px;"></i></a>
                        <a href="{{ $settings->linkedin }}"><i class="icofont icofont-brand-linkedin" style="font-size: 30px;"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-6" style="padding-left: 7%;">
                            <div class="widget footer_top_menu">
                                <h2>Menu</h2>
                                <ul>
                                    <li><a href="/{{App::getLocale()}}/">@lang('front.home')</a></li>
                                    <li><a href="/{{App::getLocale()}}/about">@lang('front.about')</a></li>
                                    <li><a href="/{{App::getLocale()}}/services">@lang('front.services')</a></li>
                                    <li><a href="/{{App::getLocale()}}/contact">@lang('front.contact')</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-1 col-sm-3 col-xs-6">
                            <div class="widget footer_top_menu margin_top_tablet">
                                <h2>@lang('front.packages')</h2>
                                <ul>
                                    @foreach($packets as $packet)
                                        <li><a href="">{{ $packet->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1 col-sm-4 col-xs-12">
                            <div class="widget footer_top_menu margin_top_tablet single_footer">
                                <ul class="address">
                                    <li><span class="fa fa-map-marker"></span>
                                        {!! $settings->address !!}
                                    </li>
                                    <li> <span class="fa fa-envelope"></span><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></li>
                                    <li><span class="fa fa-phone"></span><a href="tel: {{ $settings->phone }} ">{{ $settings->phone }}</a></li>
                                </ul>
                                <div class="subscrib">
                                    <h3>@lang('front.subscribe')</h3>
                                    <input type="text" name="email" placeholder="E-mail">
                                    <input type="submit" name="submit" value="@lang('front.send')">
                                    <p>@lang('front.dontshareinfo')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer_bottom_area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-xs-12">
                            <div class="footer_bottom footer_top text-left">
                                <p><span>{{ $settings->company_name }} &copy; <?php echo date("Y"); ?> | @lang('front.copyright')</span></p>
                            </div>
                        </div>
                        <!--<div class="col-sm-4 col-xs-12">
                            <div class="footer_bottom footer_bottom_text text-right">
                                <p><a href="#">Private Policy</a> | <a href="#">Terms & Conditions</a></p>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=38804934"></script>
        <script src="{{ asset('js/front/hometabs.js') }}"></script>
        