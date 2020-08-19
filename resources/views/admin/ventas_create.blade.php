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
                        
                        <form role="form" action="{{route('ventas.store')}}" method="POST" id="nueva_venta">
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

    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Agregue un producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Debe seleccionar un producto para agregarlo a la venta</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    
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

            $(document).on('click', 'li', function(){  
                $('#producto').val($(this).text());  
                $('#productList').fadeOut();  
            });  

            
            
        });

        $('#agregar').click(function(){
            if($('#agregar').val() == ""){
                // alert("Seleccione un producto");
                $('#modal-danger').modal();
                return false;
            }else{
                /**
                 *  Adding products to the table after click the Agregar button
                 *  Getting values and dividing at * signal, it becomes in Array
                 *  A position is a individual value for a cell of the row
                 *  The row is appended to the tbody section
                 */
                data = $('#agregar').val();
                info = data.split("*");
                tbl = "<tr>";
                tbl += "<td>Modelo</td>";
                tbl += "<td><input type='hidden' name='productos[]' value='"+info[0]+"'>"+info[0]+"</td>";
                tbl += "<td class='precio'>"+parseFloat(info[1]).toFixed(2)+"</td>";
                tbl += "<td>"+info[2]+"</td>";
                tbl += "<td><input type='number' name='cantidades[]' value='1' min='1' max='"+info[2]+"' class='cantidades' onkeypress='return false' ></td>";
                tbl += "<td><input type='hidden' name='importes[]' value=''><p class='importe_val'>"+(info[1]*1)+"</p></td>";
                tbl += "<td class=''><button class='btn btn-danger btn-remover-prod'><i class='fa fa-trash'></i></button></td>";
                tbl += "</tr>";
                $('#tbody').append(tbl);
                $('#producto').val('');
                $('#producto').focus();
                $('#agregar').val(null);
                sumar();
            }
            $('.cantidades').click(function(){
                cantidad = $(this).val();
                precio =  $(this).closest("tr").find("td:eq(2)").text();
                importe_val=cantidad*precio;
                
                $(this).closest("tr").find("td:eq(5)").html(parseFloat(importe_val).toFixed(2));
                sumar();
            });

            $('.cantidades').keyup(function(){
                cantidad = $(this).val();
                precio =  $(this).closest("tr").find("td:eq(2)").text();
                importe_val=cantidad*precio;
                
                $(this).closest("tr").find("td:eq(5)").html(parseFloat(importe_val).toFixed(2));
                let valores = sumar();
                let v = valores.split("*");
            });
        });


        function sumar(){
            subtotal = 0;
            descuento = 0;
            $('#tbody tr').each(function () {
                subtotal = subtotal + Number($(this).find("td:eq(5)").text());
            });

            $('#subtotal').val(parseFloat(subtotal).toFixed(2));
            porcentaje = 16;
            iva = subtotal * (porcentaje/100);
            $('#iva').val(iva.toFixed(2));
            total = subtotal + iva - descuento;
            $("#total").val(total.toFixed(2));

            let valores = subtotal+'*'+iva.toFixed(2)+'*'+total;
            return valores;
        }

        $(document).on("click", ".btn-remover-prod", function () {
            $(this).closest('tr').remove();
            sumar();
        });
        
       
        $('#nueva_venta').submit(function(){
            productos = [];
            articulos = [];
            cantidades = [];
            $('#tbody tr').each(function () {
                articulos.push({'producto' : $(this).find("td:eq(1)").text(), 'cantidad' : parseInt($(this).find(".cantidades").val()), 'precio' : parseFloat($(this).find("td:eq(2)").text()).toFixed(2) });
                productos.push(articulos); console.log(productos);
            });
                
               

            $('#arr_productos').val(productos);
        });

        

        function agregar(nombre,precio, stock){
           let values = nombre+"*"+precio+"*"+stock;
           $('#agregar').val(values);
        }

        
</script>
@endsection