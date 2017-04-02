@if ($errors->any())
	<div class="row">
		<div class="col-lg-12">
			@foreach ($errors->all() as $error)
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					{{ $error }}
				</div>

			@endforeach
		</div>
	</div>
@endif