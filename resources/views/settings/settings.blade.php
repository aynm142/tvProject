@extends('app')

@section('content')
    {!! Form::model($data, ['method' => 'PATCH', 'files' => true, 'action' => ['SettingsController@update', $data]]) !!}
    {!! Form::label('site_name', 'Site name:') !!}
    {!! Form::text('site_name', null) !!}<br>
    {!! Form::label('site_name', 'Logo image:') !!}
    {!! Form::text('logo_image', null) !!}<br>
    {!! Form::label('background_image', 'Background image:') !!}
    {!! Form::text('background_image', null) !!}<br>
    {!! Form::label('banner', 'Banner on\off') !!}
    {!! Form::select('banner', ['No', 'Yes'], null, ['required' => 'required']) !!}
    {!! Form::submit() !!}
    {!! Form::close() !!}
@endsection