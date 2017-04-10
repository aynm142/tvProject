<div class="form-group">
    <p class="help-block">{{ $help_block or "" }}</p>
    <!-- file-custom-input-filename input -->
	<div class="input-group file-custom-input">
		<input type="text" class="form-control file-custom-input-filename" value="{{ $default_value or "" }}" disabled="disabled">
		@if ( isset($disabled_name) && $disabled_name )
			<input class="disabled_name" type="hidden" name="{{ $disabled_name }}" value="{{ $default_value or "" }}">
		@endif
		<span class="input-group-btn">
			<!-- file-input-clear button -->
			<button type="button" class="btn btn-default file-custom-input-clear" style="display:none;">
				<span class="glyphicon glyphicon-remove"></span> Clear
			</button>
			<!-- file-custom-input -->
			<div class="btn btn-default file-custom-input">
				<span class="glyphicon glyphicon-folder-open"></span>
				<span class="file-custom-input-title">Browse</span>
				<input type="file"@if(isset($is_required) && $is_required) required="required"@endif name="{{ $name or "" }}"/>
			</div>

			<!-- remove element button -->
			<button type="button" class="btn btn-danger file-custom-input-remove"@if(!isset($is_remove) || !$is_remove) style="display: none;"@endif>
				<span class="glyphicon glyphicon-remove"></span> Remove
			</button>
		</span>
	</div><!-- /input-group file-custom-input -->
</div>

@if (isset($multiply) && $multiply)
	<div class="form-group">
	    <button class="btn btn-primary add_new_file-custom-input" type="button">
	        <i class="fa fa-plus"></i> one file
	    </button>
	</div>
@endif

@if ( !isset($widgets_file_input_is_included) )
	<?php View::share('widgets_file_input_is_included', true); ?>

	@push('scripts')
	<script type="text/javascript">
		$(function() {
			function BindCustomEvent($self) {
				// Clear event
				$self.find('.file-custom-input-clear').click(function(){
					$self.attr("data-content","").popover('hide');
					$self.find('.file-custom-input-filename').val("");
					$self.find('.file-custom-input-clear').hide();
					$self.find('.file-custom-input input:file').val("");
					$self.find(".file-custom-input-title").text("Browse"); 

					$self.find("input[type=hidden].disabled_name").remove();
				});
				// Remove event
				$self.find('.file-custom-input-remove').click(function() {
					$(this).parents('.file-custom-input').parents('.form-group').remove();
				});
				// Create the preview
				$self.find(".file-custom-input input:file").change(function (){
					var file = this.files[0];

					$self.find(".disabled_name").remove("");
					
					$self.find(".file-custom-input-title").text("Change");
					$self.find(".file-custom-input-clear").show();
					$self.find(".file-custom-input-filename").val(file.name);  
				});
			}

			$('.file-custom-input').each(function() {
				BindCustomEvent($(this));				
			});

			$(".file-custom-input .file-custom-input-filename[value]:not([value='']").each(function() {
				var $self = $(this).parents('.file-custom-input');
				var name = $(this).val();

				$self.find(".file-custom-input-title").text("Change");
				$self.find(".file-custom-input-clear").show();
				$self.find(".file-custom-input-filename").val(name);            
			});

			$(document).on('click', '.add_new_file-custom-input',function(e) {
	            e.preventDefault();
	            var clone = $(e.target).parents('.form-group').prev('.form-group').clone();
	            // remove help-block
	            clone.find('.help-block').remove();
	            BindCustomEvent(clone);
	            
	            // clear input
	            clone.find('.file-custom-input-clear').trigger("click");
	            // show remove btn
	            clone.find('.file-custom-input-remove').show();

	            clone.insertBefore($(e.target).parents('.form-group'));

	        });
		});
	</script>
	@endpush
@endif

