<?php
require 'db.php';

try {
    $sql = "INSERT INTO Vendedores (id_usuario, nombre_negocio, descripcion_negocio, estado_verificacion, id_administrador_alta) 
            VALUES (:id_usuario, :nombre_negocio, :descripcion_negocio, :estado_verificacion, :id_administrador_alta)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id_usuario' => 8, // ID de un usuario existente
        ':nombre_negocio' => 'Zorriana',
        ':descripcion_negocio' => 'Tienda de productos setsuales.',
        ':estado_verificacion' => true,
        ':id_administrador_alta' => 5,
    ]);
    echo "Vendedor insertado correctamente.";
} catch (PDOException $e) {
    echo "Error al insertar en Vendedores: " . $e->getMessage();
}
