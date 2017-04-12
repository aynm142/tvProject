@extends('app')
@section('content')
    @foreach($users as $user)
        <p>{{ $user->name }}</p>
        <p>{{ $user->email }}</p>
        <p>{{ $user->is_admin }}</p>
        {!! Form::Open(['method' => 'DELETE', 'url' => '/user/' . $user->id]) !!}
        <button type="submit" class="btn btn-link">
            <i class="fa fa-trash"></i>
        </button>
        {!! Form::close() !!}
    @endforeach
@endsection