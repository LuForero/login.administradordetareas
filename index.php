<?php
require_once 'cabecera.php'; // manera de importar archivos en php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    // Si no hay sesión, redirigir al usuario a la página de login
    header("Location: login.php");
    exit();
}
?>


<body>
    <div class="container mt-5">
        <center>
            <h1>Administrador de Tareas</h1>
        </center>

        <div class="input-group input-group-sm w-50 mb-3">
            <input type="text" id="buscador" class="form-control" placeholder="Buscar">
            <button class="btn btn-primary" type="button" onclick="filtrarTabla()">Buscar</button>
        </div>
        <script>
            function filtrarTabla() {
                let filtro = document.getElementById('buscador').value.toLowerCase();
                let filas = document.querySelectorAll("table tbody tr");

                filas.forEach(fila => {
                    let textoFila = fila.innerText.toLowerCase();
                    fila.style.display = textoFila.includes(filtro) ? '' : 'none';
                });
            }
        </script>


        <?php
        require 'conexion.php'; //linkear la hoja de conexion.php
        require 'listar_tarea.php';
        ?>

        <?php
        $contador = ['Pendiente' => 0, 'En proceso' => 0, 'Completada' => 0];
        ?>

        <div class="container card shadow-sm p-3 mt-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0">Listado de Tareas</h5>
            </div>

            <table id="tablaTareas" class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha Límite</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($tareas as $tarea): ?>
                        <tr>
                            <td><?= htmlspecialchars($tarea['id']) ?></td>
                            <td><?= htmlspecialchars($tarea['titulo']) ?></td>
                            <td><?= htmlspecialchars($tarea['descripcion']) ?></td>
                            <td><?= htmlspecialchars($tarea['fecha_limite']) ?></td>
                            <td>
                                <form method="post" action="actualizar_estado.php" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $tarea['id'] ?>">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="completada" value="Completada"
                                            <?= $tarea['estado'] === 'Completada' ? 'checked' : '' ?>
                                            onchange="this.form.submit()">
                                        <label class="form-check-label"><?= htmlspecialchars($tarea['estado']) ?></label>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <?php if (!empty($tarea['ruta_imagen'])): ?>
                                    <a target="_blank" href="<?= htmlspecialchars($tarea['ruta_imagen']) ?>">
                                        <img src="<?= htmlspecialchars($tarea['ruta_imagen']) ?>" width="100" alt="Imagen">
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted">Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="editar_tarea.php?id=<?= $tarea['id'] ?>" class="btn btn-sm btn-primary mb-1">Editar</a>
                                <a href="eliminar_tarea.php?id=<?= $tarea['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">Eliminar</a>
                            </td>
                        </tr>
                        <?php $contador[$tarea['estado']]++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Contador de tareas por estado -->
            <div class="mt-3">
                <strong>Contador de Tareas por Estado</strong><br>
                <?php foreach ($contador as $estado => $cantidad): ?>
                    <?= htmlspecialchars($estado) ?>: <?= $cantidad ?><br>
                <?php endforeach; ?>
            </div>
        </div>


        <?php
        require_once 'footer.php';
        ?>