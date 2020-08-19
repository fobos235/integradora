<?php

namespace App\Http\Controllers\admin;

use App\Venta;
use App\Productos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ventasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*Creamos un objeto de tipo usuario y utilizamos el método get() 
         para recuperar los datos de consulta en una variable */
        $ventas= Venta::get();
        
        //Retornamos la vista al usuario y enviamos a la vista como parámetro los datos que recuperamos
        return view('admin\ventas_lista', ['ventas'=>$ventas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //llamamos la vista para registrar una venta
        return view('admin\ventas_create',['venta'=> new Venta()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validamos los campos agregando el numero de caracteres permitido en cada uno
        $request->validate([
            'producto' => 'required',
            'fecha' => 'required',
            'subtotal' => 'required',
            'total' => 'required',
            'iva' => 'required',
            ]);
           
        //Objeto de la clase Usuario
        $ventas = new Venta;

        /*Aqui indicamos cada atributo del objeto los valores recuperados del formulario de venta*/

        $ventas->fecha = $request->fecha;
        $ventas->subtotal = $request->subtotal;
        $ventas->total = $request->total;
        $ventas->descuento = $request->descuento;
        $ventas->iva = $request->iva;

        //NO ESTA TERMINADO PORQUE FALTAN LOS PRODUCTOS

        /*Ahora almacenamos los datos del objeto en nuestra tabla de ventas*/
        $ventas->save();
        
        //Nos regresa al formulario con un mensaje y utilizamos el parametro status para hacerlo
        return back()->with('status','Venta con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
