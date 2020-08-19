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


    <!-- 
        Aqui hay varias partes, se usa el metodo POST para recuperar la información consultada con el metodo de controllerVentas llamado fecth
        Y lo añadimos justo de bajo del buscador de productos por medio de un div, la variable que recibimos se recibe y si se da click se escribe
        esa información en el campo de producto para agregarlo

        Adicionalmente cuándo mandamos la variable especificamos un metodo en el li para que al hacerle click y el nombre del producto se inserte ese dato en el campo
        de texto,estamos mandando los datos de la consulta de ese producto a una funcion llamada agregar.

        Una vez logrado esto en el código de abajo mencionamos que al momento de presionar el botón de agregar producto validamos que si está vacio nos mande un mensaje
        de que no se pueden agregar algo vacio, luego al utilizar el metodo agregar mandamos información, esa información la usamos para añadir los datos de los productos
        en una tabla para que puedan visualizarse
    -->
    
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