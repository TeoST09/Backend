<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>alert('No ha iniciado una sesión!');</script>";
    header('Location: /ini');
}
$username = htmlspecialchars($_SESSION['user']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Store Mta</title>
    <link rel="stylesheet" href="../styles/inicio.css">
    <link rel="icon" href="../Media/icon.png" type="image/png">
</head>
<body>
    <header>
        <div class="container">
            <p class="logo">Store Mta</p>
            <nav>
                <a href="https://discord.gg/n5ckrUxH6G">Discord</a>
                <a href="../Backend/settings.php">Settings</a>
                <a href="/log">Logout</a>
            </nav>
        </div>
    </header> 
</head>
   <section id="resources">
        <div class="container">
            <h2>Resources Para Mta</h2>
            <div class="programas">
                <div class="carta">
                    <h3>Sonidos Para Vehiculos MTA</h3>
                    <p>Sonidos para Vehiculos en mta En la Version V2.0 con Mejoras en el encendido y al andar, Este Resource es Echo Por Tony y Teo ST se que este resource lo liberaron pero esta es la version original y el primero que se hizo</p>
                    <a href="https://discord.gg/n5ckrUxH6G"><button class="comprar">Comprar</button></a>
                </div>
                <div class="carta">
                    <h3>Trabajo de Pescador k</h3>
                    <p>Este Trabajo de Pescador se Hizo por Harler, un trabajo de Pescador basico y instuitivo que puedes comprar</p>
                    <a href="https://discord.gg/n5ckrUxH6G"><button class="comprar">Comprar</button></a>
                </div>
                <div class="carta">
                    <h3>Ipb Rendimiento</h3>
                    <p>Ipb es un resource que estaba en la pagina web de mta y bueno aca lo tenemos lo puedes descargar y mirar el rendimiento de tu Server</p>
                   <a href="../Media/resources/ipb.zip"> <button>Descargar</button></a>
                </div>  
            </div>
        </div>
    </section>

    <section id="resourcess">
        <div class="containerr">
            <div class="programass">
                <div class="cartaa">
                    <h3>Login para Mta Adaptado ala Downtown Funcional</h3>
                    <p>Precio 5 Dolares</p>
                    <a href="https://discord.gg/n5ckrUxH6G"><button class="comprar">Comprar</button></a>
                </div>
                <div class="cartaa">
                    <h3>Rich Present</h3>
                    <p>Discord</p>
                    <a href="../Media/resources/RichPresenceToMTA.7z"> <button>Descargar</button></a>
                </div>
                <div class="cartaa">
                    <h3>Proximamente</h3>
                    <p></p>
                    <button></button>
                </div>
                <div class="cartaa">
                    <h3>Proximamente</h3>
                    <p></p>
                    <button></button>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; TeoST</p>
        </div>
    </footer>
</body>
</html>