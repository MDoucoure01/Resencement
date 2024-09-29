<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @stack('styles')
    @stack('images')
</head>

<body>
    @if (Auth::check())
    <x-recensement-unite.nav-bar></x-recensement-unite.nav-bar>
    @endif
    {{$slot}}
    @stack('scripts')
</body>

</html>
