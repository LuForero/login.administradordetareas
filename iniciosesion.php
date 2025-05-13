<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Encabezado con botones a la derecha -->
    <nav class="navbar navbar-expand-lg navbar-light bg-ligth">
        <div class="container-fluid">
            <div class="d-flex ms-auto">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <a href="logout.php" class="btn btn-outline-danger">Cerrar sesión</a>
                <?php else: ?>
                   <!-- <a href="registrar.php" class="btn btn-outline-secundary me-2">Registro</a>
                    <a href="login.php" class="btn btn-outline-secundary">login</a> -->
                <?php endif; ?>
            </div>
        </div>
    </nav>
</body>

</html>