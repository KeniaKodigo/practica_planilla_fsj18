<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Perfil Jefe</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#"><i class='bx bxs-user-circle'></i> Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('/empleados_activos') }}"><i class='bx bxs-book-content'></i> Empleados</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class='bx bxs-report' style='color:#ffffff' ></i> Reportes
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Empleados</a></li>
            <li><a class="dropdown-item" href="#">Empleados por departamento</a></li>
        </ul>
        </li>
    </ul>
    </div>
</div>
</nav>