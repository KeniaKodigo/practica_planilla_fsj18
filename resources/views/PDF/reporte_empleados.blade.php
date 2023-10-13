@php
    session();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    p {
        text-align: center;
    }
</style>
<body>
    <h1 class="text-center text-primary">Lista de Empleados</h1>
    <p>
        <strong>Jefe:</strong> {{session('jefe_nombre')}}
    </p>

    <table class="mt-4 table">
        <thead>
            <th>Empleado</th>
            <th>Salario</th>
            <th>Departamento</th>
            <th>Estado</th>
        </thead>
        <tbody>
            @foreach ($empleados as $item)
                <tr>
                    <td>{{$item->nombre}}</td>
                    <td>${{$item->salario}}</td>
                    <td>{{$item->departamento}}</td>
                    <td>{{$item->estado}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>