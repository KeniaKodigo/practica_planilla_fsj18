<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departamentos;
use App\Models\Empleados; //require ""
use Illuminate\Http\Request;
use Illuminate\Support\Facades\BD;

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


    #metodo para obtener la vista del formulario de registros y los departamentos
    public function getFormulario(){
        //select * from departamentos => all()
        //select nombre from departamentos where id = 2
        //Departamentos::select('nombre')->where('id','=',2)->get();
        $departamentos = Departamentos::all();
        return view('pages.registrar_empleado', array("departamentos" => $departamentos));
    }

    #metodo para guardar al empleado en la bd
    public function store(Request $request){
        //insert into table (campos) values (valores) => save()

        //instancia (crear objetos)
        $empleado = new Empleados();
        $empleado->nombre = $request->post('nombre'); //kenia
        $empleado->telefono = $request->post('celular');
        $empleado->salario = $request->post('salario');
        $empleado->id_departamento = $request->post('departamento');
        $empleado->id_jefe = 1; 
        $empleado->id_estado = 1;
        $empleado->save();

        #redireccionamos a la url de la vista lista_empleados
        return redirect('/empleados_activos');
    }

    //select * from empleados where id = ? => find(?)
}
