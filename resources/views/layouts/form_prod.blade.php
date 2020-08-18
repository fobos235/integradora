@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre',$producto->nombre)}}" placeholder="Nombre">
            @error('nombre')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>
        
    <div class="col-md-3">
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" value="{{old('marca',$producto->marca)}}" placeholder="Marca">
            @error('marca')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="{{old('modelo',$producto->modelo)}}" placeholder="Modelo">
            @error('modelo')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>


    <div class="col-md-2">
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="{{old('precio',$producto->precio)}}" placeholder="0.00">
            @error('precio')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="stock">Cantidad</label>
            <input type="number" class="form-control" id="stock" name="stock" min="0" value="{{old('cantidad',$producto->stock)}}" placeholder="0">
            @error('stock')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col-md-7">
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion',$producto->descripcion)}}" placeholder="Descripcion">
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <select name="categoria" class="form-control" id="categoria">
                <option disabled @if(!old('categoria') || !$producto->categoria)
                selected
                @endif>Seleccione...</option>
                @foreach ($categorias as $item)
                    <option value="{{$item->nombre}}" @if(old('categoria') == $item->nombre || $producto->categoria == $item->nombre)
                        selected
                        @endif>{{$item->nombre}}</option>
                @endforeach
               
            </select>

            
            @error('categoria')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>
</div>


               