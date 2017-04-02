@extends('app')
@section('content')
    @foreach($categories as $key => $category)
        <h4>{{ $category->category_name }}</h4>
        <a href="{{ URL::to('/category/' . $category->id . '/edit') }}">Edit</a>
        {{ Form::open(array('url' => 'category/' . $category->id)) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete') }}
        {{ Form::close() }}
    @endforeach

@stop