<?php
$error = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
  if (empty($_POST['username'])) {
    $error .= "Nombre está vacío<br>";
  }
  if (empty($_POST['password'])) {
    $error .= "Contraseña está vacía<br>";
  }
  
  echo $error;
  
  if (empty($error)) {
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    
    $conexion = mysqli_connect('sql102.infinityfree.com', 'if0_37338585', 'vf20vNOxYaF', 'if0_37338585_store');
    
    if (!$conexion) {
      die("Error de conexión: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM usuario WHERE User='" . $username . "'";
    $reg = mysqli_query($conexion, $sql);
    
    if ($reg) {
      $n = mysqli_num_rows($reg);
      if ($n > 0) {
        $u = mysqli_fetch_array($reg);
        
        $hashedPasswordFromDB = $u['Password'];
        if (password_verify($password, $hashedPasswordFromDB)) {
          session_start();
          $_SESSION['user'] = $username; 
          $_SESSION['user_id'] = $u['id']; 
          header('Location: ../Backend/Usuario.php');
          exit();
        } else {
          echo "<script type='text/javascript'>
                  alert('Contraseña incorrecta');
                  setTimeout(function() {
                      window.location.href = '/ini';
                  }, 2000); 
                </script>";
        }
      } else {
        echo "<script type='text/javascript'>
                alert('Usuario no encontrado');
                setTimeout(function() {
                    window.location.href = '/ini';
                }, 2000); 
              </script>";
      }
    } else {
      echo "Error en la consulta: " . mysqli_error($conexion);
    }
    
    mysqli_close($conexion);
  }
} else {
  echo "<script type='text/javascript'>
          alert('Llene los Datos de Logueo');
          setTimeout(function() {
              window.location.href = '/ini';
          }, 2000); 
        </script>";
}
?>
