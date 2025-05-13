
<?php
require 'conexion.php';

$sentencia = $conexion->prepare("SELECT * FROM tareas ORDER BY id DESC");
$sentencia->execute();
$tareas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>