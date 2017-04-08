@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header text-ellipsis word-break">
                <i class="fa fa-pencil"></i> Edit {{ $category->category_name }}
            </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.errors')

    <div class="row">
        <div class="col-lg-12">
            {!! Form::model($category, ['method' => 'PATCH', 'action' => ['CategoryController@update', $category->id]]) !!}
                <div class="form-group input-group">
                    {!! Form::text('category_name', null, ['class' => 'form-control']) !!}
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-pencil"></i> Edit category
                        </button>
                    </span>
                </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection