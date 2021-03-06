<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}" type="text/css"/>
</head>
<body class="bg-secondary">
<nav class="p-3 bg-white d-flex justify-content-between align-items-center">
    <ul class="d-flex flex-row list-group">
        <li class="list-group-item p-0 border-0">
            <a href="/" class="p-3 text-dark">Home</a>
        </li>
        @role('admin')
        <li class="list-group-item p-0 border-0">
            <a href="{{ route('dashboard') }}" class="p-3 text-dark">Dashboard</a>
        </li>
        @endrole
        <li class="list-group-item p-0 border-0">
            <a href="{{ route('posts') }}" class="p-3 text-dark">Post</a>
        </li>
    </ul>
    <ul class="d-flex flex-row list-group">
        @auth
            <li class="list-group-item p-0 border-0">
                <a href="" class="p-3 text-dark">{{ auth()->user()->name }}</a>
            </li>
            <li class="list-group-item p-0 border-0">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="p-0 text-dark btn">Logout</button>
                </form>
            </li>
        @endauth
        @guest
            <li class="list-group-item p-0 border-0">
                <a href="{{ route('login') }}" class="p-3 text-dark">Login</a>
            </li>
            <li class="list-group-item p-0 border-0">
                <a href="{{ route('register') }}" class="p-3 text-dark">Register</a>
            </li>
        @endguest
    </ul>
</nav>


@yield('content')

<script src="{{ asset("js/app.js") }}"></script>
</body>
</html>
