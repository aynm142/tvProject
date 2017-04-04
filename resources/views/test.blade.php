@extends('app')

@section('content')
    {!! Form::open(array('url' => '/login/api', 'files' => true)) !!}
    {{ Form::input('login', 'name') }}
    {{ Form::submit('Save') }}
    {!! Form::close() !!}
@stop