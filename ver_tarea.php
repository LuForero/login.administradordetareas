<?php
require_once 'cabecera.php';
require_once 'conexion.php';
// Consulta todas las tareas con sus estados
$stmt = $conexion->query("SELECT titulo, estado FROM tareas ORDER BY id DESC");
$tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body class="bg-light">
    <div class="container mt-5 justify-content-center">
        <h2 class="text-center mb-4">Lista de Tareas</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-secondary">
                <tr class="text-center">
                    <th>Título</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($tareas) > 0): ?>
                    <?php foreach ($tareas as $tarea): ?>
                        <tr>
                            <td><?= htmlspecialchars($tarea['titulo']) ?></td>
                            <td class="text-center"><?= htmlspecialchars($tarea['estado']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="text-center text-muted">No hay tareas registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="d-flex y justify-content-center">
        <a href="index.php" class="mt-3 btn btn-secondary bg-primary">Volver</a></div>
    </div>

</body>
<?php
    require_once 'footer.php';
    ?>

</html>