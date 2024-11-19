<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>alert('No ha iniciado una sesión!');</script>";
    header('Location: login.html');
    exit();
} else {
    $username = htmlspecialchars($_SESSION['user']);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Web</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="../Media/icon.png" type="image.png">
    <nav>
        <ul>
    <li ><a href="/">Logout</a></li>
    <li><a href="https://discord.gg/n5ckrUxH6G" target="_blank">Contacto</a></li>
    <li><a href="">Usuario</a></li>
        </ul>
        <div class="successs"> <?php echo $username; ?></div>
    </nav>
</head>
<body>
<h2 class="index">Resources MTA</h2>
<div class="card-container">
    <div  class="card">
        <img src="../Media/1.jpng" alt="">
        <h3>Script de Streamer para Tu Servidor de MTA SA: Lua </h3>
        <p class="price">Gratis</p>
        <a class="info-btn" href="../Media/resources/ha_streamer.zip">Descargar</a>
    </div>
    <div  class="card">
        <img src="../Media/Pero.png" alt="">
        <h3>RichPresentMTA Para Discord </h3>
        <p class="price">Gratis</p>
        <a class="info-btn" href="../Media/resources/RichPresenceToMTA.7z">Descargar</a>
    </div>
    <div class="card">
        <img src="../Media/image.png" alt="">
        <h3>Login Adaptado Downtown (Si Funciona se Arreglo el Error del Logueo)</h3>
        <p class="price">6 Dolares</p>
        <a class="price-btn" href="https://discord.gg/2HscprvePU">Comprar</a>
    </div>

   
    <div class="card">
        <img src="../Media/Sound.png" alt="">
        <h3>Sonido de Vehiculos (Original) Y en V2.5 Sonido de Encendido+</h3>
        <p class="price">15 Dolares</p>
        <a class="price-btn" href="https://discord.gg/2HscprvePU">Comprar</a>
    </div>
    <div class="card">
        <img src="../Media/pesca.png" alt="">
        <h3>Trabajo Pescador</h3>
        <p class="price">1 Dolares</p>
        <a class="price-btn" href="https://discord.gg/2HscprvePU">Comprar</a>
    </div>
    <div action="../Backend/Usuario.php" class="card">
        <img src="../Media/consu.png" alt="">
        <h3>Ipb Ver Consumo de Scripts e Resources</h3>
        <p class="price">Gratis</p>
        <a class="info-btn" href="../Media/resources/ipb.zip">Descargar</a>
    </div>
    
    
</div>
</body>
</html>