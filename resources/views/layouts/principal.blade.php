@if (Auth::guest())
    <script>location.href="{{route('login')}}";</script>
@endif


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administración</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="shortcut icon" href="{{asset('img/escritorio.png')}}" type="image/x-icon">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jQuery.print.js')}}"></script>
    
</head>
<body>
    @include('layouts.menu')
    <div class="content-wrapper">
   
        @yield('contenido')
    </div>

    @include('layouts.footer')
    <script src="{{asset('js/main.js')}}"></script>
    
</body>
</html>