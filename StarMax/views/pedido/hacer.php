<?php if (isset($_SESSION['identy'])): ?>
	<h1>Hacer pedido</h1>
	<p>
		<a href="<?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a>
	</p>
	<br/>
	
	<h3>Info para la Cuenta:</h3>
	<form class="login-form" action="<?=base_url.'pedido/add'?>" method="POST">
		<label for="telefono">Telefono</label>
		<input type="text" name="telefono" required />
		
		<label for="email">Correo</label>
		<input type="email" name="email" required />
		
		<button class="btn" type="submit">Enviar</button>
	</form>
		
<?php else: ?>
	<h1>Necesitas estar identificado</h1>
	<p>Necesitas estar logueado en la web para poder realizar tu pedido.</p>
<?php endif; ?>


