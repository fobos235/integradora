@csrf
<div class="row">
    <input type="hidden" class="form-control" name="vendedor" value="{{Auth::user()->name}}" id="vendedor" >
    
    <div class="col-md-4">
        <div class="form-group">
            <label for="nombre">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>">
            @error('fecha')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <input type="hidden" id="arr_productos" name="arr_productos">
        
    <div class="col-md-5">
        <div class="form-group">
            <label for="marca">Producto</label>
            <input type="text" class="form-control input-lg" id="producto" name="producto" value="" placeholder="Producto" autocomplete="off">
            <div id="productList"></div>
            @error('producto')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <br>
            <button type="button" class="btn btn-primary" id="agregar">Añadir producto</button>
        </div> 
    </div>

    <div class="col-md-12">
        <table class="table" id="venta_tbl">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock max.</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="tbody">
                
            </tbody>
        </table>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="marca">Subtotal</label>
            <input type="text" class="form-control" id="subtotal" name="subtotal"  placeholder="0.00" disabled>
            <input type="hidden" name="h_subtotal" id="h_subtotal" >
            @error('subtotal')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="marca">IVA</label>
            <input type="text" class="form-control" id="iva" name="iva" placeholder="0.00" disabled>
            <input type="hidden" name="h_id" id="h_id" >
            @error('iva')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="marca">Descuento</label>
            <input type="text" class="form-control" id="descuento" name="descuento"  placeholder="0.00" disabled>
            <input type="hidden" name="h_descuento" id="h_descuento" >
            @error('descuento')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="marca">TOTAL</label>
            <input type="text" class="form-control" id="total" name="total" placeholder="0.00" disabled>
            <input type="hidden" name="h_total" id="h_total" >
            @error('total')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>
</div>