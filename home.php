<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h1>
<a href="logout.php">Cerrar sesión</a>
