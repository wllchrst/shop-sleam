<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: black;
            color : white;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: flex;
            justify-content: center;
            flex-direction: column
            
        }
        a {
            text-decoration: none;
            color : white;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">401 | UNAUTHORIZED</h1>
    <a href="{{ route('loginPage') }}" style="text-align: center">Please Login First</a>
</body>
</html>
