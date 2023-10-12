<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jefe;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //metodo para acceder al inicio de sesion
    public function iniciarSesion(Request $request){
        $usuario = $request->post('correo');
        $password = $request->post('password');

        //select correo, password from jefe where correo = $usuario AND password = $password
        $jefe = Jefe::select('id','nombre','correo','password')->where('correo','=',$usuario)->where('password', '=' ,$password)->get();

        //[] vacio / datos [0]
        /**
         * count => saber el tamano de un arreglo
         * strlen => saber el tamano de un cadena
         */
        if(count($jefe) != 0){
            //creando 2 sesiones
            //2 parametros => 1 (nombre) , 2 (valor)
            foreach($jefe as $value){
                session(['jefe_id' => $value->id]); //1
                session(['jefe_nombre' => $value->nombre]); //juan
                return view('template');
            }
        }else{
            //retornamos a la misma vista login y mandamos una alerta
            return back()->with('error', 'Credenciales Incorrectas');
        }
    }

    public function cerrarSesion(Request $request){
        //destruimos (olvidamos) la informacion de las sesiones
        $request->session()->forget(['jefe_id','jefe_nombre']);
        return redirect('/login');
    }
}
