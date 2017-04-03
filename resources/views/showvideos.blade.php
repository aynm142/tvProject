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
		@foreach([1,2,3,4,5,6] as $v)
			<div class="col-xs-12 col-sm-6 col-md-4 video">
				<article>
					<header>
						<a href="#link_to_video_on_main_page" target="_blank">
							<img class="img-responsive" src="http://app.hellovideoapp.com/content/uploads/images/February2015/how-to-make-a-surf-video.jpg" alt="video image">
						</a>
					</header>
					<section class="video__info">
						<h4>Video title</h4>
						<p>Short desc</p>
					</section>
					<footer>links</footer>
				</article>
			</div>
		@endforeach
	</div>


    <div class="row">
    	@foreach($videos as $key => $video)
	        <video width="320" height="240" controls>
	            <source src="{{ $video->video_url }}" type="video/mp4">
	        </video>
	        {!! Form::Open(['method' => 'DELETE', 'url' => '/video/' . $video->id]) !!}
	            {!! Form::submit('Delete') !!}
	        {!! Form::close() !!}
	    @endforeach
    </div>
@endsection