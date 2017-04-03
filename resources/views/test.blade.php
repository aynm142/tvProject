@extends('app')

@section('content')
    {!! Form::open(array('url' => '/newvideo', 'files' => true)) !!}
    {{ Form::select('category', $categories_list) }}
    {!! Form::close() !!}
@stop