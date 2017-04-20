<div id="header" class="navbar navbar-default navbar-fixed-top">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header__collapse" aria-expanded="false" aria-controls="navbar">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	        </button>
	
	        <a class="navbar__logo clearfix" href="/">
	            <img src="{{ asset('/frontend/img/logo.png') }}" alt="VIS TV Logo">
	            <span class="navbar__logo-name">VIS TV</span>
	        </a>
	    </div>
	    <nav class="collapse navbar-collapse" id="header__collapse">
	        <ul class="nav navbar-nav navbar-right">
	            <li class="visible-xs" style="padding: 10px 5px;">
	                <a data-toggle="show-aside-menu" href="#">Show menu</a>
	            </li>
				
				@if ( !Auth::user() )
					<li>
						<a href="{{ url('/login') }}">Sign in</a>
					</li>
					<li>
						<a href="{{ url('/register') }}">Sign up</a>
					</li>
				@else
				    <li class="dropdown">
		                <a href="#" class="dropdown-toggle user clearfix" data-toggle="dropdown">
		                    <span class="pull-left user__name">{{ Auth::user()->name }} <b class="caret"></b></span>
		                    <span class="pull-right user__photo">
		                        <img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?d=retro" alt="user_name" class="img-responsive img-circle">
		                    </span>
		                </a>
		                <ul class="dropdown-menu">
		                	@if ( intval(Auth::user()->is_admin) === 1 )
		                    	<li><a target="blank" href="{{ url('/dashboard') }}">Dashboard</a></li>
		                	@endif
		                    <li><a href="#">View profile</a></li>
		                    <li><a href="#">Billing</a></li>
		                    <li><a href="#">Subscribers</a></li>
		                    <li><a href="#">Settings</a></li>
		                    <li><a href="{{ url('logout') }}">Log Out</a></li>
		                </ul>
		            </li>
				@endif
	            

	        </ul>
	    </nav>
	</div>