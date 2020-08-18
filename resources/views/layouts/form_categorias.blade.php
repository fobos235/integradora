@csrf
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre',$categoria->nombre)}}" placeholder="Categoria">
            @error('nombre')
                <small class="text-danger">{{$message}}</small>
            @enderror

        </div>
        
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{old('descripcion',$categoria->descripcion)}}" placeholder="Descripción">
            @error('descripcion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
       
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="estado">Status</label>
            <select name="estado" class="form-control" id="estado">
                <option disabled @if (!old('estado') || !$categoria->estado)
                    selected
                @endif>Seleccione...</option>
                <option value="activo" @if (old('estado') == 'activo'|| $categoria->estado == 'activo') selected @endif>Activo</option>
                <option value="inactivo" @if (old('estado') == 'inactivo' || $categoria->estado == 'inactivo') selected @endif >Inactivo</option>
            </select>
            @error('estado')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>
</div>