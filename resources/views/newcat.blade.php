@extends('app')

@section('content')
    {!! Form::open(['url' => '/category']) !!}
    {!! Form::hidden('user_id', 1) !!}
    {!! Form::label('category_name', 'Category name: ') !!}
    {!! Form::text('category_name') !!}
    <br>
    {!! Form::submit('Add new category') !!}
    {!! Form::close() !!}

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@stop
