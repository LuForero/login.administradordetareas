<?php
require 'conexion.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexion->prepare("DELETE FROM tareas WHERE id = :id");
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        header('Location: index.php?mensaje=tarea_eliminada');
    } else {
        header('Location: index.php?error=eliminar_tarea');
    }
} else {
    header('Location: index.php');
    exit();
}
