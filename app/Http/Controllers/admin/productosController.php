<?php

namespace App\Http\Controllers\admin;

use App\Productos;
use App\Categorias;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductoPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class productosController extends Controller
{
    public function index()
    {
        
        $productos = Productos::orderBy('nombre','asc')->get();
        return view('admin\productos_lista',['productos'=> $productos]);
    }


    public function create()
    {   
        $categorias = Categorias::where('estado','activo')->get(); 
        return view('admin\productos_create', ['producto' => $producto = new Productos(), 'categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:50',
            'marca' => 'required',
            'modelo' => 'required|min:3',
            'precio' => 'required',
            'stock' => 'required',
            'categoria' => 'required'
        ]);

        $producto = new Productos;
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->modelo = $request->modelo;
        $producto->precio = doubleval($request->precio);
        $producto->descripcion = $request->descripcion;
        $producto->stock = intval($request->stock);
        $producto->categoria = $request->categoria;

        $producto->save();
        return back()->with('status','Producto registrado con exito');
    }

    public function edit($id)
    {
        $producto = Productos::findOrFail($id);
        $categorias = Categorias::get()->where('estado','activo');
        return view('admin\productos_edit',['producto'=>$producto, 'categorias' => $categorias]);

    }

    public function update(StoreProductoPost $request, $id)
    {
        $producto = Productos::findOrFail($id);
        $producto->update($request->validated());
        return Redirect::to(route('productos.index'))->with('status', 'Producto actualizado');
    }
    
    public function show($id)
    {
        $producto = Productos::findOrFail($id);
        $categorias = Categorias::get()->where('estado','activo');
        return view('admin\ver_producto', ['producto' => $producto, 'categorias' => $categorias]);
    }
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();
        return back()->with('status','Producto eliminado');
    }

}
