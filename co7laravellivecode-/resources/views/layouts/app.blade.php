
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portfolio | @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">

            <a href="{{ route('home') }}" class="logo">
                Portfolio<span>.</span>
            </a>

            <div class="nav-links">

                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    My Profile
                </a>

                <a href="{{ route('portfolio.projects') }}"
                   class="{{ request()->routeIs('portfolio.projects') ? 'active' : '' }}">
                    My Projects
                </a>

                <a href="{{ route('portfolio.contact') }}"
                   class="{{ request()->routeIs('portfolio.contact') ? 'active' : '' }}">
                    Contact Me
                </a>

                @auth
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                @endauth

            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="page-footer">
        All rights reserved &copy; 2026
    </footer>

</body>
</html>
