<!-- image-preview-filename input -->
<div class="input-group image-preview">
	<input type="text" class="form-control image-preview-filename" value="{{ $default_value or "" }}" disabled="disabled">
	<span class="input-group-btn">
		<!-- image-preview-clear button -->
		<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
			<span class="glyphicon glyphicon-remove"></span> Clear
		</button>
		<!-- image-preview-input -->
		<div class="btn btn-default image-preview-input">
			<span class="glyphicon glyphicon-folder-open"></span>
			<span class="image-preview-input-title">Browse</span>
			<input type="file" required="required" accept="image/jpeg, image/bmp, image/png, image/jpg" name="{{ $name or "" }}"/>
		</div>
	</span>
</div><!-- /input-group image-preview --> 

@if ( !isset($widgets_file_input_preview_is_included) )
	<?php View::share('widgets_file_input_preview_is_included', true); ?>

	@push('scripts')
	<script type="text/javascript">
		$(function() {
			$('.image-preview').each(function() {
				var $self = $(this);
				// Create the close button
				var closebtn = $('<button/>', {
					type:"button",
					text: 'x',
					style: 'font-size: initial;',
				});
				closebtn.attr("class","close-preview close pull-right");
				// Set the popover default content
				$self.popover({
					trigger:'manual',
					html:true,
					title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
					content: "There's no image",
					placement:'bottom'
				});
				// Clear event
				$self.find('.image-preview-clear').click(function(){
					$self.attr("data-content","").popover('hide');
					$self.find('.image-preview-filename').val("");
					$self.find('.image-preview-clear').hide();
					$self.find('.image-preview-input input:file').val("");
					$self.find(".image-preview-input-title").text("Browse"); 
				}); 
				// Create the preview image
				$self.find(".image-preview-input input:file").change(function (){
					var img = $('<img/>', {
						id: 'dynamic',
						width:250,
						height:200
					});      
					var file = this.files[0];
					var reader = new FileReader();
					// Set preview image into the popover data-content
					reader.onload = function (e) {
						$self.find(".image-preview-input-title").text("Change");
						$self.find(".image-preview-clear").show();
						$self.find(".image-preview-filename").val(file.name);            
						img.attr('src', e.target.result);
						$self.attr("data-content",$(img)[0].outerHTML).popover("show");
					}        
					reader.readAsDataURL(file);
				});
			});

			$(document).on('click', '.close-preview', function(){ 
				var $img_preview = $(this).parents('.form-group').find('.image-preview');

				$img_preview.popover('hide');
				// Hover befor close the preview
				$img_preview.hover(
					function () {
					   $img_preview.popover('show');
					}, 
					 function () {
					   $img_preview.popover('hide');
					}
				);    
			});
			
			$(".image-preview .image-preview-filename[value]:not([value='']").each(function() {
				var img = $('<img/>', {
					id: 'dynamic',
					width:250,
					height:200
				});

				var $self = $(this).parents('.image-preview');

				var name = $(this).val();

				$self.find(".image-preview-input-title").text("Change");
				$self.find(".image-preview-clear").show();
				$self.find(".image-preview-filename").val(name);            
				img.attr('src', name);
				$self.attr("data-content",$(img)[0].outerHTML).popover("hide");

				$self.hover(
					function () {
					   $self.popover('show');
					}, 
					 function () {
					   $self.popover('hide');
					}
				);
			});
		});
	</script>
	@endpush
@endif

