<h1>Detalle del pedido</h1>

<?php if (isset($pedido)): ?>
		<?php if(isset($_SESSION['admin'])): ?>
			<h3>Cambiar estado del pedido</h3>
			<form class="login-form" action="<?=base_url?>pedido/estado" method="POST">
				<input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/>
				<select name="estado">
					<option value="pendiente" <?=$pedido->estado == "pendiente" ? 'selected' : '';?>>Pendiente</option>
					<option value="preparando" <?=$pedido->estado == "preparando" ? 'selected' : '';?>>En preparación</option>
					<option value="preparando" <?=$pedido->estado == "preparando" ? 'selected' : '';?>>Preparado para enviar</option>
					<option value="Listo" <?=$pedido->estado == "Listo" ? 'selected' : '';?>>Enviado</option>
				</select>
				<button class="btn" type="submit">Enviar</button>
			</form>
			<br/>
		<?php endif; ?>

		<h3>Dirección de envio</h3>
		Telefono: <?= $pedido->telefono ?>   <br/>
		Correo: <?= $pedido->correo ?> <br/>


		<h3>Datos del pedido:</h3>
		Estado: <?=Utils::showStatus($pedido->estado)?> <br/>
		Número de pedido: <?= $pedido->id ?>   <br/>
		Total a pagar: <?= $pedido->coste ?> $ <br/>
		Productos:

		<table>
			<tr>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Unidades</th>
			</tr>
			<?php while ($producto = $productos->fetch_object()): ?>
				<tr>
					<td>
						<?php if ($producto->imagen != null): ?>
							<img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
						<?php else: ?>
							<img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" />
						<?php endif; ?>
					</td>
					<td>
						<a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
					</td>
					<td>
						<?= $producto->precio ?>
					</td>
					<td>
						<?= $producto->unidades ?>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>

	<?php endif; ?>