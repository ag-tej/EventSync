<!DOCTYPE html>
<html lang="en-NP">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('svg/favicon.svg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="{{ asset('js/methods.js') }}" defer></script>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>
        
    </style>
</head>

<body class="bg-[#f8f8f8]">
    @yield('content')
</body>

</html>
