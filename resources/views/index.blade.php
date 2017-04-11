@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-users"></i>
                </div>
                <div class="num">1588</div>

                <h3>Total Subscribers</h3>
                <p>The total amount of subscribers on your site.</p>
            </div>

        </div>

        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-user-add"></i>
                </div>
                <div class="num">0</div>

                <h3>New Subscribers</h3>
                <p>New Subscribers for today.</p>
            </div>

        </div>

        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-video"></i>
                </div>
                <div class="num">39</div>

                <h3>Videos</h3>
                <p>Total videos on your site.</p>
            </div>

        </div>

        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-doc-text"></i>
                </div>
                <div class="num">12</div>

                <h3>Posts</h3>
                <p>Total Posts/Articles on your site.</p>
            </div>

        </div>
    </div>
    <!-- /.row -->
    <div class="row">content
        <a href="{{ route('sendEmail') }}" class="btn btn-primary">Send test email</a>
    </div>
    <!-- /.row -->
@endsection