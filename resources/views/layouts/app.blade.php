<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="wrap">
        <div class="container">
            {{-- @include('inc.navbar') --}}
            @include ('inc.messages')

            @yield('content')
        </div>
        <footer id="footer" class="text-center">
            <p>Copyright 2019 &copy; My Website</p>
        </footer>
    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>

</html>