<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') - Warriors</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>
<body>
    <script src="{{ asset('/css/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/startup-modern.js') }}"></script>
    <nav id="mainNav" class="navbar navbar-expand-md fixed-top navbar-shrink py-3 navbar-light">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><img src="https://warriorsdefender.mx/assets/logo-default.png" class="img-fluid" width="130" height="50"></a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div id="navcol-1" class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('grupos*') ? 'active' : '' }}" href="{{ route("grupos.index") }}">Grupos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('estudiantes*') ? 'active' : '' }}" href="{{ route("estudiantes.index") }}">Estudiantes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="py-5 mt-5">
        <div class="container py-5">
        @yield('content')
        </div>
    </section>
</body>
</html>
