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
        <div class="col-6">Fecha: {{$venta->fecha->toDateTime()->format('Y-m-d h:i:s')}}</div>
        <div class="col-6">Vendedor: {{$venta->vendedor}}</div>
        <div class="col-12">
           <p><strong>Productos comprados</strong></p> 
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                </tr>   
            </thead>
            

            <br>
            <tbody>
            @foreach ($venta->producto as $p)
            <tr>
                <td>{{$p['nombre']}}</td>
                <td>{{$p['cantidad']}}</td>
                <td colspan="2" style="text-align: end">{{floatval($p['precio'])}}</th>
            </tr>
            
            @endforeach
            <tr>
                <td colspan="2" style="text-align: end"><strong>Subtotal</strong></td>
                <td style="text-align: end">{{floatval($venta->subtotal)}}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: end"><strong>IVA</strong></td>
                <td style="text-align: end">{{floatval($venta->iva)}}</td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: end"><strong>Descuento</strong></td>
                <td style="text-align: end">{{floatval($venta->descuento)}}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: end"><strong>Total</strong></td>
                <td style="text-align: end">{{floatval($venta->total)}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>