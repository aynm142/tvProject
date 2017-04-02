<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VIS TV :: Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('admin/vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    
    @stack('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Logo</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                @if(Auth::check())
                    <li>
                        <a href="#" target="_blank">
                            <span class="label label-primary">view my site</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://test1.a2-lab.com/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                @else
                    <li>
                        <a href="http://test1.a2-lab.com/register">Register</a>
                    </li>
                    <li>
                        <a href="http://test1.a2-lab.com/login">Login</a>
                    </li>
                @endif
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse collapse">
                    @if( Auth::check() )
                    <ul class="metismenu" id="side-menu">
                        <li>
                            <a href="#">
                                <i class="fa fa-dashboard fa-fw"></i>
                                <span class="visible-xs-inline">Dashboard</span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://test1.a2-lab.com/">Dashboard</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                           <a href="#">
                                <i class="fa fa-list"></i>
                                <span class="visible-xs-inline">Categories</span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://test1.a2-lab.com/category/show">All categories</a>
                                </li>
                                <li>
                                    <a href="http://test1.a2-lab.com/category/create">Add new categories</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-video-camera fa-fw"></i>
                                <span class="visible-xs-inline">Videos</span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">All Videos</a>
                                </li>
                                <li>
                                    <a href="{{ 'video/create' }}">Add Videos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                    @endif
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('admin/vendor/metisMenu/metisMenu.min.js') }}"></script>
    
    @stack('scripts')

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin/js/admin.js') }}"></script>
</body>
</html>