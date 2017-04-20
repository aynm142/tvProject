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
	            <li class="dropdown">
	                <a href="#" class="dropdown-toggle user clearfix" data-toggle="dropdown">
	                    <span class="pull-left user__name">Skifcha <b class="caret"></b></span>
	                    <span class="pull-right user__photo">
	                        <img src="https://www.gravatar.com/avatar/205e460b479e2e5bs48aec07710c08d50?d=retro" alt="user_name" class="img-responsive img-circle">
	                    </span>
	                </a>
	                <ul class="dropdown-menu">
	                    <li><a href="#">View profile</a></li>
	                    <li><a href="#">Billing</a></li>
	                    <li><a href="#">Subscribers</a></li>
	                    <li><a href="#">Settings</a></li>
	                    <li><a href="#">Log Out</a></li>
	                </ul>
	            </li>
	        </ul>
	    </nav>
	</div>