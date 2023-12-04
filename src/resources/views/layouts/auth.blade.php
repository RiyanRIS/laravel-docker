<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- TITLE -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Favicon -->
    <link rel="icon" href="build/assets/images/brand/favicon.ico" type="image/x-icon">

    <!-- ICONS CSS -->
    <link href="build/assets/iconfonts/icons.css" rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="build/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- APP CSS & APP SCSS -->
    <link rel="stylesheet" href="build/assets/app-e29e56ca.css" />
</head>

<body class="app sidebar-mini ltr login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">
        <!-- PAGE -->
        <div class="page">

            <!-- CONTAINER OPEN -->
            <div class="">
                <div class="text-center">
                    <a href="index.html"><img src="build/assets/images/brand/desktop-dark.png"
                            class="header-brand-img" alt=""></a>
                </div>
            </div>
            @yield('content')
            <!-- CONTAINER CLOSED -->


        </div>
        <!-- End PAGE -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    @yield('script')
</body>

</html>
