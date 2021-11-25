<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

</head>

@include('_nav')

<body>
    <div class="container mx-auto">
        @yield('content')
    </div>
    @livewireScripts
</body>

</html>
