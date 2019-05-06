<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/google-roboto-300-700.css') }}" rel="stylesheet" />
</head>
<body>
<div id="app">
    @include('auth.partials.navbar_login')

    <main class="py-4">
        @yield('content')
    </main>
</div>



<!-- JavaScripts -->
@include('partials.scripts')
</body>
</html>
