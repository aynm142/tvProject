@extends('app')
@section('content')
    @foreach($categories as $category)
        <h3>{{ $category }}</h3>
    @endforeach
@stop