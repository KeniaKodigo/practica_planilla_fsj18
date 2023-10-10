@extends('template')

@section('content')
    <h1 class="text-center">Registro de Empleados</h1>

    <form id="formularioRegistro" action="{{ route('guardar.empleados') }}" method="POST">
        <!-- asignacion de un token para hacer el envio -->
        @csrf
        <label for="">Nombre Completo</label>
        <input type="text" class="form-control" name="nombre">

        <label for="">Telefono</label>
        <input type="text" class="form-control" name="celular">

        <label for="">Salario</label>
        <input type="text" class="form-control" name="salario">

        <label for="">Seleccione un Departamento</label>
        <select name="departamento" id="" class="form-control">
            @foreach ($departamentos as $depart)
                <option value="{{$depart->id}}">{{$depart->nombre}}</option>
            @endforeach
        </select>

        <input type="submit" class="btn btn-dark mt-4" value="Guardar Datos">
    </form>
@endsection

@section('scripts')
<script>
    //llamando al formulario para mostrar alerta con Jquery
    $('#formularioRegistro').on('submit', function(e) {
        e.preventDefault();
        Swal.fire({
        title: 'Do you want to save the changes?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            Swal.fire('Saved!', '', 'success')
            //accionamos para que la informacion se vaya a la bd
            this.submit();
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
        })
    })
</script>

@endsection