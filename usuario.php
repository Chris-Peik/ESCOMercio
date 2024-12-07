<?php
require 'db.php';

try {
    $sql = "INSERT INTO Usuarios (nombre, apellido, email, contrasena, nivel_acceso) 
            VALUES (:nombre, :apellido, :email, :contrasena, :nivel_acceso)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => 'Perenganito',
        ':apellido' => 'Juarez',
        ':email' => 'aaaaaaa@example.com',
        ':contrasena' => password_hash('33333', PASSWORD_BCRYPT),
        ':nivel_acceso' => 1
    ]);

    echo "Usuario insertado correctamente.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
