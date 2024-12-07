<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        try {
            // Verificar usuario
            $sql = "SELECT * FROM Usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['contrasena'])) {
                // Guardar datos en sesión
                $_SESSION['id_usuario'] = $user['id_usuario'];
                $_SESSION['nombre'] = $user['nombre'];

                header("Location: home.php");
                exit();
            } else {
                echo "Credenciales incorrectas.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
}
?>

<form method="POST" action="">
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit">Iniciar sesión</button>
</form>
Aun sin cuenta? <a href='register.php'>Registrate</a>