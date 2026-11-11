
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio | @yield('title')</title>
</head>
<body>

    <nav>
        <a href="{{ route('home') }}">Home</a> |

        <a href="{{ route('portfolio.projects') }}">My Projects</a> |

        <a href="{{ route('portfolio.contact') }}">Contact Me</a>

        @auth
            |
            <form action="{{ route('logout') }}" method="POST"
                  style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </nav>

    <hr>

    <main>
        @yield('content')
    </main>

    <hr>

    <footer>
        All rights reserved &copy; 2026
    </footer>

</body>
</html>
