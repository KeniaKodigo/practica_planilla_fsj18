<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departamentos;
use App\Models\Empleados;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function obtenerEmpleadosByJefe(){
        //select * from empleados where id_jefe = session('jefe_id')
        $empleados = Empleados::join('departamento','empleados.id_departamento','=','departamento.id')->join('estado','empleados.id_estado','=','estado.id')->select('empleados.*','departamento.nombre as departamento','estado.estado')->where('empleados.id_jefe','=',session('jefe_id'))->get();

        //return response()->json($empleado);
        $pdf = PDF::loadView('PDF.reporte_empleados', compact('empleados'));
        /**
         * stream() => visualiza el pdf y tiene la opcion de descargar
         * download() => descargar el pdf de inmediato
         */
        return $pdf->stream('lista_empleados_activos.pdf'); //
    }

    //creando el formulario para los departamentos
    public function getDepartamentosReport(){
        $departamentos = Departamentos::all();
        return view('pages.filtrado_departamentos', array("departamentos" => $departamentos));
    }

    public function reporteEmpleadosByDepartamento(Request $request){
        $departamento = $request->post('departamento');
        //select * from empleados where id_departamento = $departamento AND id_jefe = session('jefe_id')

        $empleados = Empleados::join('departamento','empleados.id_departamento','=','departamento.id')->join('estado','empleados.id_estado','=','estado.id')->select('empleados.*','departamento.nombre as departamento','estado.estado')->where('empleados.id_jefe','=',session('jefe_id'))->where('empleados.id_departamento','=', $departamento)->get();

        //return response()->json($empleado);
        $pdf = PDF::loadView('PDF.reporte_empleado_departamento', compact('empleados'));
        /**
         * stream() => visualiza el pdf y tiene la opcion de descargar
         * download() => descargar el pdf de inmediato
         */
        return $pdf->stream('empleados_departamento.pdf'); //

    }
}
