<!--Madamos a llamarlo porque así protejemos nuestra aplicación de falsificación de solicitudes entre sitios (CSRF)-->
@csrf
<div class="form-goup">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{old('nombre',$usuario->name)}}" placeholder="Nombre">
    <!--Agregamos esto para que nos de el error que tenga el campo en caso de tenerlo y así mismo a los demás campos se lo agregamos-->
    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror
<div>

<div class="form-goup">
    <label for="nombre">Correo</label>
    <input class="form-control" type="text" name="correo" id="correo" value="{{old('correo',$usuario->email)}}" placeholder="Correo">
    @error('correo')
        <small class="text-danger">{{$message}}</small>
    @enderror
<div>

<div class="form-goup">
    <label for="password">Password</label>
    <input class="form-control" type="password" name="password" id="password" value="{{old('password',$usuario->password)}}" placeholder="Password">
    @error('Password')
        <small class="text-danger">{{$message}}</small>
    @enderror
<div>