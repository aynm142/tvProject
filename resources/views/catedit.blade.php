@extends('app')

@section('content')
    <h1>Edit {{ $category->category_name }}</h1>
    <form method="POST" action="http://test1.a2-lab.com/category/{{ $category->id }}" accept-charset="UTF-8">
        <input name="_method" type="hidden" value="PATCH">
        {!! csrf_field() !!}
        <input name="user_id" type="hidden" value="1">
        <label for="category_name">Category name: </label>
        <input name="category_name" type="text" id="category_name" value="{{ $category->category_name }}"><br>
        <input type="submit" value="Edit category">
    </form>

    @include('layouts.errors')
@endsection