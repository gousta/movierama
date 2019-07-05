<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/signal.css">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/snackbarjs/1.1.0/snackbar.min.css" />

    <style>
        #content {
            margin-top: 32px;
        }

        .snackbar {
            margin: 8px 0;
            background: #212121;
            border-radius: 4px;
            padding: 6px 12px;
        }

        .snackbar-content {
            color: #fff;
        }

        .navbar {
            background-color: #e9ecef;
        }
    </style>
    @stack('styles')
</head>

<body>
    <section id="main">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/">MovieRama</a>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('docs.index') }}">API Docs</a>
                </li>
            </ul>

            <ul class="navbar-nav flex-row ml-md-auto d-md-flex">
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="movieDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="movieDropdown">
                            <h6 class="dropdown-header">Movies</h6>
                            <a class="dropdown-item {{ \Request::route()->getName() === 'user.show' ? 'active':'' }}" href="{{ route('user.show', ['nickname' => Auth::user()->nickname]) }}">My movies</a>
                            <a class="dropdown-item {{ \Request::route()->getName() === 'movie.create' ? 'active':'' }}" href="{{ route('movie.create') }}">Add a movie</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Log out</a>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Sign in with Github</a></li>
                @endif
            </ul>
        </nav>


        <section id="content">
            <div class="container">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ $message }}
                    </div>
                @endif

                @yield('content')
            </div>
        </section>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/snackbarjs/1.1.0/snackbar.min.js"></script>

    @stack('scripts')

</body>
</html>
