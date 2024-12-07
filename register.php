<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validación básica
    if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($password)) {
        try {
            // Cifrar la contraseña
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insertar usuario
            $sql = "INSERT INTO Usuarios (nombre, apellido, email, contrasena, nivel_acceso, estado) 
                    VALUES (:nombre, :apellido, :email, :contrasena, :nivel_acceso, :estado)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':email' => $email,
                ':contrasena' => $hashedPassword,
                ':nivel_acceso' => 1, // Nivel de acceso predeterminado
                ':estado' => true
            ]);

            echo "Usuario registrado con éxito. <a href='login.php'>Iniciar sesión</a>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
}
?>

<form method="POST" action="">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>
    <label>Apellido:</label><br>
    <input type="text" name="apellido" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit">Registrar</button>
</form>
Ya tienes una cuenta? <a href='login.php'>Inicia Sesion</a>