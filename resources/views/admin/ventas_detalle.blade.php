<div class="col-12">
    <div class="row">
        <div class="col-12">
            <center>
                <h3>Computodo</h3>
                <h5><i>"Tecnología a tu alcance"</i></h5>
                <br>
                <p>Calle Inventada No. X. Col. Centro<br>Morelia, Mich. CP: 58970</p>
                <br>	
                <h4>Nota de venta</h4>
                <br>

            </center>

        </div>
        <br><br>
        @php
            $fecha = date('Y-m-d h:i:s',strtotime($venta->fecha));
        @endphp
        <div class="col-6">Fecha: {{$fecha}}</div>
        <div class="col-6">Vendedor: {{$venta->vendedor}}</div>
        <div class="col-12">
           <p><strong>Productos comprados</strong></p> 
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                </tr>   
            </thead>
            

            <br>
            <tbody>
            @foreach ($venta->productos as $p)
            
            <tr>
                <td>{{$p['id']}}</td>
                <td>{{$p['producto']}}</td>
                <td>{{$p['cantidad']}}</td>
                <td colspan="2" style="text-align: end">{{number_format(floatval($p['precio']),2,'.','')}}</th>
            </tr>
            
            @endforeach
            <tr>
                <td colspan="2" style="text-align: end"><strong>Subtotal</strong></td>
                <td style="text-align: end">{{number_format(floatval($venta->subtotal),2,'.','')}}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: end"><strong>IVA</strong></td>
                <td style="text-align: end">{{number_format(floatval($venta->iva),2,'.','')}}</td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: end"><strong>Descuento</strong></td>
                <td style="text-align: end">{{number_format(floatval($venta->descuento),2,'.','')}}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: end"><strong>Total</strong></td>
                <td style="text-align: end">{{number_format(floatval($venta->total),2,'.','')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>