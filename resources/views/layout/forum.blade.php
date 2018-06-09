<html>
<head>
    @yield('title')
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <h1><a href="/">{{ config('app.name', 'Laravel') }}</a></h1>
    @include('layout.alerts')
    @yield('content')
</body>
</html>
