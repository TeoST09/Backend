<?php
// Iniciar la sesión
session_start();

// Eliminar todas las variables de sesión
$_SESSION = [];

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio o inicio de sesión
header("Location: /ini"); // Cambia 'login.php' por la página que desees
exit;
?>
