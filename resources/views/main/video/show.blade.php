@extends('main.main')

@push('styles')
	<link rel="stylesheet" href="{{ asset('/frontend/vendor/video-js-5.19.2/video-js.css') }}">
@endpush

@push('scripts')
	<script src="{{ asset('/frontend/vendor/video-js-5.19.2/video.min.js') }}"></script>
@endpush

@section('content')

<div class="row film">
	<div class="col-xs-12 film__info">
        <div class="row">
            <div class="col-md-6">
                <img class="film-img-show" src="{{ $video->logo_url }}">
            </div>
            <div class="col-md-6">
                <div class="film-row film-header">
                    <h2>{{ $video->video_name }}</h2>
                    <div class="film-header-seperator"></div>
                </div>
                <div class="film-row film-desc">
                    {{ $video->description }}
                </div>
            </div>
        </div>
    </div>

    <div class="p-0 m-t-20">
    	<video id="my_video_1" class="video-js vjs-fluid vsg-player" 
		      controls preload="none" width="640" height="360" data-setup='{"techOrder": ["html5", "flash", "youtube"]}'
		      poster='{{ $video->logo_url }}'>
			
			@foreach ($video->getVideoUrl() as $link)
				<source src="{{ $link }}" type='video/mp4' />
			@endforeach

		    <p class="vjs-no-js">
		    	<noindex>
		    		To view this video please enable JavaScript, and consider upgrading to a web browser that
		      		<a rel="noffollow" href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
		    	</noindex>
		    </p>
		</video>
    </div>
</div>

@endsection