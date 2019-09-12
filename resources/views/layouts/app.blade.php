<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    
</head>
<body>

    @include('layouts.navbar')
    <br>
    <div class="container">
        @yield('content')
    </div>
            
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</body>
</html>
