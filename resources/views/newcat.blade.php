@extends('app')

@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="page-header">
	        	<i class="fa fa-plus"></i> Add new category
	        </h3>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>

	@include('layouts.errors', ['submitButton' => 'Add new category'])

	<div class="row">
		<div class="col-lg-12">
			<form method="POST" action="http://test1.a2-lab.com/category" accept-charset="UTF-8">
				{!! csrf_field() !!}
				<input name="user_id" type="hidden" value="1">

				<div class="form-group input-group">
                    <input name="category_name" type="text" placeholder="Category name" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                        	<i class="fa fa-plus"></i> Add new
                        </button>
                    </span>
                </div>
			</form>
		</div>
	</div>

@endsection
