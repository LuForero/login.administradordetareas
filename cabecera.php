<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div class="collapse navbar-collapse" id="navbarContenido">
        <!-- Enlaces lado izquierdo -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active btn btn text-light" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active btn btn text-light" href="ver_tarea.php">Ver Tareas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active btn btn text-light" href="crear_tarea.php">Crear Tarea</a>
            </li>
        </ul>

        <div class="d-flex ms-auto">
            <?php //if (isset($_SESSION['usuario'])): ?>
                <a href="cerrar_session.php" class="btn btn-outline-light me-2">Cerrar sesión</a>
            <?php //else: ?>
                <a href="form-registro.php" class="btn btn-outline-light me-2">Registro</a>
                <a href="login.php" class="btn btn-outline-light me-2">login</a>
            <?php //endif; ?>
        </div>
    </div>
  
</nav>


<body>