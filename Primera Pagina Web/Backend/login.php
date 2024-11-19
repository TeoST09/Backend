<?php
$error = "";
if (isset($_POST['username']) && isset($_POST['password'])) {
  if (empty($_POST['username'])) {
    $error = "Nombre esta vacio<br>";
  }
  if (empty($_POST['password'])) {
    $error = "Email esta vacio<br>";
  }
 echo $error;
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $sql="Select * from usuario where User='" .$username."'";
  echo $sql;
  $conexion = mysqli_connect('sql102.infinityfree.com', 'if0_37338585', 'vf20vNOxYaF', 'if0_37338585_store');
  $reg=mysqli_query($conexion,$sql);
  if ($reg) {
    $n=mysqli_num_rows($reg);
    if($n>0){
        $u=mysqli_fetch_array($reg);
        if (password_verify($password, $hashedPassword)) {
          echo "Inicio de sesión exitoso.";
          session_start();
          $_SESSION['user']=$username;
          header('location:/usuario');
      } else {
          echo "Contraseña incorrecta.";
      }
  } else {
      echo "Usuario no encontrado.";
  }


  }
  mysqli_close($conexion);
}else{
    echo "no Datos";
}




?>