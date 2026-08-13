<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('styles')
</head>

<body>
    <header class="container my-4">
        @if (Route::has('login'))
            <nav class="text-end">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="inline-block px-5 border border-transparent rounded-start-2 py-1 text-decoration-none text-dark"
                        >
                            Cerrar sesión
                        </button>
                    </form>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block px-5 border border-transparent rounded-start-2 py-1 text-decoration-none text-dark"
                    >
                        Iniciar sesión
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-5 border border-transparent rounded-end-2 py-1 text-decoration-none text-dark"
                        >
                            Registrarme
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
