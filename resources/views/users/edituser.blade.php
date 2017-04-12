@extends('app')
@section('content')
    @include('layouts.errors')
    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
    {!! Form::label('name', 'User name:') !!}
    {!! Form::text('name', null, ['id' => 'name']) !!}<br>
    {!! Form::label('email', 'User email:') !!}
    {!! Form::text('email', null, ['id' => 'email']) !!}<br>
    {!! Form::label('password', 'User password: ((leave empty to keep your original password) [[[ Create a new help field for this :D ]]]') !!}
    {!! Form::password('password') !!}<br>
    {!! Form::label('admin', 'Admin: ') !!}
    {!! Form::select('is_admin', ['No', 'Yes']) !!}<br>
    {{ Form::submit('Save') }}
    {{ Form::close() }}
@endsection