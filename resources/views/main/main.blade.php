<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $site_name }}</title>
	
	<link rel="stylesheet" href="{{ asset('/frontend/vendor/bootstrap/dist/css/bootstrap.css') }}">
	@stack('styles')
	
	<link rel="stylesheet" href="{{ asset('/frontend/css/app.css') }}">
</head>
<body>
	@include('main.partials.header')


	<div id="wrapper">
		@include('main.partials.sidebar')
		<div id="main-wrapper" class="container-fluid" style="background-image: url('{{ $main_bg  }}')">
			<div id="main">
				@yield('content')
			</div>          
		</div>
	</div>

	<script src="{{ asset('/frontend/vendor/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('/frontend/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	
	<script src="{{ asset('/frontend/vendor/jquery-mousewheel/jquery.mousewheel.min.js') }}"></script>
	<script src="{{ asset('/frontend/vendor/jquery-touchswipe/jquery.touchSwipe.min.js') }}"></script>
	@stack('scripts')
	<script src="{{ asset('/frontend/js/app.min.js') }}"></script>
</body>
</html>