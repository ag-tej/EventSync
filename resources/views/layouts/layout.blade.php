<!DOCTYPE html>
<html lang="en-NP">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('svg/favicon.svg') }}" type="image/x-icon">
    {{-- jquery --}}
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    {{-- figtree font --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- aos animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- chart.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    {{-- methods script --}}
    <script src="{{ asset('js/methods.js') }}" defer></script>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>

    </style>
</head>

<body class="bg-[#f8f8f8]">
    <script>
        AOS.init();
    </script>
    @include('components.toast_notification')
    @include('components.account_delete_confirmation')
    @yield('content')
    {{-- flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
</body>

</html>
