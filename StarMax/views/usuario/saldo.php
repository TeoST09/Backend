

<h1>Pagina de Cargar Saldo</h1>
<?php if ($usuario): ?>
    <h3>Nombre: <?= $usuario->nombre ?></h3>
    <h3>Saldo: <?= $usuario->saldo ?></h3>
<?php else: ?>
    <p>No se encontró la información del usuario.</p>
<?php endif; ?>
 


<button class="login-form"><a href="https://wa.me/3196807865" target="_blank">Cargar Saldo</a></button>
