@extends('app')
@section('content')
    @include('layouts.errors')
    {!! Form::open(['method' => 'post', 'url' => '/user/']) !!}
    {!! Form::hidden('device_token', null) !!}
    {!! Form::label('name', 'User name:') !!}
    {!! Form::text('name', null, ['id' => 'name']) !!}<br>
    {!! Form::label('email', 'User email:') !!}
    {!! Form::text('email', null, ['id' => 'email']) !!}<br>
    {!! Form::label('password', 'User password:') !!}
    {!! Form::password('password') !!}<br>
    {!! Form::label('admin', 'Admin: ') !!}
    {!! Form::select('is_admin', ['No', 'Yes']) !!}<br>
    {!! Form::submit('Create new user') !!}
    {!! Form::close() !!}
@endsection