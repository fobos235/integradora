@extends('layouts.principal')
@section('contenido')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Categorias</h1>
                {{-- <a href="{{route('categorias.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nueva</a> --}}
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active">Nueva</li>
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
                    
                    
                    <!-- form start -->
                    <form role="form" action="{{route('categorias.store')}}" method="POST">
                        <div class="card-body">
                            @include('layouts.form_categorias')
                            
      
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div>
</section>

    
@endsection