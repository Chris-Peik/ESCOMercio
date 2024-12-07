<?php
// Configuración de conexión a la base de datos
$host = 'localhost';
$dbname = 'fepi';
$user = 'root';
$password = '';

try {
    // Crear una instancia de PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Configurar el manejo de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Mostrar error si la conexión falla
    die("Error de conexión: " . $e->getMessage());
}
