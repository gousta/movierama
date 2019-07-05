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
        @include('components.navbar')

        <section id="content">
            <div class="container">
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
