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
                <div class="num">{{ $statistic["totalSubscribes"] }}</div>

                <h3>Total Subscribers</h3>
                <p>The total amount of subscribers on your site.</p>
            </div>

        </div>

        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-user-add"></i>
                </div>
                <div class="num">{{ $statistic["totalUsers"] }}</div>

                <h3>All users</h3>
                <p>Total users on your site</p>
            </div>

        </div>

        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-video"></i>
                </div>
                <div class="num">{{ $statistic["totalVideos"] }}</div>

                <h3>Videos</h3>
                <p>Total videos on your site.</p>
            </div>

        </div>

        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-doc-text"></i>
                </div>
                <div class="num">{{ $statistic["totalCategories"] }}</div>

                <h3>Categories</h3>
                <p>Total categories on your site.</p>
            </div>

        </div>
    </div>
    <!-- /.row -->
    <div class="row">content
    </div>
    <!-- /.row -->
@endsection