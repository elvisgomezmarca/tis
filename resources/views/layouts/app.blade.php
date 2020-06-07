<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FCYT</title>

    <link href="{{ asset('css/template.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    @yield('styles')

    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body id="app-layout">

    <!-- Wrap all page content here -->
    <div id="wrap">
        <header class="masthead">
            <!-- Fixed navbar -->
            <div class="navbar navbar-expand-lg navbar-light bg-light" id="nav" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-align-justify"></i>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('assets/images/home/logo.png') }}" alt="">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav social hidden-xs hidden-sm">
                            <li><a href="#"><i class="fa fa-twitter fa-lg fa-fw"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook fa-lg fa-fw"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin fa-lg fa-fw"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav  ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="{{ url('/')  }}">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="#features">Caracteristicas</a></li>
                            <li class="nav-item"><a class="nav-link" href="#announcements">Convocatorias</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">Contactar</a></li>
                            @if(!Auth::check())
                                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Registrarse</a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!--/.container -->
            </div>
            <!--/.navbar -->
        </header>

        <section>
            <div class="container">
                @yield('content')
            </div>
        </section>
    </div>

    <script src="{{ asset('js/template.js') }}"></script>
    <script>
        $(document).ready(function() {
            appMaster.preLoader();
        });
    </script>
    @yield('scripts')
</body>
</html>
