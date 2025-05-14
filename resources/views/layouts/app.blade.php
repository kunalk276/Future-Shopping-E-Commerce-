<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{ asset('css/utilities.css') }}">
    {{ $style }}

    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" />
    <title>Future Shopping</title>

    <script src="{{ asset('js/utilities.js') }}" defer></script>
    {{ $js ?? '' }}
</head>

<body class="m-0">

    @include('components.header')

    {{ $slot }}

    <footer>
        <div class="site-info">
            <a class="logo-link d-b" href="#"><img class="d-b" src="{{ asset('img/logo.png') }}"
                    alt="logo"></a>
           <p>
  © Kunal Kadam – College project for learning purposes only. Do not copy or reuse without permission.
</p>


        </div>
    </footer>
</body>

</html>
