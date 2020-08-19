@php
    var_dump($categorias);
@endphp
@foreach ($categorias as $item)
    <option value="{{$item->nombre}}">{{$item->nombre}}</option>
@endforeach