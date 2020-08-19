@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nombre">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>">
            @error('fecha')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>
        
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
            <button type="submit" class="btn btn-primary" id="agregar">Añadir producto</button>
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
            <input type="text" class="form-control" id="subtotal" name="subtotal" value="" placeholder="0.00" disabled>
            @error('subtotal')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="marca">IVA</label>
            <input type="text" class="form-control" id="iva" name="iva" value="" placeholder="0.00" disabled>
            @error('iva')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="marca">Descuento</label>
            <input type="text" class="form-control" id="descuento" name="descuento" value="" placeholder="0.00" disabled>
            @error('descuento')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="marca">TOTAL</label>
            <input type="text" class="form-control" id="total" name="total" value="" placeholder="0.00" disabled>
            @error('total')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>
</div>