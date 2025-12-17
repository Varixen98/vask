<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"></script>

    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-w-full min-h-full">
    
    @include('studio.components.header')
    
    @yield('content')
    
    @include('studio.components.footer')

    @vite(['resources/js/app.js' ,'resources/js/studio.js'])
</body>
</html>