@extends('app')
@section('content')
    <h3>User info:</h3>
    <p>{{ $user->name }}</p>
    <p>{{ $user->email }}</p>
@endsection