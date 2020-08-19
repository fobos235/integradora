<?php

namespace App\Http\Controllers\admin;

use App\Categorias;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoPost;
use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

class categoriasController extends Controller
{
    public function index()
    {   
        $categorias = Categorias::get();
        return view('admin\categorias_lista', ['categorias' => $categorias]);
    }

    public function create(){
        return view('admin\categorias_create', ['categoria' => new Categorias()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3',
            'descripcion' => '',
            'estado' => 'required'
        ]);
        $categoria = new Categorias();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->estado = $request->estado;
        $categoria->save();
        
        return Redirect::to(route('categorias.index'))->with('status', 'Categoria creada');
    }

    public function show($id){
        
    }
    public function edit($id){
        $categoria = Categorias::findOrFail($id);
        return view('admin\categorias_edit', ['categoria' => $categoria]);

    }
    public function update(StoreCategoPost $request, $id){
        $request->validated();
        $categoria = Categorias::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->estado = $request->estado;
        $categoria->update();
        
        return Redirect::to(route('categorias.index'))->with('status','Categoría actualizada');
    }
    public function destroy($id){
        $categoria = Categorias::findOrFail($id);
        $categoria->delete();
        return back()->with('status', 'Categoria eliminada');
    }

    
}


