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
        /*$request->validate([
            'arr_productos' => 'required',
            'fecha' => 'required',
            'subtotal' => 'required',
            'total' => 'required',
            'iva' => 'required',
            ]);*/
           
        //Objeto de la clase Usuario
        $ventas = new Venta;

        /*Aqui indicamos cada atributo del objeto los valores recuperados del formulario de venta*/

        $ventas->fecha = $request->fecha;
        $ventas->subtotal = $request->subtotal;
        $ventas->total = $request->total;
        $ventas->productos = $request->arr_productos;
        $ventas->descuento = $request->descuento;
        $ventas->iva = $request->iva;

        echo $ventas->fecha;
        echo $ventas->subtotal;
        echo $ventas->total = $request->total;
        echo $ventas->productos;
        echo $ventas->descuento;
        echo $ventas->iva;



        //NO ESTA TERMINADO PORQUE FALTAN LOS PRODUCTOS

        /*Ahora almacenamos los datos del objeto en nuestra coleccion de ventas con la función save()*/
        //$ventas->save();
        
        //Nos regresa al formulario con un mensaje y utilizamos el parametro status para hacerlo
        //return back()->with('status','Venta con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return view('admin\ventas_detalle', ['venta' => $venta]);
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

    /*Este método nos sirve para comprobar coincidencias de información en la base de datos, 
    dando como parametro el request y si encuentra coincidencias arroja la variable output que es usada 
    después para el buscador ajax*/

    public function fetch(Request $request)
    {
        if($request->get('query')){
            $query = $request->get('query');
            $data = Productos::where('nombre', 'LIKE', '%'.$query.'%')->get();
                    $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                    foreach($data as $row)
                    {
                        $output .= "
                        <li class='col-12 product-info' onclick='agregar(\"$row->nombre\", $row->precio, $row->stock)'><a href='#' data-info='".$row->nombre."*".$row->precio."*".$row->stock."'>".$row->nombre."</a></li>
                        ";
                    }
              $output .= '</ul>';
      return $output;
     }
    }
}
