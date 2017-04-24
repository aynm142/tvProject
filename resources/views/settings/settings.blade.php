@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <i class="fa fa-gear"></i> Site Settings
            </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.errors')

    <div class="row">
        <div class="col-lg-12">
            

    

            {!! Form::model($data, [
                    'method' => 'PATCH', 
                    'files' => true, 
                    'action' => ['SettingsController@update', $data],
                    'class' => 'form-horizontal',
                ]) !!}
                
                <div class="form-group">
                    {!! Form::label('site_name', 'Site name:', ['class' => 'col-md-2 control-label']) !!}
                
                    <div class="col-md-8">
                        {!! Form::text('site_name', null, ['class' => 'form-control input-md']) !!}
                        <p class="help-block">help</p>  
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('logo_image', 'Logo image:', ['class' => 'col-md-2 control-label']) !!}
                
                    <div class="col-md-8">
                        {!! Form::text('logo_image', null, ['class' => 'form-control input-md']) !!}
                        <p class="help-block">help</p>  
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('background_image', 'Background image:', ['class' => 'col-md-2 control-label']) !!}
                
                    <div class="col-md-8">
                        {!! Form::text('background_image', null, ['class' => 'form-control input-md']) !!}
                        <p class="help-block">help</p>  
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('banner', 'Banner on\off', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::select('banner', ['No', 'Yes'], null, ['required' => 'required', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <button type="submit" class="btn btn-primary center-block">Save</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
