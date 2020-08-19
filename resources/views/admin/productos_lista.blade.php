@extends('layouts.principal')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Productos</h1>
                    <a href="{{route('productos.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        

        <section class="content">
            <div class="container-fluid">
                <div class="container-fluid" id="status">
                    <div class="row">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-12 connectedSortable ui-sortable">
                        <div class="card card-primary">
                            <table class="table" id="productos_tbl">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Categoría</th>

                                        <th>Acciones</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $p)
                                         <tr>
                                            <td>{{$p->nombre}}</td>
                                            <td>{{$p->marca}}</td>
                                            <td>{{$p->modelo}}</td>
                                            <td>{{$p->precio}}</td>
                                            <td>{{$p->stock}}</td>
                                            <td>{{$p->categoria}}</td>
                                            <td class="{{$p->id}}">
                                                <a href="{{route('productos.edit', $p->id)}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" data-url="{{route('productos.show', $p->id)}}" class="btn btn-primary link-show" ><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger link-destroy" id="btn-{{$p->id}}" data-id="{{$p->id}}"><i class="fa fa-trash"></i></a>
                                                
                                                
                                                
                                            </td>
                                            <td class="d-none c-{{$p->id}}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button style="border: 1px" class="btn cancelar cancel-{{$p->id}}" data-id="{{$p->id}}">Cancelar</button>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <form method="POST" action="{{route('productos.destroy',$p->id)}}" class="" id="{{$p->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <div class="modal fade" id="modal-show">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Información del producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-show-info">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    

    
@endsection