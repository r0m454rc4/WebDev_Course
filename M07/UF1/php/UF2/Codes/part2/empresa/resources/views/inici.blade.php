<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Empresa</title>
    </head>
    <body>
        <div>Pàgina inicial de l'aplicació web Empresa</div>
            @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a><br>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a><br>
                @endif
            @endauth
        @endif
    </body>
</html>
