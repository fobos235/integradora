<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioPost;

class usuariosController extends Controller
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
        $usuarios= User::get();

        //Retornamos la vista al usuario y enviamos a la vista como parámetro los datos que recuperamos

        return view('admin\usuarios_lista',['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //llamamos la vista para registrar usuarios
        return view('admin\usuarios_create', ['usuario'=> new User()]);

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
            'nombre' => 'required|min:3|max:50',
            'correo' => 'required|min:4|max:50',
            'password' => 'required|max:30',
            ]);
           
        //Objeto de la clase Usuario
        $user = new User;

        /*Aqui indicamos cada atributo del objeto los valores recuperados del formulario*/

        $user->name = $request->nombre;
        $user->email = $request->correo;
        $user->password = $request->password;

        /*Ahora almacenamos los datos del objeto en nuestra tabla users*/

        $user->save();
        
        //Nos regresa al formulario con un mensaje y utilizamos el parametro status para hacerlo
        return back()->with('status','Usuario registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*Creamos un objeto de usuario y utilizamos la función finorfail() que nos permite consultar de forma 
        automática al usuario o arrajarnos una ventana vacía en caso de no encontrarlo*/
        $user=User::findOrFail($id);

        //Retornamos a la vista para ver el usuario junto con los datos de usuario mediante una variable
        return view('admin\ver_usuario',['usuario'=>$user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*Creamos un objeto de usuario y utilizamos la función finorfail() que nos permite consultar de forma 
        automática al usuario o arrajarnos una ventana vacía en caso de no encontrarlo*/
        $user=User::findOrFail($id);

        //Retornamos a la vista para ver el usuario junto con los datos de usuario mediante una variable
        return view('admin\usuarios_edit',['usuario'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUsuarioPost $request, $id)
    {
        /*Creamos un objeto de usuario y utilizamos la función finorfail() que nos permite consultar de forma 
        automática al usuario o arrajarnos una ventana vacía en caso de no encontrarlo*/
        $user=User::findOrFail($id);

        $user->update($request->validated());
        //Retornamos a la vista de usuarios junto con un mensaje de que hemos editado el usuario
        return Redirect::to(route('usuarios.index'))->with('status', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('status','Usuario eliminado con éxito');
    }
}
