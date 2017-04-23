@extends('app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">
				<i class="fa fa-ticket"></i> Add new promo code
			</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>

	@include('layouts.errors')

	<div class="row">
		<div class="col-md-offset-1 col-md-8 col-sm-12 col-xs-12">
			<form id="add-promo-code" class="form-horizontal" action="{{ route('promo.post.add') }}" method="POST">
				{{ csrf_field() }}
				
				<input type="hidden" name="__generate_random" value="">
				<div class="form-group">
					<label class="control-label col-sm-3" for="code">
						Promo code
						<span>*</span>
					</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-btn">
								<button id="generate_code" data-href="{{ route('promo.generate.code') }}" class="btn btn-default" type="button" title="generate random code" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Generate random promo code">
									<i class="fa fa-question-circle-o"></i>
								</button>
							</span>
							<input type="text" id="code" name="code" class="form-control" placeholder="Enter here new promo code">
						</div>
					</div>
				</div>
				<div class="form-group ">
					<label class="control-label col-sm-3" for="delete_time">
						Expiration Date
						<span>*</span>
					</label>
					<div class="col-sm-9">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input class="form-control" id="delete_time" name="delete_time" placeholder="YYYY/MM/DD" type="text"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12 text-right">
						<button id="generate_random" type="button" class="btn btn-default">Generate random</button>
						<button class="btn btn-primary" type="submit">
							Submit
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/admin/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('/admin/vendor/moment/min/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<script type="text/javascript">
	$(function () {
		$('#delete_time').datetimepicker({
			locale: 'en-gb'
		});

		$('#generate_code').click(function(event) {
			event.preventDefault();
			var url = $(this).data('href');
			var $this = $(this);

			var errorCb = function() {
				bootbox.alert('Whoops... some problem..');
			};

			if (!url) {
				alert('URL not found');
				return;
			}

			$this.button('loading');

			$.ajax({
				url: url,
				method: 'GET',
				dataType: 'json'
			}).then(function(data) {
				if (data.code) {
					$('input[name="code"]').val(data.code);
				} else {
					errorCb();
				}
				$this.button('reset');
			}).catch(errorCb);
		});

		var $form = $('#add-promo-code');

		$('#generate_random').click(function(e) {
			e.preventDefault();

			bootbox.prompt('How many promo codes are needed?', function(answer) {
				if (!answer) return;

				answer = parseInt(answer);
				if (isNaN(answer)) {
					bootbox.alert('You must enter a number!');
					return;
				}

				if (answer <= 0) {
					bootbox.alert('This should be a positive value!');
					return;
				}

				$('input[name="__generate_random"]').val(answer);
				$form.submit();
			});
		});
	});
</script>
@endpush