<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empleados; //require ""
use Illuminate\Http\Request;

class empleadosController extends Controller
{
    //metodos 

    //metodo para retornar los empleados activos de la bd
    public function index(){
        //DB::table('users')->get(); (queryBuilder)
        //select * from users

        //ORM SQL (mapeo objeto-relacional) consultas mapeadas
        //all() => select * from table
        //insert into => save()
        //update()

        //all(), save(), update(), delete(), find() => select * from table where id = ?
        //Empleados::all(); //select * from empleados
        //select * from empleados where id_estado = 1
        $empleados = Empleados::select('*')->where('id_estado','=',1)->get();
        return view('pages.lista_empleados', array("empleado" => $empleados));
    }
}
