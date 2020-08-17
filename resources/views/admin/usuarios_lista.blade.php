@extends('layouts.principal')

@section('contenido')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Usuarios</h1>
                <a href="{{route('usuarios.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
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
                        <table class="table" id="usuarios_tbl">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Creado</th>
                                    <th>Editado</th>
                                    <th>Acciones</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->password}}</td>
                                        <td>{{$user->created_at->format('Y-m-d')}}</td>
                                        <td>{{$user->updated_at}}</td> 

                                        <td class="{{$user->id}}">
                                            <!--Aqui estamos mandando el id del usuario y especificamos la ruta de a donde va, como tenemos 3 diferentes opciones
                                            cada una nos dirige a cierta direccion o hacen cosas diferentes-->
                                            <a href="{{route('usuarios.edit', $user->id)}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>                                            
                                            <a href="#" data-url="{{route('usuarios.show', $user->id)}}" class="btn btn-primary link-show" ><i class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger link-destroy" id="btn-{{$user->id}}" data-id="{{$user->id}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td class="d-none c-{{$user->id}}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button style="border: 1px" class="btn cancelar cancel-{{$user->id}}" data-id="{{$user->id}}">Cancelar</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <form method="POST" action="{{route('usuarios.destroy',$user->id)}}" class="" id="{{$user->id}}">
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
                <h4 class="modal-title">Información del usuario</h4>
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
<script>
        $(document).ready(function(){
            setTimeout(function(){
                $('#status').addClass('d-none');
            },5000);

            $('#productos_tbl').DataTable();
        });
        btn_oculto = null;
        $('.link-show').click(function(){
            $.ajax({
                type: 'GET',
                url: $(this).attr('data-url'),
                success:function(data){
                    $('#modal-show-info').html(data)
                    console.log(data);
                    $('#modal-show').modal();
                }
            });
        });

        $('.link-destroy').click(function(){
            var data_id = $(this).attr('data-id');

            $('.'+data_id).addClass('d-none');
            $('.c-'+data_id).removeClass('d-none');

           
        });

        $('.cancelar').click(function(){
            
            var data_id = $(this).attr('data-id');

            $('.c-'+data_id).addClass('d-none');
            $('.'+data_id).removeClass('d-none');


        })
    </script>
@endsection