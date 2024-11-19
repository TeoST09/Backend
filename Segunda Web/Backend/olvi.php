<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="../styles/registro.css">
    <link rel="icon" href="../Media/icon.png" type="image/png">
</head>

<body>
    <div class="login-box">
        <h2>Reestablecer Contraseña</h2>
        <form action="" method="post">
            <div class="user-box">
                <input type="email" name="mail" required>
                <label for="mail">Correo Electrónico</label>
            </div>
            <a href="javascript:void(0);" onclick="this.closest('form').submit();">
                <span></span>
                <span></span>
                <span></span>
                <span></span> Enviar
            </a>
        </form>
    </div>
</body>

</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

if (isset($_POST['mail'])) {
    $emai = strip_tags($_POST['mail']);
    $conexion = mysqli_connect('localhost', 'root', '', 'prueba');
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $emai = mysqli_real_escape_string($conexion, $emai);

    $consul = "SELECT * FROM Usuario WHERE Correo='$emai'"; 
    $consulta = mysqli_query($conexion, $consul);

    if ($consulta) {
        if ($consulta->num_rows > 0) {
    }else{
        
    }
}
}

?>
