<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta username="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="../Media/icon.png" type="image.png">
</head>
<body>

<div class="form-container">
    <h2>Registro</h2>
    <form action="../Backend/registro.php" method="POST">
        <div class="input-group">
            <label for="username">Usuario</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="emai" required>
        </div>
        <div class="input-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="input-group">
            <label for="confirm_password">Confirmar Contraseña</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <input type="submit" class="btn" name="enviar" value="Registrarse">
    </form>
</div>

</body>
</html>

<?php
$error = "";
if (isset($_POST['username']) && isset($_POST['emai']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
  if (empty($_POST['username'])) {
    $error .= "<div class='error'>El Nombre está vacío</div><br>";
  }
  if (empty($_POST['emai'])) {
    $error .= "<div class='error'>El Correo está vacío</div><br>";
  } 
  if (empty($_POST['password'])) {
    $error .= "<div class='error'>La Contraseña está vacía</div><br>";
  }
  if (empty($_POST['confirm_password'])) {
    $error .= "<div class='error'>La Confirmación de Contraseña está vacía</div><br>";
  }
  

  if ($_POST['password'] !== $_POST['confirm_password']) {
    $error .= "<div class='error'>Las contraseñas no coinciden</div><br>";
  }
  

  if (!empty($error)) {
    echo $error;
  } else {

    $username = strip_tags($_POST['username']);
    $emai = strip_tags($_POST['emai']);
    $password = strip_tags($_POST['password']);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM usuario WHERE correo='" . $emai . "' OR User='" . $username . "'";
    
    $conexion = mysqli_connect('sql102.infinityfree.com', 'if0_37338585', 'vf20vNOxYaF', 'if0_37338585_store');
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    $reg = mysqli_query($conexion, $sql);
    
    if ($reg) {
      $n = mysqli_num_rows($reg);
      
      if ($n > 0) {
        echo "<div class='error'>El Usuario ya está registrado</div>";
      } else {  
        $insert = "INSERT INTO usuario (User, correo, password) VALUES ('" . $username . "', '" . $emai . "', '" . $hashedPassword . "')";
        $rins = mysqli_query($conexion, $insert);
        
        if ($rins) {
          echo "<div class='success'>Usuario Registrado OK</div>";
                header('Location: ../Backend/login.html');
        } else {
          echo "<div class='error'>Error al registrar el usuario</div>";
        }
      }
    } else {
      echo "<div class='error'>Error en la conexión</div>";
    }
    
    mysqli_close($conexion);
  }
} else {
  echo "";
}
?>
