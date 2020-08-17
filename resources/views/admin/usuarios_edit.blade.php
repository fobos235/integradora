@extends('layouts.principal')
@section('contenido')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Usuarios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session('status'))
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    </div>
                @endif

                <div class="col-md-12 connectedSortable ui-sortable">
                    <div class="card card-primary">
                        <!-- Usamos el método update del controlador y también eviamos los datos del usuario que queramos editar.  -->
                        <form role="form" action="{{route('usuarios.update',$usuario)}}" method="POST">
                            <!-- Requerimos el method PUT para editar y lo mandamos a llamar, html solo permite POST o GET por eso lo llamamos de otra forma-->
                            @method('PUT')
                            <div class="card-body">
                                @include('layouts.form_user')                                
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                    <input type="button" onclick="history.back()" name="volver atrás" value="volver atrás" class="btn btn-prymary" style="background:#ffffff; color:#3490DC;">
                                </div>
                            </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection