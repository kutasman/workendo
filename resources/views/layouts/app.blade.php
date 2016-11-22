<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @yield('header')
</head>
<body>
    <div id="app">
        @include('common.navmenu')

        <div class="container">
            <div class="row col-md-offset-2 col-md-8">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('footer')
</body>
</html>
