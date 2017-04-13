@extends('app')
@section('content')
	<div class="row">
		<div class="col-xs-12">
	        <h3 class="page-header">
	        	<i class="fa fa-plus"></i> Add new user
	        </h3>
	    </div>
	</div>
	
	@include('layouts.errors')

	<div class="row">
		<div class="col-xs-12">
			{!! Form::open(['method' => 'post', 'url' => '/user/']) !!}
				<div class="form-group">
					{!! Form::label('name', 'User name') !!}
					{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'user name']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('email', 'Email address') !!}
					{!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'user email']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'User password') !!}
					{!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'minimum 6 characters']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('is_admin', 'Grant administrator rights?') !!}
					{!! Form::select('is_admin', ['No', 'Yes'], null, ['class' => 'form-control', 'required' => 'required']) !!}
				</div>

				<button type="submit" class="btn btn-default">Add new</button>
			{!! Form::close() !!}
		</div>
	</div>	
@endsection