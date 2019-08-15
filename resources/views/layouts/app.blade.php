<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Page</title>
    {{-- Styles --}}
    <link rel="stylesheet" href="/css/app.css">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap" rel="stylesheet">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        @include('inc.navbar')

        @yield('content')

        <footer id="footer" class="text-center">
            <p>Copyright 2019 &copy; My Website</p>
        </footer>
        
    </div>
</body>
</html>