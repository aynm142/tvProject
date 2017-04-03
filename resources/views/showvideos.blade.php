@extends('app')
@section('content')
    @foreach($videos as $key => $video)
        <video width="320" height="240" controls>
            <source src="{{ $video->video_url }}" type="video/mp4">
        </video>
        {!! Form::Open(['method' => 'DELETE', 'url' => '/video/' . $video->id]) !!}
            {!! Form::submit('Delete') !!}
        {!! Form::close() !!}
    @endforeach
@endsection