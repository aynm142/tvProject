<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
    <link href="{!! asset('css/appstyle.css') !!}" media="all" rel="stylesheet" type="text/css"/>
</head>
<body>

<div id="main-content">

    <header>
        <div id="logo-div">
            {{--<img src="{!! asset('images/logo.png') !!}" alt="logo">--}}
            <a href="/">Home page</a>
        </div><div id="accManager">
            @if (Auth::check())
                <p style="text-align: right;">Welcome, {{  Auth::user()->name }}</p>
                <a href="http://localhost/tvProject/public/logout">Logout</a>
            @else
                <a href="http://localhost/tvProject/public/register">Register</a>
                <a href="http://localhost/tvProject/public/login">Login</a>
            @endif
        </div>
    </header>

    <div id="main-container">
        <div id="left-menu">
            @if (Auth::check())
                <ul>
                    <li><a href="http://localhost/tvProject/public/category/create">Add Category</a></li>
                    <li><a href="http://localhost/tvProject/public/video/create">Add Video</a></li>
                    <li><a href="http://localhost/tvProject/public/category/show">Show Categories</a></li>
                </ul>
            @endif
        </div>
        @yield('content')
    </div>

</div>
</body>
</html>