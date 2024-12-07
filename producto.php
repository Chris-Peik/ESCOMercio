<?php
require 'db.php';

try {
    $sql = "INSERT INTO Productos (id_vendedor, id_categoria, nombre, descripcion, precio, stock, estado) 
            VALUES (:id_vendedor, :id_categoria, :nombre, :descripcion, :precio, :stock, :estado)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id_vendedor' => 1, // ID de un vendedor existente
        ':id_categoria' => 1, // ID de una categoría existente
        ':nombre' => 'Auriculares Bluetooth',
        ':descripcion' => 'Auriculares con conexión Bluetooth y cancelación de ruido.',
        ':precio' => 59.99,
        ':stock' => 100,
        ':estado' => true
    ]);
    echo "Producto insertado correctamente.";
} catch (PDOException $e) {
    echo "Error al insertar en Productos: " . $e->getMessage();
}
