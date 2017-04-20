@extends('main.main')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div id="carousel-header" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-header" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-header" data-slide-to="1"></li>
					<li data-target="#carousel-header" data-slide-to="2"></li>
					<li data-target="#carousel-header" data-slide-to="3"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="https://unsplash.it/1200/300/?random">
					</div>
					<div class="item">
						<img src="https://unsplash.it/1200/300/?random">
					</div>
					<div class="item">
						<img src="https://unsplash.it/1200/300/?random">
					</div>
					<div class="item">
						<img src="https://unsplash.it/1200/300/?random">
					</div>
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-header" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-header" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
				</a>
			</div>
		</div>

		@foreach ($categories as $category)
			<div data-genre="{{ $category->id }}" class="category__slider col-xs-12 m-t-20">
				<div class="category__slider-title row">
					<div class="col-xs-12">
						<h3>
							<a href="#" onclick="alert('Here will be link');return false;">{{ $category->category_name }}</a>
						</h3>
					</div>
				</div>
				<div class="category__slider-video">
					<div class="row">
						@php
							$films = App\Video::where('category_id', $category->id)
								->orderBy('created_at')
								->take(25)
								->get();
						@endphp

						@foreach ($films as $film)
							<div class="video__item col-xs-4 col-sm-4 col-md-3 col-lg-1">
								<a href="{{ route('video-page', ['id' => $film->id, 'name' => $film->getSlug()]) }}" class="col-item">
									<div class="photo">
										<img src="{{ $film->logo_url or 'http://placehold.it/320x260.png' }}" class="img-responsive" alt="a" />
									</div>
									<div class="info">
										<h5>{{ $film->video_name }}</h5>
									</div>
								</a>
							</div>
						@endforeach
						
					</div>
				</div>
			</div>
		@endforeach

	</div>
@endsection