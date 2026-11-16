<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tasks for Today')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tasks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="{{ route('home') }}"><span class="brand-mark">T</span> Tasks for Today</a>
            <nav aria-label="Main navigation">
                <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Welcome</a>
                <a class="{{ request()->routeIs('tasks.*') ? 'active' : '' }}" href="{{ route('tasks.index') }}">Task List</a>
                <a class="{{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
                <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                @auth
                    <form class="nav-form" method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="nav-button">Logout</button></form>
                @else
                    <a class="{{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                @endauth
            </nav>
        </div>
    </header>
    <main class="container page-content">
        @if (session('success'))<div class="flash success">{{ session('success') }}</div>@endif
        @yield('content')
    </main>
    <footer class="site-footer"><div class="container">IT0049 &middot; TSA4 &middot; Laravel Tasks for Today</div></footer>
</body>
</html>
