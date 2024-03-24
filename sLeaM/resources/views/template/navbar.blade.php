<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('style/navbar.css') }}">
    @yield('links')
</head>
<body>
    <nav class="navbar-container">
        <div class="logo-container">
            <img src="{{ URL::to('images/steam-logo.png') }}" alt="" class="logo-img">
            <h2>sLeaM</h2>
        </div>
        <div class="menu-container">
            @yield('anchors')
        </div>
    </nav>
    @yield('content')
</body>
</html>
