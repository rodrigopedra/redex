<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name=csrf-token content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
<main>
    @if(Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/') }}">Home</a>
            @else
                <a href="{{ url('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    @yield('content')
</main>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
