@extends('app')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">
	        	<i class="fa fa-video-camera"></i> Videos
	        	<a href="{{ route('video.create') }}" class="btn btn-success btn-sm m-l-20">
	        		<i class="fa fa-plus"></i> Add new video
	        	</a>
	        </h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	
	<div class="row video__album">
		@foreach( $videos as $video )
			<div class="col-xs-12 col-sm-6 col-md-4 video">
				<article>
					<header>
						<a href="{{ URL::to('/video/' . $video->id . '/edit') }}">
							<img class="img-responsive" src="{{ $video->logo_url }}" alt="video logo">
						</a>
					</header>
					<section class="video__info ov-h">
						<h4 class="text-ellipsis">{{ $video->video_name }}</h4>
						<p class="text-ellipsis">{{ $video->description }}</p>
					</section>
					<footer class="clearfix">
						<div class="pull-right footer__buttons">
							<a href="{{ URL::to('/video/' . $video->id . '/edit') }}" class="btn btn-link video-btn__delimetr--right">
								<i class="fa fa-pencil"></i>
							</a>
							
							{!! Form::Open(['method' => 'DELETE', 'url' => '/video/' . $video->id]) !!}
					            <button type="submit" class="btn btn-link">
									<i class="fa fa-trash"></i>
								</button>
					        {!! Form::close() !!}
						</div>
					</footer>
				</article>
			</div>
		@endforeach
	</div>

@endsection