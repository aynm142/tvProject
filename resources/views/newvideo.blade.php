@extends('app')

@section('content')
    {!! Form::open(array('url' => '/newvideo', 'files' => true)) !!}
    {!! Form::label('video name', 'Category name: ') !!}
    {!! Form::text('video_name') !!}<br>
    {!! Form::label('description', 'Description: ') !!}<br>
    {!! Form::textarea('description') !!}}<br>
    {!! Form::label('logo_url', 'Logo image') !!}
    <input type="file" name="logo_url" id="logo_url"><br>
    {!! Form::label('background_url', 'Background image') !!}
    <input type="file" name="background_url" id="background_url">
    <br>
    {!! Form::submit('Add new category') !!}
    {!! Form::close() !!}

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@stop
