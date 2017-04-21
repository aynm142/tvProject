@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <i class="fa fa-list"></i> All Promo Codes
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
                    <ul class="list-group ov-h">
                        @foreach($all_promo as $key => $promo)
                            <li class="list-group-item" title="{{ $promo->code }}">
                                {{ str_limit($promo->code, 75) }}

                                <div class="action-buttons">
                                    <a class="btn btn-sm btn-default pull-left m-r-5" href="#">Edit</a>
                                    <a class="btn btn-sm btn-danger pull-left m-r-5" href="#">Delete</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
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