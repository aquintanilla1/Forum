<html>
<head>
    @yield('title')
</head>
<body>
    <h1><a href="/">{{ $title }}</a></h1>
    @include('layout.alerts')
    @yield('content')
</body>
</html>
