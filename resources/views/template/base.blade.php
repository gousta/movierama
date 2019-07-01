<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://bootstrap.themes.guide/signal/theme.min.css">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">

    <style>
        #content {
            margin-top: 32px;
        }
    </style>
    @stack('styles')
</head>

<body>
    <section id="main">
        <section id="content">
            <div class="container">
                @yield('content')
            </div>
        </section>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    @stack('scripts')

</body>
</html>
