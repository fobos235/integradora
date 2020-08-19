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
                    <li class="breadcrumb-item"><a href="#">Ventas</a></li>
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
                        
                        <form role="form" action="{{route('ventas.store')}}" method="POST">
                            <div class="card-body">
                                @include('layouts.form_vent')
                                
                                
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Realizar venta</button>
                                </div>
                            </div>
                        </form>
                      </div>
                      
                </div>
            </div>
        </div>
    </section>
    
    <script>
        $(document).ready(function(){

            $('#producto').keyup(function(){ 
                var query = $(this).val();
                if(query != ''){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('ventas.fetch') }}",
                        method:"POST",
                        data:{query:query, _token:_token},
                        success:function(data){
                            
                            $('#productList').fadeIn(); 

                            $('#productList').html(data);
                        }
                    });
                }
            });

            $('.product-info').click(function(){
                alert("Hola");
            });
            $(document).on('click', 'li', function(){  
                $('#producto').val($(this).text());  
                $('#productList').fadeOut();  
            });  

            
        });

        $('#agregar').click(function(){
            if($('#agregar').val() == ""){
                alert("Seleccione un producto");
                return false;
            }else{
                data = $('#agregar').val();
                info = data.split("*");
                tbl = "<tr>";
                tbl = "<td>Modelo</td>";
                tbl += "<td>"+info[0]+"</td>";
                tbl += "<td>"+info[1]+"</td>";
                tbl += "<td>"+info[2]+"</td>";
                tbl += "<td><input type='number' min='0' max='"+info[2]+"' name='cantidad' required></td>";
                tbl += "<td>0.00</td>";
                tbl += "<td class=''><button class='btn btn-danger'><i class='fa fa-trash'></td>";
                $('#tbody').append(tbl);
            }
        });

        function agregar(nombre,precio, stock){
           let values = nombre+"*"+precio+"*"+stock;
           $('#agregar').val(values);
        }
</script>
@endsection