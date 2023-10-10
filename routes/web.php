<?php

use App\Http\Controllers\empleadosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('template');
});

/** (/) => index */

//ruta para probar una vista (get, post, put, delete)
// Route::get('/prueba', function () {
//     return view('pages.lista_empleados');
// });

//llamamos el metodo index() del controlador empleadosController
Route::get('/empleados_activos', [empleadosController::class, 'index']);
//url() / route()
Route::get('/formulario', [empleadosController::class, 'getFormulario'])->name('formularioRegistro');

Route::post('/registrarEmp', [empleadosController::class, 'store'])->name('guardar.empleados');

