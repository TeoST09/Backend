<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../styles/registro.css">
    <link rel="icon" href="../Media/icon.png" type="image.png">
</head>

<body>
    <div class="login-box">
        <h2>Registro</h2>
        <form action="" method="POST">
            <div class="user-box">
                <input name="username" type="text" required>
                <label for="">Nombre de Usuario</label>
            </div>
            <div class="user-box">
                <input name="emai" type="email" required>
                <label for="">Correo Electrónico</label>
            </div>
            <div class="user-box">
                <input name="password" type="password" required>
                <label for="">Contraseña</label>
            </div>
            <div class="user-box">
                <input name="confirm_password" type="password" required>
                <label for="">Confirme la Contraseña</label>
            </div>
            <a href="javascript:void(0);" onclick="this.closest('form').submit();">
                <span></span>
                <span></span>
                <span></span>
                <span></span>Registrarse
            </a>
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
    echo "<script type='text/javascript'>
            alert('No Coinciden las Contraseñas');
            setTimeout(function() {
                window.location.href = '/regis';
            }, 1000); 
          </script>";
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
        echo "<script type='text/javascript'>
                alert('El Usuario ya está Registrado');
                setTimeout(function() {
                    window.location.href = '/regis';
                }, 1000);
              </script>";
      } else {  
        $insert = "INSERT INTO usuario (User, correo, password) VALUES ('" . $username . "', '" . $emai . "', '" . $hashedPassword . "')";
        $rins = mysqli_query($conexion, $insert);
        
        if ($rins) {
          echo "<script type='text/javascript'>
                  alert('Usuario Registrado con Éxito');
                  setTimeout(function() {
                      window.location.href = '/ini';
                  }, 1000);
                </script>";
        } else {
          echo "<script type='text/javascript'>
                  alert('Error al Registrar Usuario');
                  setTimeout(function() {
                      window.location.href = '/regis';
                  }, 1000);
                </script>";
        }
      }
    } else {
      echo "<div class='error'>Error en la conexión</div>";
    }
    
    mysqli_close($conexion);
  }
} else {
  echo"";
}
?>
