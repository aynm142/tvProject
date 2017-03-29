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
            <img src="{!! asset('images/logo.png') !!}" alt="logo">
        </div><div id="accManager">
            @if (Auth::check())
                <p style="text-align: right">Welcome, {{  Auth::user()->name }}</p>
                {{ Html::link('logout', 'Logout') }}
            @else
                {{ Html::link('register', 'Register') }} {{-- <a href="/tvProject/public/register">Register</a> --}}
                {{ Html::link('login', 'Login') }}
            @endif
        </div>
    </header>

    <div id="main-container">
        <div id="left-menu">
            @if (Auth::check())
                <ul>
                    <li>{{ Html::link('newcat', 'Add Category') }}</li>
                    <li>{{ Html::link('newvideo', 'Add Video') }}</li>
                </ul>
            @endif
        </div>
        @yield('content')
    </div>

</div>
</body>
</html>