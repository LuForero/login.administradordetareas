<?php
require 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_limite = $_POST['fecha_limite'];
    $estado = $_POST['estado'];
    $stmt = $conexion->prepare("UPDATE tareas SET titulo = :titulo, descripcion = :descripcion,fecha_limite = :fecha_limite, estado = :estado WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':fecha_limite', $fecha_limite);
    $stmt->bindParam(':estado', $estado);
    if ($stmt->execute()) {
        header('Location: index.php?mensaje=tarea_actualizada');
    } else {
        header('Location: editar_tarea.php?id=' . $id . '&error=actualizar_tarea');
    }
} else {
    header('Location: index.php');
    exit();
}
