<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('image/logo.svg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Dashboard</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @yield('css')
        <!-- END: CSS Assets-->
    </head>
    <body class="main">
        @include('template.sidebar.sidebar_mobile')
        @include('template.header.header')
        <div class="wrapper">
            <div class="wrapper-box">
                @include('template.sidebar.sidebar')
                @yield('content')
                </script>
            </div>
        </div>
        @include('template.footer.footer')
        @yield('javascript')
    </body>
</html>