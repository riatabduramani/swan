<div class="list-group" style="font-size: 1.2em;">
	<a href="/panel" class="list-group-item {{{ (Request::is('panel') ? 'active' : '') }}}" ><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
	<a href="/panel/invoices" class="list-group-item {{{ (Request::is('panel/invoices*') ? 'active' : '') }}}"><i class="fa fa-list" aria-hidden="true"></i> Invoices</a>
	<a href="/panel/profile" class="list-group-item {{{ (Request::is('panel/profile') ? 'active' : '') }}}"><i class="fa fa-user" aria-hidden="true"></i> My profile</a>
	 <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="list-group-item" style="background: red; color: #fff">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
</div>