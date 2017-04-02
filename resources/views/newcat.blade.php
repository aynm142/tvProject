@extends('app')

@section('content')
    <form method="POST" action="http://test1.a2-lab.com/category" accept-charset="UTF-8">
        {!! csrf_field() !!}
        <input name="user_id" type="hidden" value="1">
        <label for="category_name">Category name: </label>
        <input name="category_name" type="text" id="category_name"><br>
        <input type="submit" value="Add new category">
    </form>

    @include('layouts.errors', ['submitButton' => 'Add new category'])
@stop
