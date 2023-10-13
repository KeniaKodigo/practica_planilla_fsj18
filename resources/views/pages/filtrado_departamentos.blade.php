@extends('template')

@section('content')
    <h1 class="text-center">Reporte de Empleados por Departamento</h1>

    <form action="{{ route('reporte.filtrado') }}" method="POST">
        @method('GET')
        <label for="">Seleccione un Departamento</label>
        <select name="departamento" id="" class="form-control">
            @foreach ($departamentos as $depart)
                <option value="{{$depart->id}}">{{$depart->nombre}}</option>
            @endforeach
        </select>

        <input type="submit" class="btn btn-dark mt-4" value="Generar Reporte">
    </form>
@endsection