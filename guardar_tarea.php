<?php //logica tarea
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_limite = $_POST['fecha_limite'];
    $estado = $_POST['estado'];

    $nombreImagen = "";
    $rutaImagen = "";

    // Verifica si se sube una imagen
if (!empty($_FILES["imagen"]["name"])) {
    $nombreArchivo = basename($_FILES["imagen"]["name"]);
    $fecha = new DateTime();
    $nombreImagen = $fecha->getTimestamp() . "_" . $nombreArchivo;

    $tmpImagen = $_FILES["imagen"]["tmp_name"];
    $rutaDestino = "img/";

    // Crear la carpeta si no existe
    if (!is_dir($rutaDestino)) {
        mkdir($rutaDestino, 0777, true);
    }

    // Mover el archivo subido
    if (move_uploaded_file($tmpImagen, $rutaDestino . $nombreImagen)) {
        // Definir la ruta absoluta, incluyendo la carpeta 'img' en la ruta de la base de datos
        $rutaImagen = "img/" . $nombreImagen;  // Aquí se incluye 'img/' antes del nombre de la imagen
    }
}

    $stmt = $conexion->prepare("INSERT INTO tareas (titulo, descripcion, fecha_limite, estado, imagen, ruta_imagen) VALUES (:titulo, :descripcion, :fecha_limite, :estado, :imagen, :ruta_imagen)");
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':fecha_limite', $fecha_limite);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':imagen', $nombreImagen);
    $stmt->bindParam(':ruta_imagen', $rutaImagen);

    if ($stmt->execute()) {
        header('Location: index.php?mensaje=tarea_creada');
    } else {
        header('Location: crear_tarea.php?error=guardar_tarea');
    }
} else {
    header('Location: index.php');
    exit();
}

?>