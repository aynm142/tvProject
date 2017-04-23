@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <i class="fa fa-pencil"></i> Edit video
            </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.errors')

    <div class="row">
        {!! Form::model($video, ['method' => 'PATCH', 'files' => true, 'action' => ['VideoController@update', $video->id]]) !!}
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Video title
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <p class="help-block">Change the video title in the textbox below:</p>
                                {!!
                                    Form::text(
                                        'video_name', null, [
                                            'required' => 'required',
                                            'class' => 'form-control',
                                            'placeholder' => 'Video title'
                                        ]
                                    )
                                !!}
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
                                {!!
                                    Form::textarea(
                                        'description', null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter description here',
                                            'required' => 'required'
                                        ]
                                    )
                                !!}
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="help-block" for="logo_url">Logo image</label>
                                @include('widgets.file-input-preview', [
                                        'default_value' => $video->logo_url,
                                        'name' => 'logo_url'
                                    ]
                                )
                            </div>
                            <div class="form-group">
                                <label class="help-block" for="background_url">Background image</label>
                                @include('widgets.file-input-preview', [
                                        'default_value' => $video->background_url,
                                        'name' => 'background_url'
                                    ]
                                )
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
                    Video file
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach($video->getVideoUrl() as $url)
                                @include('widgets.file-input', [
                                        'default_value' => $url,
                                        'name' => 'video_url[]',
                                        'disabled_name' => 'old_video[]',
                                        'help_block' => ($loop->first) ? 'You can upload some video files' : false,
                                        'multiply' => $loop->last,
                                        'is_remove' => !$loop->first,
                                    ]
                                )
                            @endforeach
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
                                <select name="category" class="form-control">
                                    @foreach ($categories_list as $category_id => $category_name)
                                        <option
                                                value="{{ $category_id }}"
                                                @if ($category_id == $video->category_id)
                                                selected="selected"
                                                @endif
                                        >{{ $category_name }}</option>
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
            <button class="btn btn-success pull-right" type="submit">Update video</button>
        </div>


        {!! Form::close() !!}
    </div>

@endsection
