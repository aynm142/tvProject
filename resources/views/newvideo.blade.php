@extends('app')

@section('content')
    <form method="POST" action="http://localhost/tvProject/public/video" accept-charset="UTF-8"
          enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label for="video_name">Video name: </label>
        <input name="video_name" type="text" id="video_name"><br>
        <label for="description">Description: </label><br>
        <textarea name="description" id="description">Enter description here...</textarea><br><br>
        <label for="logo_url">Logo image: </label>
        <input type="file" name="logo_url" id="logo_url"><br>
        <label for="background_url">Background image: </label>
        <input type="file" name="background_url" id="background_url"><br>
        <label for="video_url">Video: </label>
        <input type="file" name="video_url" id="background_url"><br>
        <label for="category">Select category: </label>
        <select name="category" id="category">
            @foreach ($categories_list as $category_id => $category_name)
                <option value="{{ $category_id }}">{{ $category_name }}</option>
            @endforeach
        </select><br><br>
        <input type="submit" value="Add new video">
    </form>

    @include('layouts.errors')
@stop
