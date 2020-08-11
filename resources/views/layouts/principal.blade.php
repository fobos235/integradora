<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administración</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('layouts.menu')
   
    @yield('contenido')
    @yield('content')

    @include('layouts.footer')
    <script src="/js/app.js"></script>
</body>
</html>