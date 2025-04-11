<?php
require_once 'database/conexion.php'; // Incluye la clase

$db = new Database();                 // Crea una instancia
$conexion = $db->getConnection();    // Llama al método
var_dump($conexion);                 // Imprime la conexión para comprobarla