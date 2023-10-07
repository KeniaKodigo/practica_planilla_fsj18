@extends('template')

@section('content')
    <h1 class="text-center">Registro de Empleados</h1>

    <form action="" method="post">
        <label for="">Nombre Completo</label>
        <input type="text" class="form-control" name="nombre">

        <label for="">Telefono</label>
        <input type="text" class="form-control" name="telefono">

        <label for="">Salario</label>
        <input type="text" class="form-control" name="salario">

        <label for="">Seleccione un Departamento</label>
        <select name="departamento" id="">

        </select>

        <input type="submit" class="btn btn-dark mt-4" value="Guardar Datos">
    </form>
@endsection