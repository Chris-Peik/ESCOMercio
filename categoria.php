<?php
require 'db.php';

try {
    $sql = "INSERT INTO Categorias (nombre, descripcion) 
            VALUES (:nombre, :descripcion)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => 'Servicios',
        ':descripcion' => 'Trabajos realizados por la comunidad.'
    ]);
    echo "Categoría insertada correctamente.";
} catch (PDOException $e) {
    echo "Error al insertar en Categorías: " . $e->getMessage();
}
