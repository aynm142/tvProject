@extends('app')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">All Categories</h1>
	    </div>
	    <!-- /.col-lg-12 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
	        <div class="panel panel-default panel-categories">
	            <div class="panel-heading">
	                Manage the categories below:
	            </div>
	            <!-- .panel-heading -->
	            <div class="panel-body">
	                <ul class="list-group">
	                	@foreach($categories as $key => $category)
	                		<li class="list-group-item">
						        {{ $category->category_name }}

						        <div class="action-buttons">
						            <a class="btn btn-sm btn-default pull-left m-r-5" href="{{ URL::to('/category/' . $category->id . '/edit') }}">Edit</a>
									<form class="pull-left" action="{{ 'category/' . $category->id }}" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="DELETE">
										<button type="submit" class="btn btn-sm btn-danger">Delete</button>
									</form>
						        </div>
						    </li>
					    @endforeach
					</ul>
	            </div>
	            <!-- .panel-body -->
	        </div>
	        <!-- /.panel -->
	    </div>
	</div>

@endsection