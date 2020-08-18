@extends('layouts.principal')

@section('contenido')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Categorias</h1>
                <a href="{{route('categorias.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nueva</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active">Categorias</li>
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
                                    <th>Status</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $c)
                                     <tr>
                                        <td>{{$c->nombre}}</td>
                                        <td>{{$c->estado}}</td>
                                        <td>{{$c->descripcion}}</td>
                                        <td class="{{$c->id}}">
                                            <a href="{{route('categorias.edit', $c->id)}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                            {{-- <a href="#" data-url="{{route('categorias.show', $c->id)}}" class="btn btn-primary link-show" ><i class="fa fa-eye"></i></a> --}}
                                            <a href="#" class="btn btn-danger link-destroy" id="btn-{{$c->id}}" data-id="{{$c->id}}"><i class="fa fa-trash"></i></a>
                                            
                                            
                                            
                                        </td>
                                        <td class="d-none c-{{$c->id}}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button style="border: 1px" class="btn cancelar cancel-{{$c->id}}" data-id="{{$c->id}}">Cancelar</button>

                                                </div>
                                                <div class="col-md-6">
                                                    <form method="POST" action="{{route('categorias.destroy',$c->id)}}" class="" id="{{$c->id}}">
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
    
@endsection