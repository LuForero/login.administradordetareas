<?php 
//conexión con la base de datos MySQL
$servidor = "localhost:8889";
$usuario = "root";
$password = "root";
$baseDeDatos = "to-do-list";

try {
$conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $password);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Conexión exitosa a la base de datos $baseDeDatos.";
} catch(PDOException $e) {
echo "Error de conexión: " . $e->getMessage();
}