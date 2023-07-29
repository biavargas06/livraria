<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <h1>Livraria Goldenberg</h1>
    @if (Auth::user() && Auth::user()->isAdmin === 'admin')
        Admin
    @endif
    @if (Auth::user())
            {{ Auth::user()->nome }} <br>
            <a href="{{ route('logout') }}">Logout</a>

        @else
            <a href="{{ route('login') }}">Login</a>
        @endif
    </div>
    <hr>
    <div>


    @yield('content')

</body>
</html>
