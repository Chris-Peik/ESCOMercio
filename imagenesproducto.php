<?php
require 'db.php';

try {
    $sql = "INSERT INTO ImagenesProductos (id_producto, url_imagen, es_imagen_principal) 
            VALUES (:id_producto, :url_imagen, :es_imagen_principal)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id_producto' => 2, // ID de un producto existente
        ':url_imagen' => 'https://example.com/imagenes/auriculares.jpg',
        ':es_imagen_principal' => true
    ]);
    echo "Imagen insertada correctamente.";
} catch (PDOException $e) {
    echo "Error al insertar en ImagenesProductos: " . $e->getMessage();
}
