@extends('app')

@section('content')
    {!! Form::open(array('url' => '/video', 'files' => true)) !!}
    {!! Form::label('video name', 'Video name: ') !!}
    {!! Form::text('video_name') !!}<br>
    {!! Form::label('description', 'Description: ') !!}<br>
    {!! Form::textarea('description') !!}}<br>
    {{ Form::select('category', $categories_list) }}
    {!! Form::label('logo_url', 'Logo image') !!}
    <input type="file" name="logo_url" id="logo_url">
    {!! Form::label('background_url', 'Background image') !!}
    <input type="file" name="background_url" id="background_url">
    {!! Form::label('video_url', 'Video: ') !!}
    <input type="file" name="video_url" id="background_url"><br>
    {!! Form::submit('Add new video') !!}
    {!! Form::close() !!}

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@stop
