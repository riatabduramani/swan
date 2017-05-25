<div class="list-group" style="font-size: 1.2em;">
	<a href="/{{ App::getLocale() }}/panel" class="list-group-item {{{ (Request::is( App::getLocale().'/panel') ? 'active' : '') }}}" ><i class="fa fa-tachometer" aria-hidden="true"></i> @lang('front.paneldashboard')</a>
	<a href="/{{ App::getLocale() }}/panel/invoices" class="list-group-item {{{ (Request::is(App::getLocale().'/panel/invoices*') ? 'active' : '') }}}"><i class="fa fa-list" aria-hidden="true"></i> @lang('front.invoices')</a>
	<a href="/{{ App::getLocale() }}/panel/profile" class="list-group-item {{{ (Request::is(App::getLocale().'/panel/profile') ? 'active' : '') }}}"><i class="fa fa-user" aria-hidden="true"></i> @lang('front.myprofile')</a>

<a href="/{{ App::getLocale() }}/panel/password" class="list-group-item {{{ (Request::is(App::getLocale().'/panel/password') ? 'active' : '') }}}" ><i class="fa fa-key" aria-hidden="true"></i> @lang('front.changepassword')</a>

	 <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="list-group-item" style="background: red; color: #fff">
    <i class="fa fa-sign-out" aria-hidden="true"></i> @lang('front.logout')
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
</div>