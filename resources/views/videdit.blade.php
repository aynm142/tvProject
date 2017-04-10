@extends('app')

@push('scripts')
<script type="text/javascript">
    ;(function ($) {
        $('#add_new_field').click(function (e) {
            e.preventDefault();
            console.log($(e.target).parents('.form-group'));
            var form_group = $('<div class="form-group input-group"><input required="required" type="file" class="form-control" name="video_url[]"><span class="input-group-btn"><button class="btn btn-danger remove-input" type="button"><i class="fa fa-remove"></i></button></span></div>');
            form_group.insertBefore($(e.target).parents('.form-group'));
        });
        $(document).on('click', '.remove-input', function () {
            $(this).parents('.input-group').remove();
        });
    })(jQuery);
</script>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <i class="fa fa-cloud-upload"></i> Add new video
            </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.errors')

    <div class="row">
        {!! Form::model($video, ['method' => 'PATCH', 'action' => ['VideoController@update', $video->id]]) !!}
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Video title
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <p class="help-block">Add the video title in the textbox below:</p>
                                {!! Form::text('video_name', null, ['required' => 'required',
                                                                    'class' => 'form-control',
                                                                     'placeholder' => 'Video title']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Video description
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {!! Form::textarea('description', null, ['class' => 'form-control',
                                                                        'placeholder' => 'Enter description here',
                                                                        'required' => 'required'])  !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Video image
                </div>
                <div class="panel-body">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <p class="help-block">Video images:</p>
                                    {!! Form::text('logo_url', null, ['required' => 'required',
                                                                        'class' => 'form-control',
                                                                         'placeholder' => 'logo link']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="help-block" for="background_url">Background image</label>
                            {!! Form::text('background_url', null, ['class' => 'form-control',
                                                                    'placeholder' => 'background link',
                                                                    'required' => 'required']) !!}
                        </div>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
    </div>
    <!-- /.panel-body -->


    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Video file
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p class="help-block">You can upload some video files</p>
                            @foreach($video->getVideoUrl() as $vid)
                                {{--<input required="required" type="text" class="form-control" name="video_url[]">--}}
                                {!! Form::text('video_url[]', $vid, ['class' => 'form-controll']) !!}
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Select category
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                @foreach ($categories_list as $category_id => $category_name)
                                    <option value="{{ $category_id }}">{{ $category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

    <div class="col-lg-12" style="margin-bottom: 50px;">
        <button class="btn btn-success pull-right" type="submit">Add new video</button>
    </div>


    {!! Form::close() !!}

@endsection
