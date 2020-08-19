@extends('layouts.principal')

@section('contenido')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ventas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Ventas</li>
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
                            <table class="table" id="ventas_tbl">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Vendido por</th>
                                        <th>Subtotal</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $v)
                                         <tr>
                                            
                                            <td>{{$v->fecha->toDateTime()->format('Y-m-d h:i:s')}}</td>
                                            <td>{{$v->vendedor}}</td>
                                            <td>{{$v->subtotal}}</td>
                                            <td>{{$v->total}}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#detalle-venta" data-info="{{$v->id}}" class="btn btn-primary ver-venta">
                                                    <i class="fa fa-eye"></i>
                                                </a>
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
    <div class="modal fade" id="detalle-venta">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Información de la venta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-show-info">

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id="imprimir" data-dismiss="modal"><i class="fa fa-print"></i> Imprimir ticket</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.ver-venta').click(function(){
            let venta = $(this).attr('data-info');
            // console.log(venta);
            spinner = '<center><div class="spinner-border" role="status"> <span class="sr-only">Loading...</span></div></center>';
            $.ajax({
                url:'/ventas/'+venta,
                
                beforeSend: function(){
                    $('#modal-show-info').html(spinner);
                },
                success:function(data){
                    $('#modal-show-info').html(data);
                }
            });
        });

        $('#imprimir').click(function(){
            $('#detalle-venta #modal-show-info').print({
                title: "Nota de venta",
                addGlobalStyles : true
            });
        });
    </script>
@endsection