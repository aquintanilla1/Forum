<html>
<head>
    @yield('title')
</head>
<body>
    <h1><a href="/">{{ config('app.name', 'Laravel') }}</a></h1>
    @include('layout.alerts')
    @yield('content')
</body>
</html>
