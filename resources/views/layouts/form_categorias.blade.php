@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre',$categoria->nombre)}}" placeholder="Nombre">
            @error('nombre')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="status">Categoría</label>
            <select name="status" class="form-control" id="status">
                <option disabled>Seleccione...</option>
                <option value="activo" @if (old('status') == 'activo'|| $categoria->status == 'activo')
                    selected
                @endif>Activo</option>
                <option value="inactivo" @if (old('status') == 'inactivo' || $categoria->status == 'inactivo')
                    selected
                @endif >Inactivo</option>
            </select>
            @error('status')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div> 
    </div>
</div>