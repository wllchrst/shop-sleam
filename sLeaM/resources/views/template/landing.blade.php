<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('style/landing.css') }}">
</head>
<body>
    <div class="container">
        <div class="inner-container">
            <div class="header-container">
                <img src="{{ URL::to('images/steam-logo.png') }}" alt="">
                <h1>{{ $name }}</h1>
            </div>
            @yield('content')
            {{-- <h1>Register</h1> <div class="input-container">
                <label for="id">Username</label>
                <input type="text" id="id" class="input-box">
            </div> --}}
        </div>
    </div>    

</body>
</html>
