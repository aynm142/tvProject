@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <i class="fa fa-list"></i> All Promo Codes
                <a href="{{ route('promo.add') }}" class="btn btn-success btn-sm m-l-20"><i class="fa fa-plus"></i> Add new promo code</a>
            </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default panel-categories">
                <div class="panel-heading">
                    Manage the promo codes below:
                </div>
                <!-- .panel-heading -->
                <div class="panel-body">
                    @if ( count($all_promo) )
                        <ul class="list-group ov-h">
                            @foreach($all_promo as $key => $promo)
                                <li class="list-group-item" title="{{ $promo->code }}">
                                    {{ str_limit($promo->code, 75) }}

                                    <div class="action-buttons">
                                        <a class="btn btn-sm btn-default pull-left m-r-5" href="{{ route('promo.edit', ['id' => $promo->id]) }}">Edit</a>
                                        {!! Form::Open(['method' => 'DELETE', 'url' => route('promo.post.delete', ['id' => $promo->id]), 'class' => 'pull-left']) !!}
                                            <button type="submit" class="btn btn-sm btn-danger pull-left m-r-5">Delete</button>
                                        {!! Form::Close() !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center alert alert-warning" style="margin-top: 10px;">
                            <p>
                                First, add at least one <a href="{{ route('promo.add') }}">promotional code</a>
                            </p>
                        </div>
                    @endif
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <div class="col-xs-12 text-center">
            {{ $all_promo->links() }}
        </div>
    </div>

@endsection