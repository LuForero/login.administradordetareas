<?php
require_once 'cabecera.php';

?>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Crear Nueva Tarea</h1>
        <form action="guardar_tarea.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título de la Tarea</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="fecha_limite" class="form-label">Fecha Límite</label>
                <input type="date" class="form-control" id="fecha_limite" name="fecha_limite">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado">
                    <option value="Pendiente" selected>Pendiente</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Completada">Completada</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" required>
            </div>
            <button type="submit" class="btn btn-primary bg-danger">Guardar Tarea</button>
            <a href="index.php" class="btn btn-secondary bg-primary">Volver</a>
        </form>
    </div>
    <?php
    require_once 'footer.php';
    ?>