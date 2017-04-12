@extends('app')
@section('content')
    @include('layouts.errors')
    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
    {!! Form::label('name', 'User name:') !!}
    {!! Form::text('name', null, ['id' => 'name']) !!}
    {!! Form::label('email', 'User email:') !!}
    {!! Form::text('email', null, ['id' => 'email']) !!}
    {!! Form::label('password', 'User password:') !!}
    {!! Form::password('password', null) !!}
    {{ Form::submit('Save') }}
    {{ Form::close() }}
@endsection