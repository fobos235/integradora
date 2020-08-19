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
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $v)
                                         <tr>
                                            <td>{{$v->fecha->format('Y-m-d')}}</td>
                                            <td>{{$v->vendedor}}</td>
                                            <td>{{$v->subtotal}}</td>
                                            <td>{{$v->total}}</td>
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